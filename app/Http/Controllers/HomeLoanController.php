<?php

namespace App\Http\Controllers;

use App\HomeLoan;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class HomeLoanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = HomeLoan::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = HomeLoan::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = HomeLoan::where('telecaller', $request->user()->name)->get();
                
        return view('details.home_loan')->with('applicants', $applicants);
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|required',
            'phone' => 'required|string|size:10',
            'city' => 'required|string',
            'employmenttype' => 'required|string',
            'typeofhomeloan' => 'required|string',
            'modeofsalary' => 'nullable|string',
            'netsalary' => 'nullable|numeric|min:0',
            'profit' => 'nullable|numeric|min:0',
            'turnover' => 'nullable|numeric|min:0',
            'loanamount' => 'required|numeric|min:0',
            'marketvalue' => 'required|numeric|min:0',
            'governmentvalue' => 'required|numeric|min:0',
            'katha' => 'nullable|string'
        ]);
        
        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = HomeLoan::find($id);

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
            $loan->typeofhomeloan = $request->input('typeofhomeloan');
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

            $loan->save();

            return redirect('/HomeLoan/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new HomeLoan;
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->topup = $request->input('topup');
            $loan->moratorium = $request->input('moratorium');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->city = $request->input('city');
            $loan->employmenttype = $request->input('employmenttype');
            $loan->typeofhomeloan = $request->input('typeofhomeloan');
            $loan->modeofsalary = $request->input('modeofsalary');
            $loan->netsalary = $request->input('netsalary');
            $loan->profit = $request->input('profit');
            $loan->turnover = $request->input('turnover');
            $loan->loanamount = $request->input('loanamount');
            $loan->marketvalue = $request->input('marketvalue');
            $loan->governmentvalue = $request->input('governmentvalue');
            $loan->katha = $request->input('katha');
            if ($loan->city != "Bangalore")
                $loan->katha = null;

            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Home Loan'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Home Loan'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }

 
    public function delete($id)
    {
        HomeLoan::destroy($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $loan = HomeLoan::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.home_loan_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
