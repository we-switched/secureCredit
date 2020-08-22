<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanAgainstProperty extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'status', 'telecaller', 'city', 'loanamount', 'employmenttype', 'modeofsalary', 'netsalary', 'profit', 'turnover', 'marketvalue', 'governmentvalue', 'typeofproperty'
    ];
}
