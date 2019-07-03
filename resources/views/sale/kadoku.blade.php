@extends('layouts.market-app')

@section('content')
<div class="wrap-table-shopping-cart bgwhite">
    <table class="table-shopping-cart">
        <title>Cari Rekomendasi Kado Disini</title>
        <tr class="table-head">
            <td>Nama</td>
            <td>Umur</td>
            <td>Alamat</td>
            <td>Opsi</td>
        </tr>
        @foreach ($kadokus as $kadoku)
        <tr class="table-row">
            <td>{{$kadoku->nama_given}}</td>
            <td>{{$kadoku->umur}}</td>
            <td>{{$kadoku->alamat}}</td>
            <td>
            <a href="kadoku/edit/{{ $kadoku->id_user_given }}">Edit</a>
                |
            <a href="kadoku/delete/{{ $kadoku->id_user_given }}">Hapus</a>
            </td>
        </tr>    
        @endforeach
    </table>    
</div class="w-size2 p-t-20">
    <a href="store_button" class="flex-c-m size2 bg0 bo-rad-23 hov1 m-text3 trans-0-4">Tambah Data Disini</a>
<div>

</div>
@endsection