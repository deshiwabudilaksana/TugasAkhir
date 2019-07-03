@extends('seller.dashboard.template-dashboard')

@section('content')
<section class="body-content my-margin-top-100">


    <div class="nav nav-tabs my-info" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-barang" role="tab"
            aria-controls="nav-home" aria-selected="true">Barang Anda</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="false">Tambah Barang</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
            aria-controls="nav-contact" aria-selected="false">Berhasil</a>
    </div>

    <div class="tab-content wrapper-list-barang" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-barang" role="tabpanel" aria-labelledby="nav-home-tab">

            <div class="row row-barang">
                {{-- {{dd($barang_sellers[2]->detail_kategori_kado)}} --}}
                {{-- {{dd(empty($barang_sellers[19]->foto_barang->first()))}} --}}
                @foreach ($barang_sellers as $barang)
                <div class="card" style="display:inline-block; margin-right:20px; margin-bottom:20px;">

                    @if(empty($barang->foto_barang->first()) === false)
                    <div class="gambar-kotak">
                        <img class="card-img-top my-img-brg" src="{{ asset('images/kados/'.$barang->foto_barang->first()->url.'')}}"
                            alt="Card image cap">
                    </div>
                    @else
                    <div class="gambar-kotak">
                        <img class="card-img-top my-img-brg" src="{{ asset('images/item-cart-03.jpg')}}" alt="Card image cap">
                    </div>
                    @endif

                    <div class="card-body" style="max-width:240px; overflow:auto;">
                        <div style="display:flex;">
                            <h6>{{$barang->nama_kado}}</h6>
                            <h6> Stok : <span>{{$barang->stok}}</span>

                        </div>
                        <h6>Rp. {{$barang->harga_kado}}</h6>
                        <button type="button" class="edit-btn-brg" data-toggle="modal" data-target="#update_modal{{$loop->index}}"><i
                                class="zmdi zmdi-edit zmdi-hc-lg"></i></button>
                        {{-- <a class="edit-btn-brg" href="#"><i class="zmdi zmdi-edit zmdi-hc-lg"></i>
                            data-target="#exampleModalLong"</a> --}}
                        <div>

                        </div>

                    </div>
                </div>
                @include('seller.dashboard.update-barang-modal')

                @endforeach
               


            </div>



        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <form id="insert_barang">
                @csrf

                <div class="input_barang_wrapper">
                    <div class="wrapper-input-barang col-xl-6">



                        <div class="input-produk">

                            <div class="form-group">
                                <input type="text" class="form-control" id="nm_barang" aria-describedby="emailHelp"
                                    placeholder="Nama Produk" required>
                            </div>
                            <div class="form-group">

                                <textarea class="form-control" id="deskripsi_barang" rows="3" placeholder="Deskripsi"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="harga_barang" required placeholder="harga">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="jumlah_barang" required placeholder="Stok Produk">
                            </div>

                            <div class="form-group">
                                <h6>Kategori Barang</h6>
                                <div class="d-block">
                            
                                    @foreach ($kategoris as $kategori)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$kategori->id}}" id="kategori{{$loop->index}}"
                                            name="kategori_kado">
                                        <label class="form-check-label" for="kategori{{$loop->index}}">
                                            {{$kategori->nama_kategori}}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group gambar_data_produk mt-2">
                                <label for="input_gambar" class="btn btn-info">
                                    <i class="zmdi zmdi-cloud-upload zmdi-hc-lg"></i> Pilih Foto
                                </label>

                                <input type="file" class="form-control-file btn btn-info gambar_input" id="input_gambar"
                                    name="gambar_produk" multiple accept="image/x-png, image/gif, image/jpeg, image/jpg"
                                    style="display:none;">
                                <small id="fileHelp" class="form-text text-muted">Foto yang digunakan dengan format
                                    .png
                                    .jpg .jpeg</small>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="upload_data">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xl-6">
                        <div class="foto-barang">
                            <div class=" gambar-kotak-small">

                                <div class="no-image-small ">
                                    <div id="img-add">+</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </form>


        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        </div>
    </div>
    {{-- tambah modal update --}}

</section>

@endsection

@section('javascript')

<script>
    // $('#update_modal').modal({
 
    //     backdrop:true
    // });


    $(document).ready(function () {
        $('#upload_data').on("click", function (e) {
            var el = $(this);
            e.preventDefault();
            var image_files = $('#input_gambar').get(0).files;
            var jumlah_stok = $("#jumlah_barang").val();
            var harga = $("#harga_barang").val();
            var nama_barang = $("#nm_barang").val();
            var deskripsi = $("#deskripsi_barang").val();


            var formData = new FormData();
            formData.append("harga", harga);
            formData.append("nama_barang", nama_barang);
            formData.append("deskripsi", deskripsi);
            formData.append("stok", jumlah_stok);



            for (var i = 0; i < image_files.length; i++) {
                formData.append("gambar[" + i + "]", image_files[i]);
            }



            $.each($("input[name='kategori_kado']:checked"), function (index) {
                // var index = 0;
                // console.log($(this).val());

                // favorite.push($(this).val());x   
                formData.append("kategori[" + index + "]", $(this).val());
                // index = index+1;

            });

            console.log(formData);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('seller.barang.post')}}",
                method: 'post',
                processData: false,
                contentType: false,
                data: formData,
                success: function (result) {
                    alert();
                    document.getElementById('insert_barang').reset();
                }


            });
        });
    });

    $('input[id=input_gambar]').change(function (e) {
        var name = $('input[id=input_gambar]').val();
        var photos = e.target.files;
        // console.log(name);
        // console.log(photos);

        $.each(photos, function (i, file) {


            var reader = new FileReader();

            reader.readAsDataURL(file)

            reader.onload = function (e) {

                var template = '<div class="gambar-kotak-small" style="padding-right:8px;">' +
                    '<img class="card-img-top my-img-brg" src="' + e.target.result +
                    '"alt="Card image cap">' +
                    '</div>';


                $('.foto-barang').append(template);
            }


        });

    });

    function list_kategori(){
        var listKategori  = {{$kategoris}};
        for (const key in list_kategori) {
            if (object.hasOwnProperty(key)) {
                var el = list_kategori[key];
                console.table(el);
            }
        }

    }
</script>

@endsection