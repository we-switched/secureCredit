<?php

namespace App\Http\Controllers;

use App\LeaseRentalDiscounting;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class LeaseRentalDiscountingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = LeaseRentalDiscounting::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = LeaseRentalDiscounting::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = LeaseRentalDiscounting::where('telecaller', $request->user()->name)->get();
                
        return view('details.lease_rental_discounting')->with('applicants', $applicants);
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|required',
            'phone' => 'required|string|size:10',
            'employmenttype' => 'required|string',
            'netincome' => 'required|numeric|min:0',
            'city' => 'required|string'
        ]);
        
        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = LeaseRentalDiscounting::find($id);

            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');
            $loan->status = $request->input('status');
            $loan->city = $request->input('city');
            $loan->employmenttype = $request->input('employmenttype');
            $loan->netincome = $request->input('netincome');

            $loan->save();

            return redirect('/LeaseRentalDiscounting/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new LeaseRentalDiscounting;
            
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->employmenttype = $request->input('employmenttype');
            $loan->netincome = $request->input('netincome');
            $loan->city = $request->input('city');

            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Lease Rental Discounting'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Lease Rental Discounting'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }

    public function delete($id)
    {
        LeaseRentalDiscounting::destroy($id);
        return redirect()->back();
    }
    
    public function edit($id)
    {
        $loan = LeaseRentalDiscounting::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.lease_rental_discounting_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
