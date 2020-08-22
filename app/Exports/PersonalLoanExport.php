<?php

namespace App\Exports;

use App\PersonalLoan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PersonalLoanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PersonalLoan::all('name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'pan', 'aadhar', 'residence', 'presentaddress', 'permanentaddress', 'officeaddress', 'yearsincity', 'yearsinpresentaddress', 'rent', 'qualification', 'uniname', 'yearofpassing', 'maritalstatus', 'existingloans', 'emi', 'reference1', 'reference2', 'employmenttype', 'profit', 'turnover', 'modeofsalary', 'netsalary', 'company', 'officeemail', 'designation', 'department', 'yearsincompany', 'workexperience', 'mothersname', 'loanamount', 'tenure', 'dob', 'created_at');
    }

    public function headings(): array
    {
        return ['Name', 'Personal Email', 'Phone No.', 'Top-Up', 'Moratorium', 'Agent', 'Telecaller', 'Status', 'City', 'PAN No.', 'Aadhar No.', 'Residence Type', 'Present Address', 'Permanent Address', 'Office Address', 'No. of years in current city', 'No. of years in Present address', 'Rent', 'Qualification', 'University', 'Year of passing', 'Marital Status', 'Existing Loans', 'EMI', 'Reference 1', 'Reference 2', 'Type of Employment', 'Profit', 'Turnover', 'Mode of Salary', 'Salary', 'Company', 'Office Email', 'Designation', 'Department', 'No. of years in company', 'Work Experience', 'Mother\'s Name', 'Loan AMount', 'Tenure', 'DOB', 'Created at'];
    }
}
