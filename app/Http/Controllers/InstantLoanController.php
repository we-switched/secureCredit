<?php

namespace App\Http\Controllers;

use App\InstantLoan;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class InstantLoanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = InstantLoan::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = InstantLoan::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = InstantLoan::where('telecaller', $request->user()->name)->get();
                
        return view('details.instant_loan')->with('applicants', $applicants);
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
            'netincome' => 'required|numeric|min:0',
            'loanamount' => 'required|numeric|min:0',
            'aadharmobile' => 'required|string',
            'bankingaccess' => 'required|string'
        ]);
        
        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = InstantLoan::find($id);

            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');
            $loan->status = $request->input('status');
            $loan->city = $request->input('city');
            $loan->presentaddress = $request->input('presentaddress');
            $loan->permanentaddress = $request->input('permanentaddress');
            $loan->netincome = $request->input('netincome');
            $loan->loanamount = $request->input('loanamount');
            $loan->aadharmobile = $request->input('aadharmobile');
            $loan->bankingaccess = $request->input('bankingaccess');

            $loan->save();

            return redirect('/InstantLoan/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new InstantLoan;
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->city = $request->input('city');
            $loan->presentaddress = $request->input('presentaddress');
            $loan->permanentaddress = $request->input('permanentaddress');
            $loan->netincome = $request->input('netincome');
            $loan->loanamount = $request->input('loanamount');
            $loan->aadharmobile = $request->input('aadharmobile');
            $loan->bankingaccess = $request->input('bankingaccess');

            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Instant Loan'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Instant Loan'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }    

    public function delete($id)
    {
        InstantLoan::destroy($id);
        return redirect()->back()->with('success', 'Record deleted!');
    }

    public function edit($id)
    {
        $loan = InstantLoan::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.instant_loan_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
