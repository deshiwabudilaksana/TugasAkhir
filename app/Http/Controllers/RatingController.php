<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rating;

class RatingController extends Controller
{
    public function index()
    {
        return view('rating.rating');
    }
    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/rating');
            $image->move($destinationPath, $name);
            
            $data = new rating();
            $data->timestamps = false;
            $data->rating = $request->rating;
            $data->deskripsi = $request->deskripsi; 
            $data->image = $name;
            $data->save();


            return back()->with('success','Image Upload successfully');
        }

        // $file = $request->file('image');
        // $this->validator($request->all())->validate();
        // $image = time().$request->image->getClientOriginalName();
        // $path = $file->store('public/images/rating');
        // $request->image->storeAs('public/images/rating',$image);
        
        // $file = File::create([
        //     'image' => $path
        // ]);
        
        // return redirect()->back();
    }
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         // 'nama_toko' => 'required|string|max:50',
    //         // 'nama_pemilik' => 'required|string|max:255',
    //         // 'email' => 'required|string|email|max:255|unique:sellers',
    //         'image' => 'required|image|mimes:jpeg,jpg,png,bmp',
    //         // 'no_telp' => 'required|string|max:18',
    //         // 'password' => 'required|string|min:6|confirmed',
 
    //     ]);
    // }
}
