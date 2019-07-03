@extends('layouts.market-app')

@section('custom-css')
    <style>
        .payment-step {
            align-items: center;
            display: flex;
        }
        .payment-step-circle{
            position: relative;
            width: 50px;
        }
        .payment-step-image {
            border-radius: 50%;
            color: #E5418B;
            background-color: #ffffff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            border: 2px solid #E5418B;
            text-align: center;
        }
        .payment-step-image i {
            font-size: 25px;
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }
        .payment-step-line{
            height: 4px;
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
        .status{
            background-color: #19927c;
            color: #ffffff !important;
            border-radius: 30px;
        }
        input[type="file"] {
            display: none;
        }
        .border-file-upload{
            float: right;
            border: 2px dashed #e0e0e0;
            height: 100px;
            width: 100px;
            border-radius: 15px;
        }
        .custom-file-upload {
            /* display: inline-block; */
            /* padding: 6px 12px; */
            cursor: pointer;
            font-size: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            max-height: 100px;
            color: #e0e0e0;
        }
        #previewImage {
            float: right;
            width: 120px;
        }
        #btnUpload {
            float:right; 
            display:none;
        }
    </style>
@endsection

@section('active1')
    sale-noti
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="payment-step justify-content-center mb-2">
            <div class="payment-step-circle">
                <div id="konfirmasi" class="payment-step-image">
                    <i class="fa fa-id-card-o"></i>
                </div>
            </div>
            <div style="background-color: #E5418B !important;" class="payment-step-line">

            </div>
            <div class="payment-step-circle">
                <div id="verifikasi" class="payment-step-image">
                    <i class="fa fa-check-square-o"></i>
                </div>
            </div>
            <div class="payment-step-line">

            </div>
            <div class="payment-step-circle">
                <div id="pengiriman" class="payment-step-image">
                    <i class="fa fa-truck"></i>
                </div>
            </div>
            <div class="payment-step-line">

            </div>
            <div class="payment-step-circle">
                <div id="diterima" class="payment-step-image">
                    <i class="fa fa-shopping-bag"></i>
                </div>
            </div>
        </div>
        <div class="payment-step justify-content-center mb-5 text-center s-text16">
            <div class="payment-step-circle">
                konfirmasi
            </div>
            <div style="background:#ffffff" class="payment-step-line">
            </div>
            <div class="payment-step-circle">
                terverifikasi
            </div>
            <div style="background:#ffffff" class="payment-step-line">
            </div>
            <div class="payment-step-circle">
                dalam pengiriman
            </div>
            <div style="background:#ffffff" class="payment-step-line">
            </div>
            <div class="payment-step-circle">
                kado diterima
            </div>
        </div>
        @if ($trans->bukti_transaksi == null || $trans->bukti_transaksi =="")
            <div class="text-center mb-3">
                <span class="m-text11 d-block">
                    Batas konfirmasi pembayaran: 
                </span>
                <span id="countDownPayment" class="m-text26 color0 d-block mb-4">
                    
                </span>
                <span id="note" class="s-text16 d-block mb-3">
                    @if ($trans->status == "expired")
                        **batas waktu konfirmasi pembayaran telah berakhir**
                    @else
                        **konfirmasi pembayaran dilakukan dengan mengunggah bukti pembayaran pada menu yang tersedia dibawah**
                    @endif
                </span>
                <span id="note" class="s-text16 d-block">
                    BNI - 706024544 -  A/N DESHIWA BUDILAKSANA
                </span>
                <span id="note" class="s-text16 d-block">
                    BRI - 476001008032538 -  A/N DESHIWA BUDILAKSANA
                </span>
                <span id="note" class="s-text16 d-block">
                    Mandiri - 900-00-4195766-4 -  A/N DESHIWA BUDILAKSANA
                </span>
            </div>
        @else
            
        @endif
        <section class="cart row">
            <!-- Total -->
            <div class="col-lg-12 col-md-12">
                <div class="bo9 p-l-30 p-r-30 p-t-30 p-b-30 mb-3" style="overflow:hidden;">
                    <div class="">
                        <span class="m-text11 d-block">
                            status: 
                        </span>
                        <span id="statusTrans" class="s-text20 status px-2">
                            @if ($trans->status == 'unverified')
                                belum konfirmasi pembayaran
                            @elseif($trans->status == 'expired')
                                expired
                            @elseif($trans->status == 'cancelled')
                                dibatalkan
                            @elseif($trans->status == 'delivered')
                                dalam pengiriman
                            @elseif($trans->status == 'success')
                                sukses
                            @elseif($trans->status == 'waiting_for_verif')
                                menunggu verifikasi
                            @elseif($trans->status == 'verified')
                                terverifikasi
                            @endif
                        </span>
                        <br>
                        <span class="s-text20 d-block mt-2">
                            tanggal pesan: {{ date("d F Y, H:i A", strtotime($trans->tanggal_transaksi))}}
                        </span>
                    </div>
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
                                Jumlah: {{$detail_trans->jumlah_brg}}
                            </span>
                            <span class="s-text20 d-block mb-1">
                                Catatan untuk penjual: {{$detail_trans->catatan_penjual}}
                            </span>
                            <span class="s-text20 d-block mb-3">
                                Toko: {{$seller->nama_toko}}
                            </span>
                            <div class="d-block">
                                <span class="m-text11 ">
                                    Total: 
                                </span>
                                <span class="m-text22 color0">
                                    Rp {{number_format($kado->harga_kado * $detail_trans->jumlah_brg,2)}}
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if ($trans->status == 'unverified')
                        <p class="text-right mb-1">upload foto bukti pembayaran</p>
                        <form action="{{ route('transaksi.updateToWaiting', $trans->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div style="overflow:hidden">
                                <div class="border-file-upload">
                                    <label for="buktiTransaksi" class="custom-file-upload">
                                        +
                                    </label>
                                </div>
                                <img class="px-1" id="previewImage" src="" alt="">
                            </div>
                            <input type="file" name="buktiTransaksi" id="buktiTransaksi">
                            <div id="btnUpload" class="w-size1 p-t-20">
                                <!-- Button -->
                                <button type="submit" class="flex-c-m size1 bg0 bo-rad-23 hov1 m-text3 trans-0-4">
                                    Upload	
                                </button>
                            </div>       
                        </form>
                    @else
                        
                    @endif       
                </div>
            </div>
        </section>
    </div>
@endsection

@section('custom-js')
    <script>
        var countDownDate = <?php 
        echo strtotime("$batas_trans" ); ?> * 1000;
        var now = <?php  date_default_timezone_set("Asia/Kuala_Lumpur"); echo strtotime(date("Y-m-d H:i:s", strtotime("+8 hours"))) ?> * 1000;

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get todays date and time
            // 1. JavaScript
            // var now = new Date().getTime();
            // 2. PHP
            now = now + 1000;

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            $('#countDownPayment').html(hours + "h " +
                minutes + "m " + seconds + "s ");

            // If the count down is over, write some text 
            var baseUrl = window.location.protocol+"//"+window.location.host;
            var idTrans = "{{$trans->id}}";
            var statusTrans = "{{$trans->status}}";
            var buktiTrans = "{{$trans->bukti_transaksi}}";
            
            
            
 
            if (distance < 0) {
                clearInterval(x);
                $('#countDownPayment').html("EXPIRED");
                
                $(document).ready( function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    // console.log($("#statusTrans").html());
                    if (buktiTrans == "" && statusTrans == "unverified") {
                        $.ajax({
                            type: "POST",
                            data:{"_method":"put"},
                            url: baseUrl+'/sale/transaction/setexpired/'+idTrans,
                            success: function(){
                                // console.log('sukses');
                            },
                            error: function(){
                                // console.log('error');
                            }
                        });
                        $("#statusTrans").html("expired");
                        $("#note").html("**batas waktu konfirmasi pembayaran telah berakhir**");
                    } else {
                        
                    }
                });      
            }
        }, 1000);

        $(document).ready(function(){
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#previewImage').attr('src', e.target.result);
                $('#btnUpload').show();
            }
   
            function readURL(input) {
                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
            $("#buktiTransaksi").change(function(){
                readURL(this);
            });

        });

        var statusTransaksi = "{{$trans->status}}";
        if (statusTransaksi == "waiting_for_verif") {
            $("#konfirmasi").addClass("active-step");
        } else if(statusTransaksi == "verified") {
            $("#konfirmasi").addClass("active-step");
            $("#verifikasi").addClass("active-step");
        } else if(statusTransaksi == "delivered") {
            $("#konfirmasi").addClass("active-step");
            $("#verifikasi").addClass("active-step");
            $("#pengiriman").addClass("active-step");
        } else if(statusTransaksi == "success") {
            $("#konfirmasi").addClass("active-step");
            $("#verifikasi").addClass("active-step");
            $("#pengiriman").addClass("active-step");
            $("#diterima").addClass("active-step");
        }
    </script>
@endsection


