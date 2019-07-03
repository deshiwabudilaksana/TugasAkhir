<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\kado;
use App\foto_barang;
use App\seller;

class KadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = $request->filter;  
        $query = ""; 
        if($kategori == 'perempuan' || $kategori == 'laki-laki' ||$kategori == 'anak-anak' || $kategori == 'orang tua'){
            $kados = DB::table('detail_kategori_kados')
            ->join('kategori_kados', 'detail_kategori_kados.id_kategori', '=', 'kategori_kados.id')
            ->join('kados', 'detail_kategori_kados.id_kado', '=', 'kados.id')
            ->join('sellers', 'kados.id_seller', '=', 'sellers.id')
            ->join('foto_barangs', 'foto_barangs.id_kado', '=', 'kados.id')
            ->select('kados.id',
                    'kados.nama_kado',
                    'kados.harga_kado', 
                    'kados.deskripsi', 
                    'sellers.nama_toko', 
                    'kategori_kados.nama_kategori',
                    'foto_barangs.url')
            ->groupBy('kados.nama_kado')
            ->where('kategori_kados.nama_kategori', '=', $kategori)
            ->paginate(5);

        } else{
            $kados = DB::table('detail_kategori_kados')
            ->join('kategori_kados', 'detail_kategori_kados.id_kategori', '=', 'kategori_kados.id')
            ->join('kados', 'detail_kategori_kados.id_kado', '=', 'kados.id')
            ->join('sellers', 'kados.id_seller', '=', 'sellers.id')
            ->join('foto_barangs', 'foto_barangs.id_kado', '=', 'kados.id')
            ->select('kados.id',
                    'kados.nama_kado',
                    'kados.harga_kado', 
                    'kados.deskripsi', 
                    'sellers.nama_toko', 
                    'kategori_kados.nama_kategori',
                    'foto_barangs.url')
            ->groupBy('kados.nama_kado')
            ->paginate(5);
        }

        return view('sale.sale')->with(compact('kados', 'query'));
    }

    public function indexAjax(Request $request)
    {
        $kategori = $request->filter;
        $query = "";
        $page = $request->page;   
        if($kategori == 'perempuan' || $kategori == 'laki-laki' ||$kategori == 'anak-anak' || $kategori == 'orang tua'){
            $kados = DB::table('detail_kategori_kados')
            ->join('kategori_kados', 'detail_kategori_kados.id_kategori', '=', 'kategori_kados.id')
            ->join('kados', 'detail_kategori_kados.id_kado', '=', 'kados.id')
            ->join('sellers', 'kados.id_seller', '=', 'sellers.id')
            ->join('foto_barangs', 'foto_barangs.id_kado', '=', 'kados.id')
            ->select('kados.id',
                    'kados.nama_kado',
                    'kados.harga_kado', 
                    'kados.deskripsi', 
                    'sellers.nama_toko', 
                    'kategori_kados.nama_kategori',
                    'foto_barangs.url')
            ->groupBy('kados.nama_kado')
            ->where('kategori_kados.nama_kategori', '=', $kategori)
            ->paginate(5);

        } else{
            $kados = DB::table('detail_kategori_kados')
            ->join('kategori_kados', 'detail_kategori_kados.id_kategori', '=', 'kategori_kados.id')
            ->join('kados', 'detail_kategori_kados.id_kado', '=', 'kados.id')
            ->join('sellers', 'kados.id_seller', '=', 'sellers.id')
            ->join('foto_barangs', 'foto_barangs.id_kado', '=', 'kados.id')
            ->select('kados.id',
                    'kados.nama_kado',
                    'kados.harga_kado', 
                    'kados.deskripsi', 
                    'sellers.nama_toko', 
                    'kategori_kados.nama_kategori',
                    'foto_barangs.url')
            ->groupBy('kados.nama_kado')
            ->paginate(5);
        }

        return View::make('sale.ajax-sale')->with(compact('kados', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kado = kado::find($id);
        $foto_barangs = foto_barang::where('id_kado', $id)->get();
        $seller = seller::where('id', $kado->id_seller)->first();

        return view('sale.product-detail')->with(compact('kado', 'foto_barangs', 'seller'));
    }

    public function productPayment($id, Request $request)
    {
        $kado = kado::find($id);
        $jumlah = $request->input('num-product');
        $catatan = $request->input('catatan');
        $foto = foto_barang::where('id_kado', $id)->first();
        $seller = seller::where('id', $kado->id_seller)->first();
        
        return view('sale.product-payment')->with(compact('kado', 'foto', 'seller', 'jumlah', 'catatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchAutocomplete(Request $request)
    {
        $query = $request->term;
        $kados = DB::table('detail_kategori_kados')
            ->join('kategori_kados', 'detail_kategori_kados.id_kategori', '=', 'kategori_kados.id')
            ->join('kados', 'detail_kategori_kados.id_kado', '=', 'kados.id')
            ->join('sellers', 'kados.id_seller', '=', 'sellers.id')
            ->select('kados.nama_kado',
                    'kados.harga_kado', 
                    'kados.deskripsi', 
                    'sellers.nama_toko', 
                    'kategori_kados.nama_kategori')
            ->where('kados.nama_kado', 'LIKE', '%'.$query.'%')
            ->groupBy('kados.nama_kado')
            ->limit(8)
            ->get();

        if (count($kados) == 0) {
            $searchArray[] = $query;
        } else {
            foreach ($kados as $kado) {
                $searchArray[] = $kado->nama_kado;
            }
        }

        return $searchArray;
        
    }

    public function search(Request $request)
    {
        $query = $request->term;
        $kados = DB::table('detail_kategori_kados')
            ->join('kategori_kados', 'detail_kategori_kados.id_kategori', '=', 'kategori_kados.id')
            ->join('kados', 'detail_kategori_kados.id_kado', '=', 'kados.id')
            ->join('sellers', 'kados.id_seller', '=', 'sellers.id')
            ->join('foto_barangs', 'foto_barangs.id_kado', '=', 'kados.id')
            ->select('kados.id',
                    'kados.nama_kado',
                    'kados.harga_kado', 
                    'kados.deskripsi', 
                    'sellers.nama_toko', 
                    'kategori_kados.nama_kategori',
                    'foto_barangs.url')
            ->where('kados.nama_kado', 'LIKE', '%'.$query.'%')
            ->groupBy('kados.nama_kado')
            ->paginate(5);

        return view('sale.sale')->with(compact('kados', 'query'));
    }

    public function ajaxSearch(Request $request)
    {
        $query = $request->term;
        $kados = DB::table('detail_kategori_kados')
            ->join('kategori_kados', 'detail_kategori_kados.id_kategori', '=', 'kategori_kados.id')
            ->join('kados', 'detail_kategori_kados.id_kado', '=', 'kados.id')
            ->join('sellers', 'kados.id_seller', '=', 'sellers.id')
            ->join('foto_barangs', 'foto_barangs.id_kado', '=', 'kados.id')
            ->select('kados.id',
                    'kados.nama_kado',
                    'kados.harga_kado', 
                    'kados.deskripsi', 
                    'sellers.nama_toko', 
                    'kategori_kados.nama_kategori',
                    'foto_barangs.url')
            ->where('kados.nama_kado', 'LIKE', '%'.$query.'%')
            ->groupBy('kados.nama_kado')
            ->paginate(5);

        return View::make('sale.ajax-sale')->with(compact('kados', 'query')); 
    }
    
}
