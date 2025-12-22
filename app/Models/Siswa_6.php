<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa_6 extends Model
{
    //
    protected $table = 'siswa_6';
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
