<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessLoan;
use App\CreditCardBalanceTransfer;
use App\PersonalLoan;
use App\HomeLoan;
use App\LoanAgainstProperty;
use App\PosBasedLoan;
use App\SavingsAccount;
use App\CurrentAccount;
use App\Insurance;
use App\MutualFunds;
use App\InvoiceDiscounting;
use App\LeaseRentalDiscounting;
use App\DematAccount;
use App\FixedDeposit;
use App\InstantLoan;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'Admin') 
        {
            $personal_loan_count = PersonalLoan::all()->count();
            $business_loan_count = BusinessLoan::all()->count();
            $home_loan_count = HomeLoan::all()->count();
            $loan_against_property_count =LoanAgainstProperty::all()->count();
            $pos_based_loan_count = PosBasedLoan::all()->count();
            $credit_card_balance_transfer_count = CreditCardBalanceTransfer::all()->count();
            $fixed_deposit_count = FixedDeposit::all()->count();
            $current_account_count = CurrentAccount::all()->count();
            $savings_account_count = SavingsAccount::all()->count();
            $insurance_count = Insurance::all()->count();
            $demat_account_count = DematAccount::all()->count();
            $mutual_funds_count = MutualFunds::all()->count();
            $invoice_discounting_count = InvoiceDiscounting::all()->count();
            $lease_rental_discounting_count = LeaseRentalDiscounting::all()->count();
            $instant_loan_count = InstantLoan::all()->count();
        }

        else if ($request->user() && $request->user()->role == 'Agent')
        {
            $personal_loan_count = PersonalLoan::where('agent', $request->user()->name)->count();
            $business_loan_count = BusinessLoan::where('agent', $request->user()->name)->count();
            $home_loan_count = HomeLoan::where('agent', $request->user()->name)->count();
            $loan_against_property_count =LoanAgainstProperty::where('agent', $request->user()->name)->count();
            $pos_based_loan_count = PosBasedLoan::where('agent', $request->user()->name)->count();
            $credit_card_balance_transfer_count = CreditCardBalanceTransfer::where('agent', $request->user()->name)->count();
            $fixed_deposit_count = FixedDeposit::where('agent', $request->user()->name)->count();
            $current_account_count = CurrentAccount::where('agent', $request->user()->name)->count();
            $savings_account_count = SavingsAccount::where('agent', $request->user()->name)->count();
            $insurance_count = Insurance::where('agent', $request->user()->name)->count();
            $demat_account_count = DematAccount::where('agent', $request->user()->name)->count();
            $mutual_funds_count = MutualFunds::where('agent', $request->user()->name)->count();
            $invoice_discounting_count = InvoiceDiscounting::where('agent', $request->user()->name)->count();
            $lease_rental_discounting_count = LeaseRentalDiscounting::where('agent', $request->user()->name)->count();
            $instant_loan_count = InstantLoan::where('agent', $request->user()->name)->count();
        }
        
        else if ($request->user() && $request->user()->role == 'Telecaller')
        {
            $personal_loan_count = PersonalLoan::where('telecaller', $request->user()->name)->count();
            $business_loan_count = BusinessLoan::where('telecaller', $request->user()->name)->count();
            $home_loan_count = HomeLoan::where('telecaller', $request->user()->name)->count();
            $loan_against_property_count =LoanAgainstProperty::where('telecaller', $request->user()->name)->count();
            $pos_based_loan_count = PosBasedLoan::where('telecaller', $request->user()->name)->count();
            $credit_card_balance_transfer_count = CreditCardBalanceTransfer::where('telecaller', $request->user()->name)->count();
            $fixed_deposit_count = FixedDeposit::where('telecaller', $request->user()->name)->count();
            $current_account_count = CurrentAccount::where('telecaller', $request->user()->name)->count();
            $savings_account_count = SavingsAccount::where('telecaller', $request->user()->name)->count();
            $insurance_count = Insurance::where('telecaller', $request->user()->name)->count();
            $demat_account_count = DematAccount::where('telecaller', $request->user()->name)->count();
            $mutual_funds_count = MutualFunds::where('telecaller', $request->user()->name)->count();
            $invoice_discounting_count = InvoiceDiscounting::where('telecaller', $request->user()->name)->count();
            $lease_rental_discounting_count = LeaseRentalDiscounting::where('telecaller', $request->user()->name)->count();
            $instant_loan_count = InstantLoan::where('telecaller', $request->user()->name)->count();
        }        
                
        return view('common.home')->with([
            'personal_loan_count' => $personal_loan_count,
            'business_loan_count' => $business_loan_count,
            'home_loan_count' => $home_loan_count,
            'loan_against_property_count' => $loan_against_property_count,
            'pos_based_loan_count' => $pos_based_loan_count,
            'credit_card_balance_transfer_count' => $credit_card_balance_transfer_count,
            'fixed_deposit_count' => $fixed_deposit_count,
            'current_account_count' => $current_account_count,
            'savings_account_count' => $savings_account_count,
            'insurance_count' => $insurance_count,
            'mutual_funds_count' => $mutual_funds_count,
            'demat_account_count' => $demat_account_count,
            'invoice_discounting_count' => $invoice_discounting_count,
            'lease_rental_discounting_count' => $lease_rental_discounting_count,
            'instant_loan_count' => $instant_loan_count
        ]);
    }
}
