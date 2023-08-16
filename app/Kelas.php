<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'datasiswas';
    protected $fillable = [
        'name',
        'class',
        'angkatan',
    ];

    public function kelasInfo()
    {
        return $this->belongsTo(dataKelas::class, 'class', 'id');
    }

    public function angkatanInfo()
    {
        return $this->belongsTo(dataAngkatan::class, 'angkatan', 'id');
    }
}
