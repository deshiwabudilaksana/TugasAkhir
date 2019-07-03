<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index(){

        return view('sale.user-profile');
    }

    public function store_data(Request $req){
        $mymodel = new Mymodel;
        $mymodel->nama = $req->nama;
        $mymodel->telp = $req->telp;
        $mymodel->email = $req->email;

        $mymodel->save();

        return redirect()->route('user.profile');
    }
}
