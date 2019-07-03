<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellerSub;
use Mail;
use App\Mail\SellerSubWelcome;

class SellerSubController extends Controller
{
    public function store(Request $request) 
    {
        $this->validate($request, [
            'shop' => 'required',
            'email' => 'required'
        ]);

        $seller_sub = new SellerSub;
        $seller_sub->shop = $request->input('shop');
        $seller_sub->email = $request->input('email');
        $seller_sub->save();

        $email = $request->email;
        $shop = $request->shop;
        // dd($seller);
        try {
            Mail::to($email)->send(new SellerSubWelcome());
            return redirect(route('kado.idex'))->with(compact('shop'));
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }


    }

    public function sendMail(Request $request)
    {
        // dd($request);
        $email = $request->email;
        $shop = $request->shop;
        // dd($seller);
        try {
            Mail::to($email)->send(new SellerSubWelcome());
            return redirect(route('kado.idex'))->with(compact('shop'));
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        
    }
}
