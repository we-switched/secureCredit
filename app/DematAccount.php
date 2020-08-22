<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DematAccount extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'agent', 'status', 'telecaller', 'employmenttype', 'netincome', 'city'
    ];
}
