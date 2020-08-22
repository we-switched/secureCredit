<?php

namespace App\Imports;

use App\SavingsAccount;
use Maatwebsite\Excel\Concerns\ToModel;

class SavingsAccountImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SavingsAccount([
            'name' => $row['name'],
            'email' => $row['email'], 
            'phone' => $row['phone'],
            'city' => $row['city']        
        ]);
    }
}
