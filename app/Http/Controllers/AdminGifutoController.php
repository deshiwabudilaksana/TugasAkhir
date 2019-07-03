<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\seller;
use App\transaksi;
use App\kado;
use App\detail_transaksi;
use Carbon\Carbon;

class AdminGifutoController extends Controller
{
    public function index()
    {
        $seller = seller::all();
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        $transaksi = transaksi::whereMonth('tanggal_transaksi',$bulan)->whereYear('tanggal_transaksi',$tahun)->get();
        $array =
            [
                // ['Bulan', 'Transaksi'],
                // ['Januari',  transaksi::whereMonth('tanggal_transaksi','1')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Februari',  transaksi::whereMonth('tanggal_transaksi','2')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Maret',  transaksi::whereMonth('tanggal_transaksi','3')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['April',  transaksi::whereMonth('tanggal_transaksi','4')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Mei',  transaksi::whereMonth('tanggal_transaksi','5')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Juni',  transaksi::whereMonth('tanggal_transaksi','6')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Juli',  transaksi::whereMonth('tanggal_transaksi','7')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Agustus',  transaksi::whereMonth('tanggal_transaksi','8')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['September',  transaksi::whereMonth('tanggal_transaksi','9')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Oktober',  transaksi::whereMonth('tanggal_transaksi','10')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['November',  transaksi::whereMonth('tanggal_transaksi','11')->whereYear('tanggal_transaksi',$tahun)->count()],
                // ['Desember',  transaksi::whereMonth('tanggal_transaksi','12')->whereYear('tanggal_transaksi',$tahun)->count()]

                ['Bulan', 'Transaksi', 'Seller'],
                ['Januari',  transaksi::whereMonth('tanggal_transaksi','1')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','1')->whereYear('created_at',$tahun)->count()],
                ['Februari',  transaksi::whereMonth('tanggal_transaksi','2')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','2')->whereYear('created_at',$tahun)->count()],
                ['Maret',  transaksi::whereMonth('tanggal_transaksi','3')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','3')->whereYear('created_at',$tahun)->count()],
                ['April',  transaksi::whereMonth('tanggal_transaksi','4')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','4')->whereYear('created_at',$tahun)->count()],
                ['Mei',  transaksi::whereMonth('tanggal_transaksi','5')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','5')->whereYear('created_at',$tahun)->count()],
                ['Juni',  transaksi::whereMonth('tanggal_transaksi','6')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','6')->whereYear('created_at',$tahun)->count()],
                ['Juli',  transaksi::whereMonth('tanggal_transaksi','7')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','7')->whereYear('created_at',$tahun)->count()],
                ['Agustus',  transaksi::whereMonth('tanggal_transaksi','8')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','8')->whereYear('created_at',$tahun)->count()],
                ['September',  transaksi::whereMonth('tanggal_transaksi','9')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','9')->whereYear('created_at',$tahun)->count()],
                ['Oktober',  transaksi::whereMonth('tanggal_transaksi','10')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','10')->whereYear('created_at',$tahun)->count()],
                ['November',  transaksi::whereMonth('tanggal_transaksi','11')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','11')->whereYear('created_at',$tahun)->count()],
                ['Desember',  transaksi::whereMonth('tanggal_transaksi','12')->whereYear('tanggal_transaksi',$tahun)->count(), seller::whereMonth('created_at','12')->whereYear('created_at',$tahun)->count()]
            ];

        return view('admin.home')->with(compact('seller', 'transaksi','array','tahun'));
    }

    public function detailseller(Request $request,$id)
    {
        $sellers = seller::find($id);
        
        $kados = kado::where('id_seller',$id)->get();

        return view('admin.detail_seller')->with(compact('sellers','kados'));
        
    }

    //cory
    public function status_seller()
    {
        $seller = seller::all();

        return view('admin.status_seller')->with('seller',$seller);
    }
    
    public function edit($id)
    {   
        $seller = seller::find($id);
        return view('admin.edit')->with('seller', $seller);
    }

    public function update(Request $request,$id)
    {   
        $simpan = seller::find($id);
        if($simpan->status_seller==='aktif')
        {
            $simpan->status_seller = 'tidak_aktif';
        }
        else
        {
            $simpan->status_seller = 'aktif';
        }
        $simpan->save();

        return redirect('/admin/status-seller');
    }

    public function status(Request $request,$id)
    {   
        $simpan = transaksi::find($id);
        $simpan->timestamps = false;
        if($simpan->status==='waiting_for_verif')
        {
            $simpan->status = 'verified';
        }
        elseif ($simpan->status==='verified') 
        {
            $simpan->status = 'delivered';
        }
        // else
        // {
        //     $simpan->status = '';
        // }
        $simpan->save();

        return redirect('/admin/transaksi/detail/'.$id);
    }

    // public function expired(Request $request,$id)
    // {   
    //     $simpan = transaksi::find($id);
    //     if($simpan->status==='unverified')
    //     {
    //         $simpan->status = 'expired';
    //     }
    //     $simpan->timestamps = false;
    //     $simpan->save();

    //     return redirect('/admin/transaksi');
    // }
    
    public function transaksi(Request $request)
    {
        $status = $request->filter;  
        $transaksis = transaksi::all();
        if (isset($status) && !empty($status)) {
            $tabeltransaksis = transaksi::where('status', $status)->get();
        }
        else {
            $tabeltransaksis = transaksi::all();
        }
        return view('admin.transaksi')->with(compact('tabeltransaksis','transaksis'));
        
    }

    public function detail(Request $request,$id)
    {
        $transaksis = transaksi::find($id);
        
        $pengirimans = DB::table('transaksis')
        ->where('transaksis.id',$id)
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('kurir_pengirimans', 'transaksis.id_kurir', '=', 'kurir_pengirimans.id')
        ->select('transaksis.*',
                 'users.nama_depan',
                 'kurir_pengirimans.nama_kurir_pengiriman')      
        ->get();
        
        $details = DB::table('detail_transaksis')
        ->where('detail_transaksis.id_transaksi',$id)
        ->join('kados', 'detail_transaksis.id_kado', '=', 'kados.id')
        ->join('sellers', 'detail_transaksis.id_seller', '=', 'sellers.id')
        ->select('detail_transaksis.jumlah_brg',
                 'detail_transaksis.catatan_penjual',
                 'detail_transaksis.id_transaksi',
                 'kados.nama_kado',
                 'kados.harga_kado',
                 'sellers.nama_toko',
                 'sellers.nama_pemilik',
                 'sellers.email')
        ->get();
        return view('admin.detail')->with(compact('details','transaksis','pengirimans'));
        
    }
}
