<?php

namespace App\Exports;

use App\CreditCardBalanceTransfer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CreditCardBalanceTransferExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CreditCardBalanceTransfer::all('name', 'email', 'phone', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'employmenttype', 'modeofsalary', 'netsalary', 'profit', 'turnover', 'noofcards', 'totalcreditlimit', 'currentoutstanding', 'loanamount', 'delayinpayment', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Moratorium', 'Agent', 'Telecaller', 'Status', 'City', 'Type of Employment', 'Mode of Salary', 'Salary', 'Profit', 'Turnover', 'No. of Cards', 'Total Credit Limit', 'Current Outstanding', 'Loan Amount', 'Delay in payment', 'Created at'];
    }
}
