<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kado extends Model
{
    //

    protected $fillable = [
        'nama_kado',
        'harga_kado',
        'id_seller',
        'deskripsi',
        'stok'
    ];


    public function foto_barang(){

        return $this->hasMany('App\foto_barang','id_kado');
        
    }

    public function detail_kategori_kado(){
        return $this->hasMany('App\detail_kategori_kado','id_kado');
    }

    public function transaksi(){
        return $this->hasMany('App\transaksi', 'id_kado');
    }

    public function all_relation(){
        return $this->foto_barang->merge($this->kategori_kado);
    }
    
}
