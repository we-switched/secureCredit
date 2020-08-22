<?php

namespace App\Exports;

use App\HomeLoan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HomeLoanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return HomeLoan::all('name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'employmenttype', 'typeofhomeloan', 'modeofsalary', 'netsalary', 'profit', 'turnover', 'loanamount', 'marketvalue', 'governmentvalue', 'katha', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Top-Up', 'Moratorium', 'Agent', 'Telecaller', 'Status', 'City', 'Type of Employment', 'Type of Home loan', 'Mode of Salary', 'Salary', 'Profit', 'Turnover', 'Loan Amount', 'Market value', 'Govt. value', 'Katha', 'Created at'];
    }

}
