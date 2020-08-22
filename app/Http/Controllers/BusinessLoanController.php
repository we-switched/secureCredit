<?php

namespace App\Http\Controllers;

use App\BusinessLoan;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class BusinessLoanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = BusinessLoan::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = BusinessLoan::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = BusinessLoan::where('telecaller', $request->user()->name)->get();
                
        return view('details.business_loan')->with('applicants', $applicants);
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|required',
            'phone' => 'required|string|size:10',
            'city' => 'required|string',
            'presentaddress' => 'required|string',
            'permanentaddress' => 'required|string',
            'officeaddress' => 'required|string',
            'yearsinbusiness' => 'required|numeric|min:0',
            'yearsinblr' => 'required|numeric|min:0',
            'yearsinpresentaddress' => 'required|numeric|min:0',
            'residence' => 'required|string',
            'existingloans' => 'nullable|string',
            'turnover' => 'required|numeric|min:0',
            'profit' => 'required|numeric|min:0',
            'maritalstatus' => 'required|string',
            'company' => 'required|string',
        ]);

        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = BusinessLoan::find($id);
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->topup = $request->input('topup');
            $loan->moratorium = $request->input('moratorium');
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');        
            $loan->status = $request->input('status');
            $loan->city = $request->input('city');
            $loan->presentaddress = $request->input('presentaddress');
            $loan->permanentaddress = $request->input('permanentaddress');
            $loan->officeaddress = $request->input('officeaddress');
            $loan->yearsinbusiness = $request->input('yearsinbusiness');
            $loan->yearsinblr = $request->input('yearsinblr');
            $loan->yearsinpresentaddress = $request->input('yearsinpresentaddress');
            $loan->residence = $request->input('residence');
            $loan->existingloans = $request->input('existingloans');
            $loan->turnover = $request->input('turnover');
            $loan->profit = $request->input('profit');
            $loan->maritalstatus = $request->input('maritalstatus');
            $loan->company = $request->input('company');

            $loan->save();

            return redirect('/BusinessLoan/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new BusinessLoan;
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->topup = $request->input('topup');
            $loan->moratorium = $request->input('moratorium');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->city = $request->input('city');
            $loan->presentaddress = $request->input('presentaddress');
            $loan->permanentaddress = $request->input('permanentaddress');
            $loan->officeaddress = $request->input('officeaddress');
            $loan->yearsinbusiness = $request->input('yearsinbusiness');
            $loan->yearsinblr = $request->input('yearsinblr');
            $loan->yearsinpresentaddress = $request->input('yearsinpresentaddress');
            $loan->residence = $request->input('residence');
            $loan->existingloans = $request->input('existingloans');
            $loan->turnover = $request->input('turnover');
            $loan->profit = $request->input('profit');
            $loan->maritalstatus = $request->input('maritalstatus');
            $loan->company = $request->input('company');

            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Business Loan'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Business Loan'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect(')->back(')->with('error', 'Oops! Some error occurred. Please try again.');
    }

    public function delete($id)
    {
        BusinessLoan::destroy($id);
        return redirect()->back()->with('success', 'Record deleted!');
    }

    public function edit($id)
    {
        $loan = BusinessLoan::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.business_loan_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
