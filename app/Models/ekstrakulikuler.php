<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ekstrakulikuler extends Model
{
    //
     protected $table = 'ekstrakulikuler';

    protected $fillable = [
        'nama',
        'jadwal',
        'foto'
        
    ];  
}
