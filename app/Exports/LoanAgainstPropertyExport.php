<?php

namespace App\Exports;

use App\LoanAgainstProperty;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LoanAgainstPropertyExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LoanAgainstProperty::all('name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'status', 'telecaller', 'city', 'loanamount', 'employmenttype', 'modeofsalary', 'netsalary', 'profit', 'turnover', 'marketvalue', 'governmentvalue', 'typeofproperty', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Top-Up', 'Moratorium', 'Agent', 'Status', 'Telecaller', 'City', 'Loan Amount', 'Type of Employment', 'Mode of Salary', 'Salary', 'Profit', 'Turnover', 'Market Value', 'Govt. Value', 'Type of Property', 'Created at'];
    }
}
