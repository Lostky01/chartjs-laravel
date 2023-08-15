<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'datasiswas';
    protected $fillable = [
        'class',
        'name', 
        'angkatan',
    ];
}
