<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentAccount extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'agent', 'status', 'telecaller', 'city'
    ];
}
