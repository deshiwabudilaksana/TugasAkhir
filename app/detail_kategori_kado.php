<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_kategori_kado extends Model
{
    //

    public function kado(){
        return $this->belongsTo('App\kado');
    }
}
