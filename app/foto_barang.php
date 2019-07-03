<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foto_barang extends Model
{
    //
    
    protected $fillable = [

        'id_kado',
        'url',
        'alt'

    ];

    public function kado(){
        return $this->belongsTo('App\kado');
    }
    


}
