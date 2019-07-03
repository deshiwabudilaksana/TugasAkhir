@extends('layouts.admin')
@section('content')
<div class="row mb-4">
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-primary text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-calendar-alt"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Tanggal Transaksi</p>
                <h4>{{$transaksis->tanggal_transaksi}}</h4>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-danger text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-calendar-times"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Batas Transaksi</p>
                <h4>{{$transaksis->batas_transaksi}}</h4>
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
                <p class="text-uppercase text-secondary mb-0">Status Transaksi</p>
                <h3>{{$transaksis->status}}</h3>
            </div>
        </div>
    </div>
</div>         

<!-- PERTAMA -->
<div class="card mb-4">
    <div class="card-body">
        <h4>Kado:</h4><br>
        <table id="example" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Kado</th>
                    <th>Harga</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->nama_kado}}</td>
                        <td>{{$detail->harga_kado}}</td>
                        <td>{{$detail->jumlah_brg}}</td>
                        <td>{{$detail->harga_kado * $detail->jumlah_brg}}</td>
                    </tr>
                @endforeach
                <tr class="table-active">
                    <th colspan="2">Total</th>
                    <th>{{$transaksis->total_belanja}}</th>
                    <th>{{$transaksis->total_transaksi}}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <h4>Seller:</h4><br>
        <table id="example1" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Kado</th>
                    <th>Nama Toko</th>
                    <th>Nama Pemilik</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>{{$detail->nama_kado}}</td>
                        <td>{{$detail->nama_toko}}</td>
                        <td>{{$detail->nama_pemilik}}</td>
                        <td>{{$detail->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</div>
<div class="card mb-4">
    <div class="card-body">
        <h4>Pengiriman:</h4><br>
        <table id="example2" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Alamat Pengirman</th>
                    <th>Ongkos Kirim</th>
                    <th>Kurir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengirimans as $pengiriman)
                    <tr>
                        <td>{{$pengiriman->nama_depan}}</td>
                        <td>{{$pengiriman->alamat_pengiriman}}</td>
                        <td>{{$pengiriman->total_ongkos_kirim}}</td>
                        <td>{{$pengiriman->nama_kurir_pengiriman}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>  
</div>
<div class="card mb-4">
    <div class="card-body">
        <h4>Bukti Transfer:</h4><br>
        @if (empty($transaksis->bukti_transaksi))
            Belum ada bukti    
        @else
            <div style="display: flex; justify-content: center;">
                <img src="{{ asset('images/bukti/' . $transaksis->bukti_transaksi) }}" align="middle" />
            </div><br>
            @if ($transaksis->status==="waiting_for_verif")
                <div style="float: right; margin: 0 10px 0 0;">
                    <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Terima</button>
                </div>
            @else
            <div style="float: right; margin: 0 10px 0 0;">
                <button type="button" class="btn btn-lg btn-primary" disabled>Terima</button>
            </div>
            @endif
        @endif
    </div>  
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Yakin Ingin Menerima Bukti?</p>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.update-seller',$transaksis->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-primary" >Ya</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    $(document).ready(function () {
        $('#example').DataTable();
        $('#example1').DataTable();
        $('#example2').DataTable();
        
    });
</script> -->
@endsection