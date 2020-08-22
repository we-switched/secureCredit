<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCardBalanceTransfer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'employmenttype', 'modeofsalary', 'netsalary', 'profit', 'turnover', 'noofcards', 'totalcreditlimit', 'currentoutstanding', 'loanamount', 'delayinpayment'
    ];
}