<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MutualFunds extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'agent', 'telecaller', 'status', 'employmenttype', 'netincome', 'city'
    ];}
