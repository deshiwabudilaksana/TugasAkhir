<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{

    public $timestamps = false;
    public function details()
    {
        return $this->hasMany('App\detail_transaksi','id_transaksi'); 
    }

    public function getKado()
    {
        return $this->details->lists('kado');
    }
}
