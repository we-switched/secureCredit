<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessLoan extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'presentaddress', 'permanentaddress', 'officeaddress', 'yearsinbusiness', 'yearsinblr', 'yearsinpresentaddress', 'residence', 'existingloans', 'turnover', 'profit', 'maritalstatus', 'company'
    ];
}
