<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAngkatan extends Model
{
    protected $table = 'dataangkatan';
    protected $fillable = [
        'id','name'
    ];
}
