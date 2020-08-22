<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavingsAccount extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'agent', 'telecaller', 'status', 'city'
    ];
}
