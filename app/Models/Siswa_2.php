<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa_2 extends Model
{
    //
    protected $table = 'siswa_2';
    protected $fillable = [
        'nama',
        'nisn',
        'alamat',
        'tanggal_lahir',
        'wali_murid',
        'telepon',
        'tanggal_masuk'
    ];
}
