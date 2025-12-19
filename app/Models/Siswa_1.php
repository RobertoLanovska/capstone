<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_1 extends Model
{
    use HasFactory;

    protected $table = 'siswa_1';
    protected $fillable = [
        'nama',
        'nisn',
        'alamat',
        'tanggal_lahir',
        'wali_murid',
        'telepon',
    ];
}
