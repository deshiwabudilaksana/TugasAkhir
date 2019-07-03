@extends('layouts.admin')
@section('content')
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-primary text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-user"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Nama Seller</p>
                <h4>{{$sellers->nama_toko}}</h4>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-danger text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-gift"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Jumlah Kado</p>
                <h4>{{$kados->count()}}</h4>
            </div>
        </div>
    </div>

    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-success text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-info"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Status</p>
                <h3>{{$sellers->status_seller}}</h3>
            </div>
        </div>
    </div>
</div>         

<!-- PERTAMA -->
<div class="card mb-4">
    <div class="card-body">
        <h4>List Kado:</h4><br>
        <table id="example" class="table table-hover" >
            <thead>
                <tr>
                    <th>Nama Kado</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kados as $kado)
                    <tr>
                        <td>{{$kado->nama_kado}}</td>
                        <td>{{$kado->harga_kado}}</td>
                        <td>{{$kado->stok}}</td>
                        <td>{{$kado->deskripsi}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@endsection