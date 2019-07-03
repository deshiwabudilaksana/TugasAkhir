@extends('layouts.market-app')

@section('custom-css')
    <style>
        .payment-step {
            align-items: center;
            display: flex;
        }
        .payment-step-circle{
            position: relative;
            width: 80px;
        }
        .payment-step-image {
            border-radius: 50%;
            color: #E5418B;
            background-color: #ffffff;
            width: 80px;
            height: 80px;
            line-height: 80px;
            border: 2px solid #E5418B;
            text-align: center;
        }
        .payment-step-image i {
            font-size: 40px;
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }
        .payment-step-line{
            height: 8px;
            width: 180px;
            margin-left: 5px;
            margin-right: 5px;
            background-color: #E5418B;
        }
        .payment-step-circle .active-step {
            background-color: #E5418B !important;
            color:#ffffff; 
        }
        .form-box {
            border-radius: 16px;
            box-shadow: 0 0 3px rgba(0,0,0,.3);
            margin-bottom: 20px;
            padding: 24px 42px;
            width: 100%;
        }
    </style>
@endsection

@section('active2')
    sale-noti
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="payment-step justify-content-center mb-2">
            <div class="payment-step-circle">
                <div class="payment-step-image active-step">
                    <i class="fa fa-id-card-o"></i>
                </div>
            </div>
            <div class="payment-step-line">

            </div>
            <div class="payment-step-circle">
                <div class="payment-step-image">
                    <i class="fa fa-check-square-o"></i>
                </div>
            </div>
            <div class="payment-step-line">

            </div>
            <div class="payment-step-circle">
                <div class="payment-step-image">
                    <i class="fa fa-truck"></i>
                </div>
            </div>
            <div class="payment-step-line">

            </div>
            <div class="payment-step-circle">
                <div class="payment-step-image">
                    <i class="fa fa-shopping-bag"></i>
                </div>
            </div>
        </div>
        <div class="payment-step justify-content-center mb-5 text-center">
            <div class="payment-step-circle">
                checkout
            </div>
            <div style="background:#ffffff" class="payment-step-line">
            </div>
            <div class="payment-step-circle">
                verifikasi
            </div>
            <div style="background:#ffffff" class="payment-step-line">
            </div>
            <div class="payment-step-circle">
                pengiriman kado
            </div>
            <div style="background:#ffffff" class="payment-step-line">
            </div>
            <div class="payment-step-circle">
                selesai
            </div>
        </div>
        {{-- <h4 class="mt-5 text-center m-text16">
            Cek kembali pesanan anda
        </h4> --}}

        
            <form action="{{ route('transaksi.store') }}" method="post">
                @csrf
                <input type="hidden" name="kado" value="{{$kado->id}}">
                <input type="hidden" name="foto" value="{{$foto}}">
                <input type="hidden" name="seller" value="{{$seller}}">
                <input type="hidden" name="jumlah" value="{{$jumlah}}">
                <input type="hidden" name="catatan" value="{{$catatan}}">
                <section class="cart row">
                <!-- Total -->
                <div class="col-lg-8 col-md-8">
                    <div class="bo9 p-l-30 p-r-30 p-t-30 p-b-30 mb-3">
                        <span class="m-text18 w-size19 w-full-sm">
                            Alamat Tujuan:
                        </span>
    
                        <div class=" w-full-sm">
                            <div class="search-product pos-relative bo4 of-hidden mb-3">
                                <input name="alamat_tujuan" class="s-text7 size6 p-l-23 p-r-50" name="term" type="text" placeholder="Alamat tujuan..." required>
                            </div>
                        </div>
                    </div>
                    <div class="bo9 p-l-30 p-r-30 p-t-30 p-b-30 mb-3">
                        <span class="m-text18 w-size19 w-full-sm">
                            Penjual: {{$seller->nama_toko}}
                        </span>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-4">
                                <div class="image-wrapper">
                                    <img src="{{ asset("images/kados/$foto->url")}}" alt="IMG-PRODUCT">
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-9 col-8">
                                <span class="m-text11 d-block mb-1">
                                    {{$kado->nama_kado}}
                                </span>
                                
                                <span class="m-text22 d-block mb-1 color0">
                                    Rp {{number_format($kado->harga_kado,2)}}
                                </span>
                                <span class="s-text20 d-block mb-1">
                                    Jumlah: {{$jumlah}}
                                </span>
                                <span class="s-text20 d-block">
                                    Catatan: @if ($catatan == null)
                                        tidak ada
                                    @else
                                        {{$catatan}}
                                    @endif 
                                </span>
                            </div>
                        </div>
                        <hr>
                        <span class="m-text11 ">
                            Total: 
                        </span>
                        <span class="m-text22 color0">
                            Rp {{number_format($kado->harga_kado * $jumlah,2)}}
                        </span>                    
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-4">
                    <div class="bo9 p-l-30 p-r-30 p-t-30 p-b-30">
                        <div class="mb-3">
                            <span class="m-text11 ">
                                Sub Total: 
                            </span>
                            <span class="m-text22 color0">
                                Rp {{number_format($kado->harga_kado * $jumlah,2)}}
                            </span>
                        </div>
                        
                        <div class="size1 trans-0-4">
                            <button type="submit" class="flex-c-m sizefull bg0 bo-rad-23 hov1 s-text1 trans-0-4">
                                Bayar
                            </button>
                        </div>
                    </div>
                </div>
                </section>
            </form>
            
        
            
    </div>
@endsection


