@extends('layouts.admin')
@section('content')
<style>
    table tr{
        cursor: pointer;
    }
    .d-flex.border{
        cursor: pointer;
    }
</style>

<div id="banner">
    <div class="row mb-4">
        <div class="col-md">
            <div class="d-flex border" status="unverified">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-times"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Unverified</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','unverified')->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md" >
            <div class="d-flex border" status="waiting_for_verif">
                <div class="bg-success text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-clock"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Waiting Verification</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','waiting_for_verif')->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md" >
            <div class="d-flex border" status="verified">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-check "></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Verified</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','verified')->count()}}</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md" >
            <div class="d-flex border" status="expired">
                <div class="bg-danger text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-ban"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Expired</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','expired')->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md" >
            <div class="d-flex border" status="delivered">
                <div class="bg-success  text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-truck"></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Delivered</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','delivered')->count()}}</h3>
                </div>
            </div>
        </div>
        <div class="col-md" >
            <div class="d-flex border" status="success">
                <div class="bg-primary text-light p-4">
                    <div class="d-flex align-items-center h-100">
                        <i class="fa fa-3x fa-fw fa-check "></i>
                    </div>
                </div>
                <div class="flex-grow-1 bg-white p-4">
                    <p class="text-uppercase text-secondary mb-0">Success</p>
                    <h3 class="font-weight-bold mb-0">{{$transaksis->where('status','success')->count()}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<button style="margin-left: 40%;" id="tombol" class="btn btn-primary">All Status</button><br><br>

<div class="card mb-4">
    <div class="card-body">
        Filter: 
        <select id="statusFilter" >
            <option value="">Pilih Status</option>
            <option value="">All Status</option>
            <option value="unverified">Unverified</option>
            <option value="waiting_for_verif">Waiting Verification</option>
            <option value="verified">Verified</option>
            <option value="expired">Expired</option>
            <option value="delivered">Delivered</option>
            <option value="success">Success</option>
        </select>
        <br>
        <br>
        <table id="example" class="table table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Batas Transaksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabeltransaksis as $id => $transaksi)
                    <tr id="table-tr" data-url="{{route('admin.detail',$transaksi->id)}}">
                        <td>{{$transaksi->tanggal_transaksi}}</td>
                        <td>{{$transaksi->batas_transaksi}}</td>
                        <td>{{$transaksi->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>

    $(document).ready(function () {
        $('#example').DataTable({});
    });

    $('#statusFilter').on('change', function(){
        var filter = $(this).val();
        var url = '{!! route('admin.transaksi','filter=:status') !!}'
        url = url.replace(':status', filter);
        window.location = url;
     });
    
    $("#example").on("click", "tr[data-url]", function () {
        window.location = $(this).data("url");
    });

    $("#banner").on("click", "div[status]", function () {
        var filter = $(this).attr("status");
        var url = '{!! route('admin.transaksi','filter=:status') !!}'
        url = url.replace(':status', filter);
        window.location = url;
    });

    $("#tombol").on("click", function () {
        window.location = '{!! route('admin.transaksi') !!}';
    });
    
</script>

@endsection