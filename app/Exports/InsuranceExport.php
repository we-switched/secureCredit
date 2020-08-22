<?php

namespace App\Exports;

use App\Insurance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InsuranceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Insurance::all('name', 'email', 'phone', 'agent', 'telecaller', 'status', 'type', 'employmenttype', 'netincome', 'city', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Agent', 'Telecaller', 'Status', 'Type', 'Type of Employment', 'Net income', 'City', 'Created at'];
    }
}
