@extends('seller.auth.template-seller')

@section('title','Daftar menjadi Seller')

@section('style')
<style>



</style>

@endsection

@section('content')
<div class="container register-page">
    <div class="row justify-content-center">

        <div class="my-custom-card col-xl-8 row">
            <div class="col-xl-4 register-info">
                <div id="desc-font">
                    <h3>Daftar Jadi Seller Sekarang</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
                </div>
            </div>
            <div class="col-md-6 col-xl-8 register-panel">
                <div class="card ">
                    {{-- <div class="card-header">{{ __('Register Seller') }}</div> --}}
                    <div class="card-body ">
                        <form method="POST" action="{{ route('seller.register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row justify-content-center">
                                {{-- <label for="nama_toko" class="col-md-4 col-form-label text-md-right">{{ __('Nama
                                    Depan')
                                    }}</label> --}}
                                <div class="col-md-8">
                                    <input id="nama_toko" type="text" class="form-control{{ $errors->has('nama_toko') ? ' is-invalid' : '' }}"
                                        name="nama_toko" value="{{ old('nama_toko') }}" placeholder="nama toko"
                                        required autofocus>
                                    @if ($errors->has('nama_toko'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_toko') }}</strong>
                                    </span>
                                    @endif
                                </div>




                            </div>
                            <div class="form-group row justify-content-center">
                                {{-- <label for="nama_toko" class="col-md-4 col-form-label text-md-right">{{ __('Nama
                                    Depan')
                                    }}</label> --}}
                                <div class="col-md-8">
                                    <input id="nama_pemilik" type="text" class="form-control{{ $errors->has('nama_pemilik') ? ' is-invalid' : '' }}"
                                        name="nama_pemilik" value="{{ old('nama_pemilik') }}" placeholder="nama pemilik"
                                        required autofocus>
                                    <small id="fileHelp" class="form-text text-muted">Nama Pemilik Sesuai dengan Nama KTP</small>
                                    @if ($errors->has('nama_pemilik'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_pemilik') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                {{-- <label for="nama_toko" class="col-md-4 col-form-label text-md-right">{{ __('Nama
                                    Depan')
                                    }}</label> --}}

                                <div class="col-md-8">
                                    <input id="email_seller" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email" value="{{ old('email') }}" placeholder="email"
                                        required autofocus>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="form-group row justify-content-center">
                                {{-- <label for="nama_toko" class="col-md-4 col-form-label text-md-right">{{ __('Nama
                                    Depan')
                                    }}</label> --}}

                                <div class="col-md-8">
                                    <input id="no_telp" type="number" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}"
                                        name="no_telp" value="{{ old('no_telp') }}" placeholder="no telepon"
                                        required autofocus>

                                    @if ($errors->has('no_telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row justify-content-center">


                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        placeholder="konfirmasi password" required>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                    {{-- <label for="nama_toko" class="col-md-4 col-form-label text-md-right">{{ __('Nama
                                        Depan')
                                        }}</label> --}}
    
                                    <div class="col-md-8">
                                            <input type="file" class="form-control{{ $errors->has('foto_ktp') ? ' is-invalid' : '' }}" id="foto_ktp" name="foto_ktp" aria-describedby="fileHelp">
                                            <small id="fileHelp" class="form-text text-muted">Input tanda pengenal Seperti KTP dalam format .jpg,.png</small>
    
                                        @if ($errors->has('foto_ktp'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('foto_ktp') }}</strong>
                                        </span>
                                        @endif
                                    </div>
    
    
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>



            </div>
        </div>

    </div>





</div>
</div>
@endsection