<?php

namespace App\Http\Controllers;

use App\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $redirectTo = 'admin.home';

    protected function guard(){
        return Auth::guard('web_admins');
    }

    /**
     * cek udah login atau belum.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * cek session masih atau belum.
     */
    public function index()
    {
        //
        if ($this->guard()->check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.login');
    }

    public function attemptlogin (Request $request){
        $this->validate($request, [
            'email'=> 'required|string',
            'password' => 'required|string',

        ]);

        if($this->guard()->attempt(['email' =>$request->email, 'password' =>$request->password], $request->filled('remember'))) {
            $pemilik = $this->guard()->user()->id;
            return redirect()->route('admin.home');
        }
        return $this->sendFailedLoginResponse($request);

    


    }

    /* Fungsi sendFailedLoginResponse(Request $request) untuk memberi
    notifikasi error jika email atau password yang diinputkan 
    salah
    */

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    

    /* fungsi logout(Request $request) untuk melakukan loggout pada
    pemilik kendaraan di halaman dashboard pemilik kendaraan
    */
    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
  
    public function ShowRegisterForm(){

        return view('admin.auth');
    }

    /* fungsi register(Request $request) untuk menjalankan beberapa fungsi yang ada
    seperti fungsi validator dan fungsi create, apabila semua data yang dimasukan benar
    maka akan menuju halaman dashboard pemilik */
    
    public function register(Request $request){
        $this->validator($request->all())->validate();

        $foto_ktp = time().$request->ktp->getClientOriginalName();
        $request->ktp->storeAs('public/gambar_ktp',$foto_ktp);
        //membuat pemilik penyewa
        $pemilik = $this->create($request->all());

        // autentukasi penyewa
        $this->guard()->login($pemilik);

        //redirect penyewa

        return redirect($this->redirectpath);



    }

    /* Fungsi validator(array $data) merupakan fungsi
    untuk melakukan validasi pada tiap data pemilik 
    kendaraan yang ada,tergantung dari data tersebut

    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_admin' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|min:8',
 
        ]);
    }

    /* Fungsi create(array $data) untuk memasukan semua data request
    kedalam variabel yang berada didalam array, yang nanti nilai tiap 
    variabel akan masuk ke database dengan eloquent
    */
    protected function create(array $data)
    {
        return Pemilik::create([
            'nama_admin' => $data['nama_admin'],
            'email' => $data['email'],
            'username' => $data ['username'],
            'password' => bcrypt($data['password']),
        ]);
    }


}
