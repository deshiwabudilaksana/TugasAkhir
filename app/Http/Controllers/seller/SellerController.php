<?php

namespace App\Http\Controllers\seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $redirectPage = 'seller.dashboard';
    public function __construct(){
        
    }
    public function index()
    {
        //
        
    }
    public function registerview(){
        return view('seller.auth.register-new');
    }


    public function loginview(){
        return view('seller.auth.login-new');
    }

    
    public function register(Request $request){
        $this->validator($request->all())->validate();
        $foto_ktp = time().$request->foto_ktp->getClientOriginalName();
        $request->foto_ktp->storeAs('public/gambar_ktp',$foto_ktp);
        //membuat pemilik seller
        $pemilik = $this->createData($request->all());

        // autentukasi seller
        $this->guard()->login($pemilik);

        //redirect seller

        return redirect()->intended(route($this->redirectPage));



    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_toko' => 'required|string|max:50',
            'nama_pemilik' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers',
            'foto_ktp' => 'required|image|mimes:jpeg,jpg,png,bmp',
            'no_telp' => 'required|string|max:18',
            'password' => 'required|string|min:6|confirmed',
 
        ]);
    }
    protected function createData(array $data)
    {
        return Seller::create([
            'nama_toko' => $data['nama_toko'],
            'nama_pemilik' => $data['nama_pemilik'],
            'email' => $data['email'],
            'foto_ktp' => $data['foto_ktp'],
            'no_telp' => $data ['no_telp'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function guard(){
        return Auth::guard('web_sellers');
    }


    public function attemptlogin(Request $request){

        $this->validate($request, [
            'email'=> 'required|string',
            'password' => 'required|string',

        ]);

        if($this->guard()->attempt(['email' =>$request->email, 'password' =>$request->password], $request->filled('remember'))) {
            $pemilik = $this->guard()->user()->id;
            return redirect()->route('seller.dashboard');
        }
        // dd("test");
        return $this->sendFailedLoginResponse($request);

    


    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => ["Email atau Password Salah !"],
        ]);
    }
    
    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

}
