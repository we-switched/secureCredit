<?php

namespace App\Exports;

use App\CurrentAccount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CurrentAccountExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CurrentAccount::all('name', 'email', 'phone', 'agent', 'telecaller', 'status', 'city', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Agent', 'Telecaller', 'Status', 'City', 'Created at'];
    }
}