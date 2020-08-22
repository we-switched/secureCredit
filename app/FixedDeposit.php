<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixedDeposit extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'agent', 'status', 'telecaller', 'city'
    ];
}
