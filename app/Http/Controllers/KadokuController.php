<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGiven;
use DB;
use Auth;
class KadokuController extends Controller
{
    //

    public function index(){

        $kadokus = DB::select('SELECT * FROM user_givens WHERE id_user='.Auth::user()->id.'');
        return view('sale.kadoku',['kadokus'=>$kadokus]);

    }

    public function store_button(){
        return view('sale.store-kadoku');
    }

    public function create_data(Request $req){
        return view('kadoku.user_given');
    }

    public function store_data(Request $request){

        $user_given = new UserGiven();
        $user_given->id_user = auth()->user()->id;
        $user_given->id_user_given = $request->id_penerima;
        $user_given->nama_given = $request->penerima;
        $user_given->umur = $request->umur;
        $user_given->alamat = $request->alamat;
        $user_given->save();

        return $this->index();

        // $store_kado = User::create($request->all());
        // return redirect()->route('kadoku.store');
    }

    public function edit_data(Request $request,$id){
        
        $user_given = DB::table('user_givens')->where('id_user_given', $id)->get();

        return view('sale.edit-kadoku', compact('user_given'));
    }

    public function update_data(Request $request){
        // return $request->all();
        DB::table('user_givens')->where('id_user_given', $request->id_user_given)->update([
            'nama_given' => $request->penerima,
            'umur' => $request->umur,
            'alamat' => $request->alamat
        ]);

        return redirect('kadoku');
    }

    public function delete_data($id){

        DB::table('user_givens')->where('id_user_given', $id)->delete();

        return redirect('kadoku');
    }

    //fungsi rekomendasi
    public function show_rekomendasi($id){

    }
}
