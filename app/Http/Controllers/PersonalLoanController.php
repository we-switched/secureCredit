<?php

namespace App\Http\Controllers;

use App\PersonalLoan;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;
use File;

class PersonalLoanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = PersonalLoan::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = PersonalLoan::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = PersonalLoan::where('telecaller', $request->user()->name)->get();
                
        return view('details.personal_loan')->with('applicants', $applicants);
    }

    public function store_first(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'required|string|size:10',
            'city' => 'required|string',
            'residence' => 'required|string',
            'presentaddress' => 'required|string',
            'permanentaddress' => 'required|string',
            'aadhar' => 'required|digits:12',
            'pan' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'yearsinpresentaddress' => 'required|numeric|min:0',
            'yearsincity' => 'required|numeric|min:0',
            'rent' => 'nullable|numeric|min:0',
            'qualification' => 'required|string',
            'uniname' => 'required|string',
            'yearofpassing' => 'required|numeric',
            'maritalstatus' => 'required|string',
            'existingloans' => 'required|string',
            'emi' => 'nullable|numeric|min:0',
            'reference1' => 'required|string',
            'reference2' => 'required|string',
            'employmenttype' => 'required|string',
            'profit' => 'nullable|numeric|min:0',
            'turnover' => 'nullable|numeric|min:0',
            'modeofsalary' => 'nullable|string',
            'netsalary' => 'nullable|numeric|min:0',
            'company' => 'nullable|string',
            'officeaddress' => 'required|string',
            'officeemail' => 'nullable|email|string',
            'designation' => 'nullable|string',
            'department' => 'nullable|string',
            'yearsincompany' => 'nullable|numeric|min:0',
            'workexperience' => 'nullable|numeric|min:0',
            'mothersname' => 'required|string',
            'loanamount' => 'required|numeric|min:0',
            'tenure' => 'required|numeric|min:0',
            'dob' => 'required|date'
        ]);

        $loan = new PersonalLoan;

        $loan->name = $request->input('name');
        $loan->email = $request->input('email');
        $loan->phone = $request->input('phone');
        $loan->topup = $request->input('topup');
        $loan->moratorium = $request->input('moratorium');
        auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
        $loan->city = $request->input('city');
        $loan->residence = $request->input('residence');
        $loan->presentaddress = $request->input('presentaddress');
        $loan->permanentaddress = $request->input('permanentaddress');
        $loan->officeaddress = $request->input('officeaddress');
        $loan->yearsincity = $request->input('yearsincity');
        $loan->yearsinpresentaddress = $request->input('yearsinpresentaddress');
        $loan->rent = $request->input('rent');
        $loan->qualification = $request->input('qualification');
        $loan->uniname = $request->input('uniname');
        $loan->yearofpassing = $request->input('yearofpassing');
        $loan->maritalstatus = $request->input('maritalstatus');
        $loan->existingloans = $request->input('existingloans');
        $loan->emi = $request->input('emi');
        $loan->reference1 = $request->input('reference1');
        $loan->reference2 = $request->input('reference2');
        $loan->employmenttype = $request->input('employmenttype');
        if ($loan->employmenttype === "Salaried") {
            $loan->modeofsalary = $request->input('modeofsalary');
            $loan->netsalary = $request->input('netsalary');
            $loan->company = $request->input('company');
            $loan->officeemail = $request->input('officeemail');
            $loan->designation = $request->input('designation');
            $loan->department = $request->input('department');
            $loan->yearsincompany = $request->input('yearsincompany');
            $loan->workexperience = $request->input('workexperience');
            $loan->profit = null;
            $loan->turnover = null;
        }
        else if ($loan->employmenttype === "Self Employed") {
            $loan->modeofsalary = null;
            $loan->netsalary = null;
            $loan->company = null;
            $loan->officeemail = null;
            $loan->officeaddress = null;
            $loan->designation = null;
            $loan->department = null;
            $loan->yearsincompany = null;
            $loan->workexperience = null;
            $loan->profit = $request->input('profit');
            $loan->turnover = $request->input('turnover');
        }
        $loan->mothersname = $request->input('mothersname');
        $loan->loanamount = $request->input('loanamount');
        $loan->tenure = $request->input('tenure');
        $loan->dob = $request->input('dob');
        $loan->aadhar = $request->input('aadhar');
        $loan->pan = $request->input('pan');

        $request->session()->put('loan', $loan);

        return redirect('/personal_loan_second_form/'.$loan->employmenttype);

    }

    public function store_second(Request $request)
    {   
        $loan = $request->session()->get('loan');

        if (auth()->check()) {
            $this->validate($request, [
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'photoaadharfront' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'photoaadharback' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'photopan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'pdfpayslip_1' => 'required|mimes:pdf|max:2048',
                'pdfpayslip_2' => 'required|mimes:pdf|max:2048',
                'pdfpayslip_3' => 'required|mimes:pdf|max:2048',
                'pdfbank' => 'required|mimes:pdf|max:2048',
                'rentalagreement' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',
                'electricitybill' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048'
            ]);
        }
        else {
            $this->validate($request, [
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'photoaadharfront' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'photoaadharback' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'photopan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'pdfpayslip_1' => 'nullable|mimes:pdf|max:2048',
                'pdfpayslip_2' => 'nullable|mimes:pdf|max:2048',
                'pdfpayslip_3' => 'nullable|mimes:pdf|max:2048',
                'pdfbank' => 'nullable|mimes:pdf|max:2048',
                'rentalagreement' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',
                'electricitybill' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048'
            ]);
        }

        if ($request->hasFile('photo')) {
            $photoname = 'profile_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('public/photos', $photoname);
            $loan->photo = $photoname;
        }
        
        if ($request->hasFile('photoaadharfront')) {
            $photoaadharfrontname = 'aadhar_front_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photoaadharfront')->getClientOriginalExtension();
            $path = $request->file('photoaadharfront')->storeAs('public/photos', $photoaadharfrontname);
            $loan->photoaadharfront = $photoaadharfrontname;
        }        

        if ($request->hasFile('photoaadharback')) {
            $photoaadharbackname = 'aadhar_back_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photoaadharback')->getClientOriginalExtension();
            $path = $request->file('photoaadharback')->storeAs('public/photos', $photoaadharbackname);
            $loan->photoaadharback = $photoaadharbackname;
        }
        
        if ($request->hasFile('photopan')) {
            $photopanname = 'pan_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photopan')->getClientOriginalExtension();
            $path = $request->file('photopan')->storeAs('public/photos', $photopanname);
            $loan->photopan = $photopanname;
        }

        if ($request->hasFile('pdfpayslip_1')) {
            $pdfpayslip_1name = 'payslip_1_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfpayslip_1')->getClientOriginalExtension();
            $path = $request->file('pdfpayslip_1')->storeAs('public/docs', $pdfpayslip_1name);
            $loan->pdfpayslip_1 = $pdfpayslip_1name;
        }
        
        if ($request->hasFile('pdfpayslip_2')) {
            $pdfpayslip_2name = 'payslip_2_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfpayslip_2')->getClientOriginalExtension();
            $path = $request->file('pdfpayslip_2')->storeAs('public/docs', $pdfpayslip_2name);
            $loan->pdfpayslip_2 = $pdfpayslip_2name;
        }

        if ($request->hasFile('pdfpayslip_3')) {
            $pdfpayslip_3name = 'payslip_3_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfpayslip_3')->getClientOriginalExtension();
            $path = $request->file('pdfpayslip_3')->storeAs('public/docs', $pdfpayslip_3name);
            $loan->pdfpayslip_3 = $pdfpayslip_3name;
        }

        if ($request->hasFile('pdfbank')) {
            $pdfbankname = 'bank_statement_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfbank')->getClientOriginalExtension();
            $path = $request->file('pdfbank')->storeAs('public/docs', $pdfbankname);
            $loan->pdfbank = $pdfbankname;
        }

        if($request->hasFile('rentalagreement')) {
            $rentalagreementname = 'rental_agreement_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('rentalagreement')->getClientOriginalExtension();
            $path = $request->file('rentalagreement')->storeAs('public/docs', $rentalagreementname);
            $loan->rentalagreement = $rentalagreementname;
        }

        if($request->hasFile('electricitybill')) {
            $electricitybillname = 'electricity_bill_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('electricitybill')->getClientOriginalExtension();
            $path = $request->file('electricitybill')->storeAs('public/docs', $electricitybillname);
            $loan->electricitybill = $electricitybillname;
        }

        $loan = $request->session()->get('loan');
        
        $loan->save();

        Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Personal Loan'));
        Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Personal Loan'));

        return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');

    }
        
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'required|string|size:10',
            'city' => 'required|string',
            'residence' => 'required|string',
            'presentaddress' => 'required|string',
            'permanentaddress' => 'required|string',
            'officeaddress' => 'required|string',
            'yearsincity' => 'required|numeric|min:0',
            'yearsinpresentaddress' => 'required|numeric|min:0',
            'rent' => 'nullable|numeric|min:0',
            'qualification' => 'required|string',
            'uniname' => 'required|string',
            'yearofpassing' => 'required|numeric',
            'maritalstatus' => 'required|string',
            'existingloans' => 'required|string',
            'emi' => 'nullable|numeric|min:0',
            'reference1' => 'required|string',
            'reference2' => 'required|string',
            'company' => 'nullable|string',
            'officeemail' => 'nullable|email|string',
            'designation' => 'nullable|string',
            'department' => 'nullable|string',
            'yearsincompany' => 'nullable|numeric|min:0',
            'workexperience' => 'nullable|numeric|min:0',
            'employmenttype' => 'required|string',
            'modeofsalary' => 'nullable|string',
            'netsalary' => 'nullable|numeric|min:0',
            'profit' => 'nullable|numeric|min:0',
            'turnover' => 'nullable|numeric|min:0',
            'mothersname' => 'required|string',
            'loanamount' => 'required|numeric|min:0',
            'tenure' => 'required|numeric',
            'dob' => 'required|date',
            'aadhar' => 'required|digits:12',
            'pan' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'photoaadharfront' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'photoaadharback' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'photopan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pdfpayslip_1' => 'nullable|mimes:pdf|max:2048',
            'pdfpayslip_2' => 'nullable|mimes:pdf|max:2048',
            'pdfpayslip_3' => 'nullable|mimes:pdf|max:2048',
            'pdfbank' => 'nullable|mimes:pdf|max:2048',
            'rentalagreement' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',
            'electricitybill' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048'
        ]);

        $loan = PersonalLoan::find($id);

        $loan->name = $request->input('name');
        $loan->email = $request->input('email');
        $loan->phone = $request->input('phone');
        $loan->topup = $request->input('topup');
        $loan->moratorium = $request->input('moratorium');
        if ($request->has('telecaller') && $request->user()->role === "Admin")
            $loan->telecaller = $request->input('telecaller');
        $loan->status = $request->input('status');
        $loan->city = $request->input('city');
        $loan->residence = $request->input('residence');
        $loan->presentaddress = $request->input('presentaddress');
        $loan->permanentaddress = $request->input('permanentaddress');
        $loan->officeaddress = $request->input('officeaddress');
        $loan->yearsincity = $request->input('yearsincity');
        $loan->yearsinpresentaddress = $request->input('yearsinpresentaddress');
        $loan->rent = $request->input('rent');
        $loan->qualification = $request->input('qualification');
        $loan->uniname = $request->input('uniname');
        $loan->yearofpassing = $request->input('yearofpassing');
        $loan->maritalstatus = $request->input('maritalstatus');
        $loan->existingloans = $request->input('existingloans');
        $loan->emi = $loan->existingloans === "Yes" ? $request->input('emi') : null ;
        $loan->reference1 = $request->input('reference1');
        $loan->reference2 = $request->input('reference2');
        $loan->employmenttype = $request->input('employmenttype');
        if ($loan->employmenttype === "Salaried") {
            $loan->modeofsalary = $request->input('modeofsalary');
            $loan->netsalary = $request->input('netsalary');
            $loan->company = $request->input('company');
            $loan->officeemail = $request->input('officeemail');
            $loan->designation = $request->input('designation');
            $loan->department = $request->input('department');
            $loan->yearsincompany = $request->input('yearsincompany');
            $loan->workexperience = $request->input('workexperience');
            $loan->profit = null;
            $loan->turnover = null;
        }
        else if ($loan->employmenttype === "Self Employed") {
            $loan->modeofsalary = null;
            $loan->netsalary = null;
            $loan->company = null;
            $loan->officeemail = null;
            $loan->officeaddress = null;
            $loan->designation = null;
            $loan->department = null;
            $loan->yearsincompany = null;
            $loan->workexperience = null;
            $loan->profit = $request->input('profit');
            $loan->turnover = $request->input('turnover');
        }
        $loan->mothersname = $request->input('mothersname');
        $loan->loanamount = $request->input('loanamount');
        $loan->tenure = $request->input('tenure');
        $loan->dob = $request->input('dob');
        $loan->aadhar = $request->input('aadhar');
        $loan->pan = $request->input('pan');
        $loan->bank = $request->input('bank');

        if ($request->hasFile('photo')) {
            $photoname = 'profile_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('public/photos', $photoname);
            $loan->photo = $photoname;
        }
        
        if ($request->hasFile('photoaadharfront')) {
            $photoaadharfrontname = 'aadhar_front_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photoaadharfront')->getClientOriginalExtension();
            $path = $request->file('photoaadharfront')->storeAs('public/photos', $photoaadharfrontname);
            $loan->photoaadharfront = $photoaadharfrontname;
        }        

        if ($request->hasFile('photoaadharback')) {
            $photoaadharbackname = 'aadhar_back_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photoaadharback')->getClientOriginalExtension();
            $path = $request->file('photoaadharback')->storeAs('public/photos', $photoaadharbackname);
            $loan->photoaadharback = $photoaadharbackname;
        }
        
        if ($request->hasFile('photopan')) {
            $photopanname = 'pan_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('photopan')->getClientOriginalExtension();
            $path = $request->file('photopan')->storeAs('public/photos', $photopanname);
            $loan->photopan = $photopanname;
        }

        if ($request->hasFile('pdfpayslip_1')) {
            $pdfpayslip_1name = 'payslip_1_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfpayslip_1')->getClientOriginalExtension();
            $path = $request->file('pdfpayslip_1')->storeAs('public/docs', $pdfpayslip_1name);
            $loan->pdfpayslip_1 = $pdfpayslip_1name;
        }
        
        if ($request->hasFile('pdfpayslip_2')) {
            $pdfpayslip_2name = 'payslip_2_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfpayslip_2')->getClientOriginalExtension();
            $path = $request->file('pdfpayslip_2')->storeAs('public/docs', $pdfpayslip_2name);
            $loan->pdfpayslip_2 = $pdfpayslip_2name;
        }

        if ($request->hasFile('pdfpayslip_3')) {
            $pdfpayslip_3name = 'payslip_3_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfpayslip_3')->getClientOriginalExtension();
            $path = $request->file('pdfpayslip_3')->storeAs('public/docs', $pdfpayslip_3name);
            $loan->pdfpayslip_3 = $pdfpayslip_3name;
        }

        if ($request->hasFile('pdfbank')) {
            $pdfbankname = 'bank_statement_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('pdfbank')->getClientOriginalExtension();
            $path = $request->file('pdfbank')->storeAs('public/docs', $pdfbankname);
            $loan->pdfbank = $pdfbankname;
        }

        if($request->hasFile('rentalagreement')) {
            $rentalagreementname = 'rental_agreement_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('rentalagreement')->getClientOriginalExtension();
            $path = $request->file('rentalagreement')->storeAs('public/docs', $rentalagreementname);
            $loan->rentalagreement = $rentalagreementname;
        }

        if($request->hasFile('electricitybill')) {
            $electricitybillname = 'electricity_bill_of_'.$request->name.'_'.$request->aadhar.'.'.$request->file('electricitybill')->getClientOriginalExtension();
            $path = $request->file('electricitybill')->storeAs('public/docs', $electricitybillname);
            $loan->electricitybill = $electricitybillname;
        }

        $loan->save();    

        return redirect('/PersonalLoan/details')->with('success', 'Task done!');
    }

    public function delete($id)
    {
        $loan = PersonalLoan::find($id);
        
        $loan->delete();
        
        if(File::exists($loan->photo)) {
            File::delete($loan->photo);
        }
        if(File::exists($loan->photopan)) {
            File::delete($loan->photopan);
        }
        if(File::exists($loan->photoaadharfront)) {
            File::delete($loan->photoaadharfront);
        }
        if(File::exists($loan->photoaadharback)) {
            File::delete($loan->photoaadharback);
        }
        if(File::exists($loan->pdfpayslip_1)) {
            File::delete($loan->pdfpayslip_1);
        }
        if(File::exists($loan->pdfpayslip_2)) {
            File::delete($loan->pdfpayslip_2);
        }
        if(File::exists($loan->pdfpayslip_3)) {
            File::delete($loan->pdfpayslip_3);
        }
        if(File::exists($loan->pdfbank)) {
            File::delete($loan->pdfbank);
        }
        if(File::exists($loan->rentalagreement)) {
            File::delete($loan->rentalagreement);
        }
        if(File::exists($loan->electricitybill)) {
            File::delete($loan->electricitybill);
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $loan = PersonalLoan::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.personal_loan_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
