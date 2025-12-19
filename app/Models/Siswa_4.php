<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa_4 extends Model
{
    //
    protected $table = 'siswa_4';
    protected $fillable = [
        'nama',
        'nisn',
        'alamat',
        'tanggal_lahir',
        'wali_murid',
        'telepon',
    ];
}
