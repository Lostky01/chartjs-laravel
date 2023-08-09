<?php

namespace App\Imports;

use App\Models\User;
use App\Kelas;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        if (is_numeric($row[2])) {
            return new Kelas([
                'id' => $row[0],
                'name' => $row[1],
                'class' => $row[2],
            ]);
        } else {
            return null;
        }
    }
}
