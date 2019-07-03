@extends('layouts.market-app')

@section('content')
<div class="container">
    
    <div class="container p-3">
        <form action="{{ route('kadoku.store')}}" method="POST">
            @csrf
            <h2>Input Data Disini</h2>
            <div class="search-product pos-relative bo4 of-hidden mb-3">
                <input class="s-text7 size6 p-l-23 p-r-50" name="penerima" type="text" placeholder="Nama Penerima">
            </div>
            <div class="search-product pos-relative bo4 of-hidden mb-3">
                <input class="s-text7 size6 p-l-23 p-r-50" name="umur" type="text" placeholder="Umur">
            </div>
            <div class="search-product pos-relative bo4 of-hidden mb-3">
                <input class="s-text7 size6 p-l-23 p-r-50" name="alamat" type="text" placeholder="Alamat">
            </div>
            <div class="w-size2 p-t-20">
                <button type="submit" class="flex-c-m size2 bg0 bo-rad-23 hov1 m-text3 trans-0-4">Tambah Data Disini</button>
            </div>
        </form>
    </div>
    
</div>
@endsection