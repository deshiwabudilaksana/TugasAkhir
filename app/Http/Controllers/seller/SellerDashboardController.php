<?php

namespace App\Http\Controllers\seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\seller;
use App\kado;
use App\foto_barang;
use App\kategori_kado;
use App\detail_kategori_kado;
use DB;
use Auth;


class SellerDashboardController extends Controller
{
 
    // 

    public function __construct(){
      
      
    }
    
    public function dashboard_view(){
        return view('seller.dashboard.main-dashboard');        
    }


    public function barang_view(){
        $kategoris = kategori_kado::all();
        $id_seller = $this->getIdSeller();

        $barang_sellers = kado::with('foto_barang','detail_kategori_kado')->where('id_seller',$id_seller)->get();
        return view('seller.dashboard.barang-dashboard',compact('kategoris','barang_sellers'));        
    }


    public function upload_barang(Request $request){
       $kado = new kado;

       $this->validate($request,[
        'harga'=>'required|numeric',
        'stok'=>'required|numeric',
        'nama_barang'=>'required|string',
        'deskripsi'=>'required|string',
        'gambar'=>'required|array',
        'gambar.*'=> 'required|image|mimes:jpeg,jpg,png,bmp',
        'kategori'=>'required|array',
        'kategori.*'=>'exists:kategori_kados,id'

       ]);
        $gambars = $request->gambar; // array of image
        $kategoris = $request->kategori; // array of category
        $kado->nama_kado =$request->nama_barang ;
        $kado->harga_kado =$request->harga ;
        $kado->id_seller = $this->getIdSeller(); // save by seller id
        $kado->deskripsi =$request->deskripsi;
        $kado->stok =$request->stok;
        $kado->save();


        foreach($gambars as $gambar){
            $nama_foto = time().$gambar->getClientOriginalName();
            $gambar->move(public_path('images/kados'),$nama_foto);
            $alt = "beli-kado-".$kado->nama_kado."-murah";
            $data = array(
                'id_kado'=> $kado->id,
                'url' => $nama_foto,
                'alt' => $alt
            );
            $input_data[] = $data;
        }


        foreach($kategoris as $kategori)
        {
            $kategori = array(
                'id_kategori' => $kategori,
                'id_kado' => $kado->id    
            );
            $kategori_kados[] = $kategori;
        }
    
        foto_barang::insert($input_data);
        detail_kategori_kado::insert($kategori_kados);

        return response()->json(['status' => 'sukses menambahkan barang'],200);
    }

    public function transaksi_view(){



    }


    public function profil_view(){

    }


    public function chat_view(){

    }


    public function create_barang(){
        
    }

    protected function guard(){
        return Auth::guard('web_sellers');
    }

    protected function getIdSeller(){
        return Auth::guard('web_sellers')->user()->id;
    }
}
