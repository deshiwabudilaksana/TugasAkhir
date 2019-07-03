<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class seller extends Authenticatable
{
    //
    use Notifiable;

    protected $fillable =[
        'nama_toko',
        'nama_pemilik',
        'foto_ktp',
        'no_telp',
        'email',
        'password',
    ];

    protected $hidden =[
        'email',
        'password',
    ];
}
