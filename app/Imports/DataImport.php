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
        // Log the row for debugging
        \Log::info('Importing row:', $row);

        if (is_numeric($row[3])) {
            return new Kelas([
                'id' => $row[0],
                'name' => $row[1] ?? null,
                'class' => $row[2] ?? null,
                'angkatan' => $row[3] ?? null,
            ]);
        } else {
            return null;
        }
    }
}
