<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'agent', 'telecaller', 'status', 'type', 'employmenttype', 'netincome', 'city'
    ];
}
