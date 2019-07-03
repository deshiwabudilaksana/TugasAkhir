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
                <p class="text-uppercase text-secondary mb-0">Seller Aktif</p>
                <h3 class="font-weight-bold mb-0">{{$seller->where('status_seller','aktif')->count()}}</h3>
            </div>
        </div>
    </div>
<!-- </div>
<div class="row mb-4"> -->
    <div class="col-md">
        <div class="d-flex border">
            <div class="bg-danger text-light p-4">
                <div class="d-flex align-items-center h-100">
                    <i class="fa fa-3x fa-fw fa-user-times"></i>
                </div>
            </div>
            <div class="flex-grow-1 bg-white p-4">
                <p class="text-uppercase text-secondary mb-0">Seller Tidak Aktif</p>
                <h3 class="font-weight-bold mb-0">{{$seller->where('status_seller','tidak_aktif')->count()}}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="row"><div class="col-sm-12">
            <table id="example" class="table table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr role="row">
                        <th>Nama Toko</th>
                        <th>Nama Pemilik</th>
                        <th>Status Seller</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seller as $id => $sell)
                        <tr >
                            <td>{{$sell->nama_toko}}</td>
                            <td>{{$sell->nama_pemilik}}</td>
                            <td>{{$sell->status_seller}}</td>
                            <td>
                                @if ($sell->status_seller==='aktif')
                                    
                                <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{$id}}">Non-Aktifkan</button>
                                
                                @elseif ($sell->status_seller==='tidak_aktif')
                                
                                <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$id}}">Aktifkan</button>
                                @endif
                            </td>
                        </tr>
                        <div id="myModal-{{$id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>Yakin Ingin Mengubah?...</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('admin.update-status',$sell->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit"   class="btn btn-primary" >ya</button>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
    $(document).ready(function () {
        $('#contoh').DataTable();
    });
</script>
@endsection

