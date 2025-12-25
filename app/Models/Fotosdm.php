<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fotosdm extends Model
{
    protected $table = 'fotosdm';

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto'
    ];
}
