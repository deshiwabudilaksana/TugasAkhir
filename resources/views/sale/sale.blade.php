@extends('layouts.market-app')

{{-- @section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/noui/nouislider.min.css')}}">
@endsection --}}

@section('active2')
    sale-noti
@endsection

@section('content')
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 pb-4">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <form id="searchField" class="search-product pos-relative bo4 of-hidden mb-3">
                        <input id="searchProduct" class="s-text7 size6 p-l-23 p-r-50" name="term" type="text" placeholder="Cari kado...">

                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

                    <h4 class="m-text14 p-b-7">
                        Kategori
                    </h4>

                    <ul>
                        <li class="p-t-4">
                            <a href="#" class="s-text13 active1 kategori" id="semua-kategori">
                                Semua
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13 kategori" id="laki-laki">
                                Laki-laki
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="{{ route('kado.idex')}}?filter=perempuan" class="s-text13 kategori" id="perempuan">
                                Perempuan
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="{{ route('kado.idex')}}?filter=anak-anak" class="s-text13 kategori" id="anak-anak">
                                Anak-anak
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="{{ route('kado.idex')}}?filter=orang tua" class="s-text13 kategori" id="orang tua">
                                Orang tua
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!--  -->
                {{-- <div class="flex-sb-m flex-w p-b-35">
                    <div class="flex-w">
                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Default Sorting</option>
                                <option>Popularity</option>
                                <option>Price: low to high</option>
                                <option>Price: high to low</option>
                            </select>
                        </div>

                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Price</option>
                                <option>$0.00 - $50.00</option>
                                <option>$50.00 - $100.00</option>
                                <option>$100.00 - $150.00</option>
                                <option>$150.00 - $200.00</option>
                                <option>$200.00+</option>

                            </select>
                        </div>
                    </div>

                    <span class="s-text8 p-t-5 p-b-5">
                        Showing 1–12 of 16 results
                    </span>
                </div> --}}

                <!-- Product -->
                <div id="posts">
                    <div class="row">
                        @if (count($kados) > 0)
                            @if ($query == "")
                
                            @else
                                <span class="col-12 s-text8 p-t-5 p-b-5 mb-3">Hasil pencarian terkait "<b class="color0">{{$query}}</b>"</span>
                            @endif
                            @foreach ($kados as $kado)
                                <div class="col-6 col-md-4 col-lg-3 p-b-50">
                                    <!-- Block2 -->
                                    <div style="cursor:pointer;" class="block2" onclick="window.location='{{ route('kado.detail', $kado->id)}}';">
                                        <div class="block2-img of-hidden pos-relative block2-labelsale">
                                            <div class="image-wrapper">
                                                <img class="foto-kado" src='{{ asset("images/kados/$kado->url")}}' alt="IMG-PRODUCT">
                                            </div>

                                            <div class="block2-overlay trans-0-4">
                                                
                                            </div>
                                        </div>

                                        <div class="block2-txt p-t-20">
                                            <a href="{{ route('kado.detail', $kado->id)}}" class="block2-name dis-block s-text3 p-b-5">
                                                {{$kado->nama_kado}}
                                            </a>

                                            {{-- <span class="block2-oldprice m-text7 p-r-5">
                                                Rp {{number_format(1000000,2)}}
                                            </span> --}}

                                            <span class="block2-newprice m-text8 p-r-5">
                                                Rp {{number_format($kado->harga_kado,2)}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span class="col-12 s-text8 p-t-5 p-b-5">Tidak ditemukan pencarian terkait "<b class="color0">{{$query}}</b>"</span> 
                        @endif
                        
                    </div>
                    {{$kados->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<!-- Pagination -->
{{-- <div class="pagination flex-m flex-w p-t-26">
    <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
    <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
</div> --}}