@extends('seller.dashboard.template-dashboard')


@section('content')
<section class="body-content">
    <div class="row my-margin-top-100">
        <div class="col-lg-3 col-sm-6 my-custom-card-dashboard">
            <div class="card hover-card h-100">
                <div class="card-body align-items-center">
                    <div class="ic-wrapper align-items-center">
                        <i class="zmdi zmdi-money  zmdi-hc-3x"></i>
                    </div>
                    <div class="custom-card-title ">
                        <h5 class="card-title cus-card" style="color:#43a047;"> 1 </h5>
                        <p>Transaksi Baru</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 my-custom-card-dashboard">
            <div class="card hover-card h-100">
                <div class="card-body align-items-center">
                    <div class="ic-wrapper align-items-center blue-sky-clr">
                        <i class="zmdi zmdi-assignment  zmdi-hc-3x"></i>
                    </div>
                    <div class="custom-card-title ">
                        <h5 class="card-title cus-card" style="color:#bbdefb;"> 1 </h5>
                        <p>Menunggu Verifikasi</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 my-custom-card-dashboard">
            <div class="card hover-card h-100">
                <div class="card-body align-items-center">
                    <div class="ic-wrapper align-items-center" style="background-color:#f48fb1;">
                        <i class="zmdi zmdi-truck  zmdi-hc-3x"></i>
                    </div>
                    <div class="custom-card-title ">
                        <h5 class="card-title cus-card" style="color:#f48fb1;"> 1 </h5>
                        <p>Menunggu Verifikasi</p>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <div class="nav nav-tabs my-info" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
            aria-controls="nav-home" aria-selected="true">Menunggu Verifikasi</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
            aria-controls="nav-profile" aria-selected="false">Pengiriman</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
            aria-controls="nav-contact" aria-selected="false">Berhasil</a>
    </div>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="detail-transaction hover-card-light container">
                <div class="user-detail">
                    <div class="user-detail-trans">
                        <h6>Laptop ROG</h6>
                        <h6 class="padding-custom">Total :<span id="font-price" style="color:#FF5733;">Rp. 60.000</span></h6>
                    </div>
                    <div>
                        <h6 class="letter-1">TRANS/11/08/2018/9901</h6>
                    </div>
                    <div>
                        <h6>11 Agustus 2018 12:00</h6>
                    </div>
                    <div>
                        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Lihat Bukti
                            Transfer</button>
                    </div>
                </div>
                <div class="verification-payment">
                    <h6>Nama User</h6>
                    <h6>Alamat Pengiriman : <span>Jln. Tohpati</span></h6>
                    <h6>Status Pembayaran : <span> </span> </h6>
                    <h6>Catatan User:</h6>
                    <p style="background-color:#FCF7EC;">Lorem ipsum dolor sit amet, nostro accusata eam eu, sint
                        graecis has et, an dicam theophrastus
                        mel.</p>




                </div>
                <div>
                    <button class="btn btn-info">verifikasi</button>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">


        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')


@endsection