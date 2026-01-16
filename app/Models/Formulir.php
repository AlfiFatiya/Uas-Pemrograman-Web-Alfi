<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    //
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'alamat',
        'provinsi',
        'negara',
        'kode_pos',
        'handphone',
        'Latitude',
        'Longitude',
    ];
}