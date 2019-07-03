@extends('layouts.market-app')

@section('content')
<div class="container">

    <div class="container p-3">
        <form action="/kadoku/update" method="POST">
            @csrf
            <h2>Edit Data</h2>

            @foreach ($user_given as $kado)
                
            
            <div class="search-product pos-relative bo4 of-hidden mb-3">
                <input type="hidden" name="id_user_given" value="{{ $kado->id_user_given }}">
                <input class="s-text7 size6 p-l-23 p-r-50" name="penerima" type="text" value="{{ $kado->nama_given }}">
            </div>
            <div class="search-product pos-relative bo4 of-hidden mb-3">
                <input class="s-text7 size6 p-l-23 p-r-50" name="umur" type="text" value="{{ $kado->umur }}">
            </div>
            <div class="search-product pos-relative bo4 of-hidden mb-3">
                <input class="s-text7 size6 p-l-23 p-r-50" name="alamat" type="text" value="{{ $kado->alamat }}">
            </div>
            <div class="w-size2 p-t-20">
                <input type="submit" class="flex-c-m size2 bg0 bo-rad-23 hov1 m-text3 trans-0-4" value="Simpan Perubahan">
            </div>

            @endforeach
        </form>

    </div>
</div>
    
@endsection