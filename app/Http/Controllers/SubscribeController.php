<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;
use Mail;

class SubscribeController extends Controller
{
    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $subscriber = new Subscriber;
        $subscriber->name = $request->input('name');
        $subscriber->email = $request->input('email');
        $subscriber->save();

        // Mail::send(['text'=>'seller.email'],['name','Gifutoid'],function($message){
        //     $message->to('putubagus32@gmail.com','To Putu')->subject('Test Mail');
        //     $message->from('gifuto.official@gmail.com', 'Gifutoid');
        // });

        return redirect()->route('kado.idex');
    }
}
