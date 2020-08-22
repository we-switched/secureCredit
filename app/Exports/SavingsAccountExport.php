<?php

namespace App\Exports;

use App\SavingsAccount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SavingsAccountExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SavingsAccount::all('name', 'email', 'phone', 'agent', 'telecaller', 'status', 'city', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Agent', 'Telecaller', 'Status', 'City', 'Created at'];
    }
}
