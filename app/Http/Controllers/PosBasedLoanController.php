<?php

namespace App\Http\Controllers;

use App\PosBasedLoan;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class PosBasedLoanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = PosBasedLoan::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = PosBasedLoan::where('agent', $request->user()->name);
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = PosBasedLoan::where('telecaller', $request->user()->name);
                
        return view('details.pos_based_loan')->with('applicants', $applicants);
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|required',
            'phone' => 'required|string|size:10',
            'city' => 'required|string',
            'typeofbusiness' => 'required|string',
            'cardswipe' => 'required|numeric',
            'loanamount' => 'required|numeric'
        ]);
        
        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = PosBasedLoan::find($id);

            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->moratorium = $request->input('moratorium');
            $loan->agent = auth()->check() ? auth()->user()->name : '';
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');
            $loan->status = $request->input('status');
            $loan->city = $request->input('city');
            $loan->typeofbusiness = $request->input('typeofbusiness');
            $loan->cardswipe = $request->input('cardswipe');
            $loan->loanamount = $request->input('loanamount');
    
            $loan->save();

            return redirect('/PosBasedLoan/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new PosBasedLoan;
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->moratorium = $request->input('moratorium');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->city = $request->input('city');
            $loan->typeofbusiness = $request->input('typeofbusiness');
            $loan->cardswipe = $request->input('cardswipe');
            $loan->loanamount = $request->input('loanamount');
    
            $loan->save();
           
            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'POS Based Loan'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'POS Based Loan'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }
    
    public function delete($id)
    {
        PosBasedLoan::destroy($id);
        return redirect()->back();
    }
    
    public function edit($id)
    {
        $loan = PosBasedLoan::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.pos_based_loan_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
