<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori_kado extends Model
{
    //
    protected $fillable = [
        'id_kategori',
        'id_kado'
    ];

    public function sub_kategori()
    {
        return $this->hasMany('App\SubKategori');
    }
}
