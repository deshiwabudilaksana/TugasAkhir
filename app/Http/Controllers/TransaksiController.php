<?php

namespace App\Http\Controllers;

use App\detail_transaksi;
use App\foto_barang;
use App\kado;
use App\seller;
use App\transaksi;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;
use DateInterval;
use Intervention\Image\Facades\Image;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = new transaksi;
        // $transaksi = Transaksi::all();
        $kado = kado::where('id', $request->kado)->first();
        // $kado = DB::table('kados'->where('id', $request->input('kado')))->first();
        // return $kado;

        date_default_timezone_set("Asia/Kuala_Lumpur");
        $transaksi->tanggal_transaksi = date("Y-m-d H:i:s");
        $transaksi->batas_transaksi = date("Y-m-d H:i:s", strtotime("+1 hours"));
        $transaksi->alamat_pengiriman = $request->input('alamat_tujuan');
        $transaksi->total_belanja = $request->jumlah;
        $transaksi->total_ongkos_kirim = 0;
        // $kado->harga_kado = $request->harga_kado;
        // $transaksi->total_transaksi = $request->harga_kado;
        
        $transaksi->total_transaksi = ($kado->harga_kado * $transaksi->total_belanja) + $transaksi->total_ongkos_kirim;
        $transaksi->id_user = auth()->user()->id;
        $transaksi->id_kurir = 1;
        $transaksi->id_user_given = 1;
        $transaksi->save();

        $seller = seller::where('id', $request->input('seller'))->first();
        if ($request->input('catatan') == null) {
            $catatan = 'tidak ada';
        } else {
            $catatan = $request->input('catatan');
        }
        return redirect()->back();

        // $detail_trans = array(
        //     'id_transaksi' => $transaksi->id,
        //     'id_kado' => $kado->id,
        //     'jumlah_brg' => $transaksi->total_belanja,
        //     'id_seller' => $seller->id,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
        //     'catatan_penjual' => $catatan
        // );

        // detail_transaksi::insert($detail_trans);

        // return redirect(route('transaksi.detail', $transaksi->id));

        

        // dd($transaksi);
        // return view('');

        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }
}
