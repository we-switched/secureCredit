<?php

namespace App\Exports;

use App\LeaseRentalDiscounting;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeaseRentalDiscountingExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LeaseRentalDiscounting::all('name', 'email', 'phone', 'agent', 'telecaller', 'status', 'employmenttype', 'netincome', 'city', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone No.', 'Agent', 'Telecaller', 'Status', 'Type of Employment', 'Net income', 'City', 'Created at'];
    }
}
