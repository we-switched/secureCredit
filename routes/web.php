<?php

use App\User;
use App\BusinessLoan;
use App\Exports\BusinessLoanExport;
use App\CreditCardBalanceTransfer;
use App\Exports\CreditCardBalanceTransferExport;
use App\PersonalLoan;
use App\Exports\PersonalLoanExport;
use App\HomeLoan;
use App\Exports\HomeLoanExport;
use App\LoanAgainstProperty;
use App\Exports\LoanAgainstPropertyExport;
use App\PosBasedLoan;
use App\Exports\PosBasedLoanExport;
use App\SavingsAccount;
use App\Exports\SavingsAccountExport;
use App\CurrentAccount;
use App\Exports\CurrentAccountExport;
use App\FixedDeposit;
use App\Exports\FixedDepositExport;
use App\Insurance;
use App\Exports\InsuranceExport;
use App\InvoiceDiscounting;
use App\Exports\InvoiceDiscountingExport;
use App\LeaseRentalDiscounting;
use App\Exports\LeaseRentalDiscountingExport;
use App\DematAccount;
use App\Exports\DematAccountExport;
use App\MutualFunds;
use App\Exports\MutualFundsExport;
use App\InstantLoan;
use App\Exports\InstantLoanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;


Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);


Route::get('/', function () {
    return view('common.welcome');
});


Route::get('/home', 'HomeController@index')->middleware('Common');


Route::get('/info', function () {
    return view('common.info');
});


Route::get('/welcome', function () {
    return view('common.welcome');
});


Route::get('/career', function () {
    return view('common.career');
});

Route::get('/backup',function(){
    return view('forms.personal_loan_first_form_backup.blade');
});


Route::get('/agents', 'AgentsController@index')->middleware(['Common', 'Admin']);
Route::match(['post', 'put'], '/agents/{id?}', 'AgentsController@store')->middleware(['Common', 'Admin']);
Route::delete('/agents/{id}', 'AgentsController@delete')->middleware(['Common', 'Admin']);
Route::get('/agents/{id}', 'AgentsController@edit')->middleware(['Common', 'Admin']);


Route::get('/telecallers', 'TelecallersController@index')->middleware(['Common', 'Admin']);
Route::match(['post', 'put'], '/telecallers/{id?}', 'TelecallersController@store')->middleware(['Common', 'Admin']); 
Route::delete('/telecallers/{id}', 'TelecallersController@delete')->middleware(['Common', 'Admin']);
Route::get('/telecallers/{id}', 'TelecallersController@edit')->middleware(['Common', 'Admin']);

Route::get('/personal_loan_first_form', function () {
    return view('forms.personal_loan_first_form');
});
Route::post('/personal_loan_first_form', 'PersonalLoanController@store_first');
Route::get('/personal_loan_second_form/{employmenttype}', function ($employmenttype) {
    return view('forms.personal_loan_second_form')->with('employmenttype', $employmenttype);
});
Route::post('/personal_loan_second_form', 'PersonalLoanController@store_second');
Route::get('/personal_loan_form/{id}', 'PersonalLoanController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/personal_loan_form/{id}', 'PersonalLoanController@update')->middleware(['Common', 'Telecaller']);
Route::delete('/personal_loan/{id}', 'PersonalLoanController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/PersonalLoan/details', 'PersonalLoanController@index')->middleware('Common');;
Route::get('/personal_loan_export', function() {
    return Excel::download(new PersonalLoanExport, 'PersonalLoanApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/business_loan_form', function () {
    return view('forms.business_loan_form');
});
Route::post('/business_loan_form', 'BusinessLoanController@store');
Route::get('/business_loan_form/{id}', 'BusinessLoanController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/business_loan_form/{id}', 'BusinessLoanController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/business_loan/{id}', 'BusinessLoanController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/BusinessLoan/details', 'BusinessLoanController@index')->middleware('Common');;
Route::get('/business_loan_export', function() {
    return Excel::download(new BusinessLoanExport, 'BusinessLoanApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/home_loan_form', function () {
    return view('forms.home_loan_form');
});
Route::post('/home_loan_form', 'HomeLoanController@store');
Route::get('/home_loan_form/{id}', 'HomeLoanController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/home_loan_form/{id}', 'HomeLoanController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/home_loan/{id}', 'HomeLoanController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/HomeLoan/details', 'HomeLoanController@index')->middleware('Common');;
Route::get('/home_loan_export', function() {
    return Excel::download(new HomeLoanExport, 'HomeLoanApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/loan_against_property_form', function () {
    return view('forms.loan_against_property_form');
});
Route::post('/loan_against_property_form', 'LoanAgainstPropertyController@store');
Route::get('/loan_against_property_form/{id}', 'LoanAgainstPropertyController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/loan_against_property_form/{id}', 'LoanAgainstPropertyController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/loan_against_property/{id}', 'LoanAgainstPropertyController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/LoanAgainstProperty/details', 'LoanAgainstPropertyController@index')->middleware('Common');;
Route::get('/loan_against_property_export', function() {
    return Excel::download(new LoanAgainstPropertyExport, 'LoanAgainstPropertyApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/pos_based_loan_form', function () {
    return view('forms.pos_based_loan_form');
});
Route::post('/pos_based_loan_form', 'PosBasedLoanController@store');
Route::get('/pos_based_loan_form/{id}', 'PosBasedLoanController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/pos_based_loan_form/{id}', 'PosBasedLoanController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/pos_based_loan/{id}', 'PosBasedLoanController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/PosBasedLoan/details', 'PosBasedLoanController@index')->middleware('Common');;
Route::get('/pos_based_loan_export', function() {
    return Excel::download(new PosBasedLoanExport, 'PosBasedLoanApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/credit_card_balance_transfer_form', function () {
    return view('forms.credit_card_balance_transfer_form');
});
Route::post('/credit_card_balance_transfer_form', 'CreditCardBalanceTransferController@store');
Route::get('/credit_card_balance_transfer_form/{id}', 'CreditCardBalanceTransferController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/credit_card_balance_transfer_form/{id}', 'CreditCardBalanceTransferController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/credit_card_balance_transfer/{id}', 'CreditCardBalanceTransferController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/CreditCardBalanceTransfer/details', 'CreditCardBalanceTransferController@index')->middleware('Common');;
Route::get('/credit_card_balance_transfer_export', function() {
    return Excel::download(new CreditCardBalanceTransferExport, 'CreditCardBalanceTransferApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/fixed_deposit_form', function () {
    return view('forms.fixed_deposit_form');
});
Route::post('/fixed_deposit_form', 'FixedDepositController@store');
Route::get('/fixed_deposit_form/{id}', 'FixedDepositController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/fixed_deposit_form/{id}', 'FixedDepositController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/fixed_deposit/{id}', 'FixedDepositController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/FixedDeposit/details', 'FixedDepositController@index')->middleware('Common');;
Route::get('/fixed_deposit_export', function() {
    return Excel::download(new FixedDepositExport, 'FixedDepositApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/current_account_form', function () {
    return view('forms.current_account_form');
});
Route::post('/current_account_form', 'CurrentAccountController@store');
Route::get('/current_account_form/{id}', 'CurrentAccountController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/current_account_form/{id}', 'CurrentAccountController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/current_account/{id}', 'CurrentAccountController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/CurrentAccount/details', 'CurrentAccountController@index')->middleware('Common');;
Route::get('/current_account_export', function() {
    return Excel::download(new CurrentAccountExport, 'CurrentAccountApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/savings_account_form', function () {
    return view('forms.savings_account_form');
});
Route::post('/savings_account_form', 'SavingsAccountController@store');
Route::get('/savings_account_form/{id}', 'SavingsAccountController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/savings_account_form/{id}', 'SavingsAccountController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/savings_account/{id}', 'SavingsAccountController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/SavingsAccount/details', 'SavingsAccountController@index')->middleware('Common');;
Route::get('/savings_account_export', function() {
    return Excel::download(new SavingsAccountExport, 'SavingsAccountApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/demat_account_form', function () {
    return view('forms.demat_account_form');
});
Route::post('/demat_account_form', 'DematAccountController@store');
Route::get('/demat_account_form/{id}', 'DematAccountController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/demat_account_form/{id}', 'DematAccountController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/demat_account/{id}', 'DematAccountController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/DematAccount/details', 'DematAccountController@index')->middleware('Common');;
Route::get('/demat_account_export', function() {
    return Excel::download(new DematAccountExport, 'DematAccountApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/insurance_form', function () {
    return view('forms.insurance_form');
});
Route::post('/insurance_form', 'InsuranceController@store');
Route::get('/insurance_form/{id}', function ($id) {
})->middleware(['Common', 'Telecaller']);
Route::put('/insurance_form/{id}', 'InsuranceController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/insurance/{id}', 'InsuranceController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/Insurance/details', 'InsuranceController@index')->middleware('Common');;
Route::get('/insurance_export', function() {
    return Excel::download(new InsuranceExport, 'InsuranceApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/mutual_funds_form', function () {
    return view('forms.mutual_funds_form');
});
Route::post('/mutual_funds_form', 'MutualFundsController@store');
Route::get('/mutual_funds_form/{id}', 'MutualFundsController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/mutual_funds_form/{id}', 'MutualFundsController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/mutual_funds/{id}', 'MutualFundsController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/MutualFunds/details', 'MutualFundsController@index')->middleware('Common');;
Route::get('/mutual_funds_export', function() {
    return Excel::download(new MutualFundsExport, 'MutualFundsApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/invoice_discounting_form', function () {
    return view('forms.invoice_discounting_form');
});
Route::post('/invoice_discounting_form', 'InvoiceDiscountingController@store');
Route::get('/invoice_discounting_form/{id}', 'InvoiceDiscountingController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/invoice_discounting_form/{id}', 'InvoiceDiscountingController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/invoice_discounting/{id}', 'InvoiceDiscountingController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/InvoiceDiscounting/details', 'InvoiceDiscountingController@index')->middleware('Common');;
Route::get('/invoice_discounting_export', function() {
    return Excel::download(new InvoiceDiscountingExport, 'InvoiceDiscountingApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/lease_rental_discounting_form', function () {
    return view('forms.lease_rental_discounting_form');
});
Route::post('/lease_rental_discounting_form', 'LeaseRentalDiscountingController@store');
Route::get('/lease_rental_discounting_form/{id}', 'LeaseRentalDiscountingController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/lease_rental_discounting_form/{id}', 'LeaseRentalDiscountingController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/lease_rental_discounting/{id}', 'LeaseRentalDiscountingController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/LeaseRentalDiscounting/details', 'LeaseRentalDiscountingController@index')->middleware('Common');;
Route::get('/lease_rental_discounting_export', function() {
    return Excel::download(new LeaseRentalDiscountingExport, 'LeaseRentalDiscountingApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/instant_loan_form', function () {
    return view('forms.instant_loan_form');
});
Route::post('/instant_loan_form', 'InstantLoanController@store');
Route::get('/instant_loan_form/{id}', 'InstantLoanController@edit')->middleware(['Common', 'Telecaller']);
Route::put('/instant_loan_form/{id}', 'InstantLoanController@store')->middleware(['Common', 'Telecaller']);
Route::delete('/instant_loan/{id}', 'InstantLoanController@delete')->middleware(['Common', 'Telecaller']);
Route::get('/InstantLoan/details', 'InstantLoanController@index')->middleware('Common');;
Route::get('/instant_loan_export', function() {
    return Excel::download(new InstantLoanExport, 'InstantLoanApplicants.csv');
})->middleware(['Common', 'Telecaller']);

Route::get('/topup_loan_form', function () {
    return view('forms.topup_loan_form');
});


Route::get('/{pathFile}', function($pathFile){
    return response()->file("/$pathFile");
})->middleware('Common');;

// Route::post('/savings_account_import', function() {
//     Excel::import(new SavingsAccountImport, request()->file('file'));
//     return redirect()->back();
// });
