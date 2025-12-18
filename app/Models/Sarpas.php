<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sarpas extends Model
{
    //
    protected $table = 'sarpas';

    protected $fillable = [
        'ruangan',
        'foto'
    ];
}
