<?php

namespace App\Exports;

use App\PosBasedLoan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PosBasedLoanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PosBasedLoan::all('name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'typeofbusiness', 'cardswipe', 'loanamount', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Top-Up', 'Moratorium', 'Agent', 'Telecaller', 'Status', 'City', 'Type of Business', 'Card swipe', 'Loan Amount', 'Created at'];
    }
}
