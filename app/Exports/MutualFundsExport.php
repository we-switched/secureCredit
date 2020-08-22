<?php

namespace App\Exports;

use App\MutualFunds;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MutualFundsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MutualFunds::all('name', 'email', 'phone', 'agent', 'telecaller', 'status', 'employmenttype', 'netincome', 'city', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Agent', 'Telecaller', 'Status', 'Type of Employment', 'Net income', 'City', 'Created at'];
    }
}
