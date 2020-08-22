<?php

namespace App\Exports;

use App\DematAccount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DematAccountExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DematAccount::all('name', 'email', 'phone', 'agent', 'telecaller', 'status', 'employmenttype', 'netincome', 'city', 'created_at');
    }
    
    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Agent', 'Telecaller', 'Status', 'Type of Employment', 'Net income', 'City', 'Created at'];
    }
}
