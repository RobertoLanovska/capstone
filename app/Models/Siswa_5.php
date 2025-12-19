<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa_5 extends Model
{
    //
    protected $table = 'siswa_5';
    protected $fillable = [
        'nama',
        'nisn',
        'alamat',
        'tanggal_lahir',
        'wali_murid',
        'telepon',
    ];
}
