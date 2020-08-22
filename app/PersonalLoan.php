<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalLoan extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'aadhar', 'pan', 'residence', 'presentaddress', 'permanentaddress', 'officeaddress', 'yearsincity', 'yearsinpresentaddress', 'rent', 'qualification', 'uniname', 'yearofpassing', 'maritalstatus', 'existingloans', 'emi', 'reference1', 'reference2', 'company', 'officeemail', 'designation', 'department', 'yearsincompany', 'workexperience', 'employmenttype', 'modeofsalary', 'netsalary', 'profit', 'turnover', 'mothersname', 'loanamount', 'tenure', 'dob', 'photo', 'photoaadharfront', 'photoaadharback', 'photopan', 'pdfpayslip_1', 'pdfpayslip_2', 'pdfpayslip_3', 'pdfbank', 'rentalagreement', 'electricitybill'
    ];
}
