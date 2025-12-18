<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
     protected $table = 'Berita';

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto'
    ];  
}
