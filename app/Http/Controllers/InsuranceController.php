<?php

namespace App\Http\Controllers;

use App\Insurance;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class InsuranceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = Insurance::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = Insurance::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = Insurance::where('telecaller', $request->user()->name)->get();
                
        return view('details.insurance')->with('applicants', $applicants);
    }

    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|required',
            'phone' => 'required|string|size:10',
            'type' => 'required|string',
            'employmenttype' => 'required|string',
            'netincome' => 'required|numeric|min:0',
            'city' => 'required|string'
        ]);
        
        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = Insurance::find($id);
           
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->agent = auth()->check() ? auth()->user()->name : '';
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');
            $loan->status = $request->input('status');
            $loan->type = $request->input('type');
            $loan->employmenttype = $request->input('employmenttype');
            $loan->netincome = $request->input('netincome');
            $loan->city = $request->input('city');

            $loan->save();

            return redirect('/Insurance/details')->with('success', 'Task done!');
        }
        elseif ($id === null) {

            $loan = new Insurance;
                     
            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->type = $request->input('type');
            $loan->employmenttype = $request->input('employmenttype');
            $loan->netincome = $request->input('netincome');
            $loan->city = $request->input('city');

            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Insurance'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Insurance'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }

    public function delete($id)
    {
        Insurance::destroy($id);
        return redirect()->back();
    }
    
    public function edit($id)
    {
        $loan = Insurance::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.insurance_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
