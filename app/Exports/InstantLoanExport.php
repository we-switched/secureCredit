<?php

namespace App\Exports;

use App\InstantLoan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InstantLoanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InstantLoan::all('name', 'email', 'phone', 'agent', 'telecaller', 'status', 'city', 'presentaddress', 'permanentaddress', 'aadharmobile', 'netincome', 'loanamount', 'bankingaccess', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Agent', 'Telecaller', 'Status', 'City', 'Present Address', 'Permanent Address', 'Has Aadhar linked Mobile No. ?', 'Monthly Income', 'Loan Amount', 'Has internet banking access for savings account ?', 'Created at'];
    }

}
