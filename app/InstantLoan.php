<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstantLoan extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'agent', 'status', 'telecaller', 'city', 'presentaddress', 'permanentaddress', 'aadharmobile', 'netincome', 'loanamount', 'bankingaccess'
    ];
}
