<?php

namespace App\Exports;

use App\BusinessLoan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BusinessLoanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BusinessLoan::all('name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'presentaddress', 'permanentaddress', 'officeaddress', 'yearsinbusiness', 'yearsinblr', 'yearsinpresentaddress', 'residence', 'existingloans', 'turnover', 'profit', 'maritalstatus', 'company', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Top-Up', 'Moratorium', 'Agent', 'Telecaller', 'Status', 'City', 'Present Address', 'Permanent Address', 'Office Address', 'No. of years in Business', 'No. of years in Banglaore', 'No. of years in Present address', 'Residence', 'Existing Loan', 'Turnover', 'Profit', 'Marital Status', 'Company', 'Created at'];
    }

}
