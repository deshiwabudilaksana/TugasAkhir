@extends('layouts.market-app')

{{-- @section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/noui/nouislider.min.css')}}">
@endsection --}}

@section('active2')
    sale-noti
@endsection

@section('content')
<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>

                <div class="slick3">
                    @foreach ($foto_barangs as $foto)
                        <div class="item-slick3" data-thumb="{{ asset("images/kados/$foto->url") }}">
                            <div class="image-wrapper">
                                <img src="{{ asset("images/kados/$foto->url") }}" alt="IMG-PRODUCT">
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="item-slick3" data-thumb="images/thumb-item-01.jpg">
                        <div class="wrap-pic-w">
                            <img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">
                        </div>
                    </div>

                    <div class="item-slick3" data-thumb="images/thumb-item-02.jpg">
                        <div class="wrap-pic-w">
                            <img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">
                        </div>
                    </div>

                    <div class="item-slick3" data-thumb="images/thumb-item-03.jpg">
                        <div class="wrap-pic-w">
                            <img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="w-size14 p-t-30 respon5">
            <h4 class="product-detail-name m-text16 p-b-13">
                {{$kado->nama_kado}}
            </h4>

            <span class="m-text17">
                Rp {{number_format($kado->harga_kado,2)}}
            </span>

            <!--  -->
            <div class="p-t-33 p-b-33">
                <form action="{{ route('kado.payment', $kado->id)}} " method="GET">
                    @csrf
                    <span class="s-text8">Jumlah</span>
                    <div class="flex-m flex-w">
                        <div class="flex-w bo5 of-hidden m-r-22 m-b-10">
                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                            </button>
    
                            <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">
    
                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <span class="s-text8 p-t-10">Catatan untuk penjual</span>
                    <div class="search-product pos-relative bo4 of-hidden mb-3">
                        <input name="catatan" class="s-text7 size6 p-l-23 p-r-50" name="term" type="text" placeholder="Contoh: Warna Putih, Ukuran XL...">
                    </div>
                    <!-- Button -->
                    <button type="submit" class="d-inline   bg0 bo-rad-23 hov1 s-text1 trans-0-4 p-2">
                        Beli sekarang
                    </button>
                    <!-- onclick="window.location=' {{ route('kado.payment', $kado->id)}}';" -->
                    <button class="d-inline   bg0 bo-rad-23 hov1 s-text1 trans-0-4 p-2">
                        Tanyakan Admin
                    </button>
                </form>
            </div>

            <div class="p-b-45">
                <span class="s-text8 m-r-35">Penjual: {{$seller->nama_toko}}</span>
                {{-- <span class="s-text8">Kategori: Mug, Design</span> --}}
            </div>

            <!--  -->
            <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Deskripsi Kado
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        {{$kado->deskripsi}}
                    </p>
                </div>
            </div>

            {{-- <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Additional information
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                    </p>
                </div>
            </div>

            <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Reviews (0)
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                    </p>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
