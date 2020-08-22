<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeLoan extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'topup', 'moratorium', 'agent', 'status', 'telecaller', 'city', 'employmenttype', 'typeofhomeloan', 'modeofsalary', 'netsalary', 'profit', 'turnover', 'loanamount', 'marketvalue', 'katha', 'governmentvalue'
    ];
}