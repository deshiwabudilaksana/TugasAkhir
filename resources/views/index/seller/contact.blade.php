<section id="contact" style="background-color:#f6f6f6;">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title">Tetap terhubung dengan kami !</h1>
            <h4 class="text-center" style="color:#F3C0D9;">Dapatkan update terbaru mengenai Gifuto</h4>
        </div>
        <div class="row justify-content-center">
            <div class="email-form col-lg-6 col-md-10 mx-3 p-4" style="background:#f0f0f0 !important;">
                <form action="{{ route('store.sellersub')}}" method="POST">
                    @csrf
                    <input class="form-control" type="text" name="shop" id="" placeholder="Nama Toko" required>
                    <br>
                    <input class="form-control" type="email" name="email" id="" placeholder="E-mail" required>
                    <br>
                    <div class="d-flex justify-content-center">
                        <button class="btn px-4" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!--subscribe -->