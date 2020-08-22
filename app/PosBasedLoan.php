<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosBasedLoan extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'moratorium', 'agent', 'telecaller', 'status', 'city', 'typeofbusiness', 'cardswipe', 'loanamount'
    ];
}