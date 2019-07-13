<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    //
    public function kategori()
    {
        return $this->belongsTo('App\Kado');
    }
}
