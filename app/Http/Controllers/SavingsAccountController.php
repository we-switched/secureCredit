<?php

namespace App\Http\Controllers;

use App\SavingsAccount;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class SavingsAccountController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = SavingsAccount::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = SavingsAccount::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = SavingsAccount::where('telecaller', $request->user()->name)->get();
                
        return view('details.savings_account')->with('applicants', $applicants);
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|required',
            'phone' => 'required|string|size:10',
            'city' => 'required|string'
        ]);
        
        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = SavingsAccount::find($id);

            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');
            $loan->status = $request->input('status');
            $loan->city = $request->input('city');

            $loan->save();

            return redirect('/SavingsAccount/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new SavingsAccount;
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->city = $request->input('city');

            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Savings Account'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Savings Account'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }    

    public function delete($id)
    {
        SavingsAccount::destroy($id);
        return redirect()->back()->with('success', 'Record deleted!');
    }

    public function edit($id)
    {
        $loan = SavingsAccount::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.savings_account_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }

}
