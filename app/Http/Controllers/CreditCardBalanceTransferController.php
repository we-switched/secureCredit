<?php

namespace App\Http\Controllers;

use App\CreditCardBalanceTransfer;
use App\User;
use Illuminate\Http\Request;
use App\Mail\NewUserNotification;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

class CreditCardBalanceTransferController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
            $applicants = CreditCardBalanceTransfer::all();
        else if ($request->user() && $request->user()->role == 'Agent')
            $applicants = CreditCardBalanceTransfer::where('agent', $request->user()->name)->get();
        else if ($request->user() && $request->user()->role == 'Telecaller')
            $applicants = CreditCardBalanceTransfer::where('telecaller', $request->user()->name)->get();
                
        return view('details.credit_card_balance_transfer')->with('applicants', $applicants);
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
            'noofcards' => 'required|numeric|min:0',
            'totalcreditlimit' => 'required|numeric|min:0',
            'currentoutstanding' => 'required|numeric|min:0',
            'loanamount' => 'required|numeric|min:0',
            'delayinpayment' => 'required|string',
        ]);

        if ($id && ($request->user()->role === "Admin" || $request->user()->role === "Telecaller"))
        {
            $loan = CreditCardBalanceTransfer::find($id);

            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->moratorium = $request->input('moratorium');
            $loan->agent = auth()->check() ? auth()->user()->name : '';
            if ($request->has('telecaller') && $request->user()->role === "Admin")
                $loan->telecaller = $request->input('telecaller');
            $loan->status = $request->input('status');
            $loan->city = $request->input('city');
            $loan->employmenttype = $request->input('employmenttype');
            $loan->modeofsalary = $request->input('modeofsalary');
            $loan->netsalary = $request->input('netsalary');
            $loan->profit = $request->input('profit');
            $loan->turnover = $request->input('turnover');
            $loan->noofcards = $request->input('noofcards');
            $loan->totalcreditlimit = $request->input('totalcreditlimit');
            $loan->currentoutstanding = $request->input('currentoutstanding');
            $loan->loanamount = $request->input('loanamount');
            $loan->delayinpayment = $request->input('delayinpayment');

            $loan->save();

            return redirect('/CreditCardBalanceTransfer/details')->with('success', 'Task done!');
        }
        else if ($id === null) {

            $loan = new CreditCardBalanceTransfer;

            $loan->name = $request->input('name');
            $loan->email = $request->input('email');
            $loan->phone = $request->input('phone');
            $loan->moratorium = $request->input('moratorium');
            auth()->check() ? $loan->agent = auth()->user()->name : 0 ;
            $loan->city = $request->input('city');
            $loan->employmenttype = $request->input('employmenttype');
            $loan->modeofsalary = $request->input('modeofsalary');
            $loan->netsalary = $request->input('netsalary');
            $loan->profit = $request->input('profit');
            $loan->turnover = $request->input('turnover');
            $loan->noofcards = $request->input('noofcards');
            $loan->totalcreditlimit = $request->input('totalcreditlimit');
            $loan->currentoutstanding = $request->input('currentoutstanding');
            $loan->loanamount = $request->input('loanamount');
            $loan->delayinpayment = $request->input('delayinpayment');
                
            $loan->save();

            Mail::to($loan->email)->send(new NewUserNotification($loan->name, 'Credit Card Balance Transfer'));
            Mail::to('admin@securecredit.in')->send(new AdminNotification($loan->name, $loan->email, $loan->phone, 'Credit Card Balance Transfer'));

            return redirect('/')->with('formfill', 'Thank you for contacting us. We will get back to you with exciting offers.');
        }

        return redirect()->back()->with('error', 'Oops! Some error occurred. Please try again.');
    }

    public function delete($id)
    {
        CreditCardBalanceTransfer::destroy($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $loan = CreditCardBalanceTransfer::find($id);
        $telecallers = User::where('role','Telecaller')->get();
        return view('edit.credit_card_balance_transfer_form')->with(['loan' => $loan, 'telecallers' => $telecallers]);
    }
}
