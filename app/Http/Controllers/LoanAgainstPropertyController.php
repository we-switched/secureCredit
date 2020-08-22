<?php

namespace App\Http\Controllers;

use App\LoanAgainstProperty;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class LoanAgainstPropertyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = LoanAgainstProperty::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = LoanAgainstProperty::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = LoanAgainstProperty::where('telecaller', $request->user()->name)->get();
                
        return view('details.loan_against_property')->with('applicants', $applicants);
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|required',
            'phone' => 'required|string|size:10',
            'city' => 'required|string',
            'employmenttype' => 'required|string',
            'modeofsalary' => 'nullable|string',
            'netsalary' => 'nullable|numeric|min:0',
            'profit' => 'nullable|numeric|min:0',
            'turnover' => 'nullable|numeric|min:0',
            'loanamount' => 'required|numeric',
            'marketvalue' => 'required|numeric',
            'governmentvalue' => 'required|numeric',
            'katha' => 'nullable|string',
            'typeofproperty' => 'required|string'
        ]);
        
        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = LoanAgainstProperty::find($id);
          
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->topup = $request->input('topup');
            $loan->moratorium = $request->input('moratorium');
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');
            $loan->status = $request->input('status');
            $loan->city = $request->input('city');
            $loan->employmenttype = $request->input('employmenttype');
            if ($loan->employmenttype === "Salaried") {
                $loan->modeofsalary = $request->input('modeofsalary');
                $loan->netsalary = $request->input('netsalary');
                $loan->profit = null;
                $loan->turnover = null;
            }
            else if ($loan->employmenttype === "Self Employed") {
                $loan->modeofsalary = null;
                $loan->netsalary = null;
                $loan->profit = $request->input('profit');
                $loan->turnover = $request->input('turnover');
            }
            $loan->loanamount = $request->input('loanamount');
            $loan->marketvalue = $request->input('marketvalue');
            $loan->governmentvalue = $request->input('governmentvalue');
            $loan->katha = $request->input('katha');
            if ($loan->city != "Bangalore")
                $loan->katha = null;
            $loan->typeofproperty = $request->input('typeofproperty');
                
            $loan->save();

            return redirect('/LoanAgainstProperty/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new LoanAgainstProperty;
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->topup = $request->input('topup');
            $loan->moratorium = $request->input('moratorium');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->city = $request->input('city');
            $loan->employmenttype = $request->input('employmenttype');
            $loan->modeofsalary = $request->input('modeofsalary');
            $loan->netsalary = $request->input('netsalary');
            $loan->profit = $request->input('profit');
            $loan->turnover = $request->input('turnover');
            $loan->loanamount = $request->input('loanamount');
            $loan->marketvalue = $request->input('marketvalue');
            $loan->governmentvalue = $request->input('governmentvalue');
            $loan->typeofproperty = $request->input('typeofproperty');
            $loan->katha = $request->input('katha');
            if ($loan->city != "Bangalore")
                $loan->katha = null;

            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Loan Against Property'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Loan Against Property'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }

    public function delete($id)
    {
        LoanAgainstProperty::destroy($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $loan = LoanAgainstProperty::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.loan_against_property_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
