<section id="contact">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title">Tetap terhubung dengan kami !</h1>
            <h4 class="text-center" style="color:#F3C0D9;">Dapatkan update terbaru mengenai Gifuto</h4>
        </div>
        <div class="row justify-content-center">
            <div class="email-form col-lg-6 col-md-10 mx-3 p-4">
                <form action="{{ route('store.subscriber') }}" method="POST">
                    @csrf
                    <input class="form-control" type="text" name="name" id="" placeholder="Nama" required>
                    <br>
                    <input class="form-control" type="email" name="email" id="" placeholder="E-mail" required>
                    <br>
                    <div class="d-flex justify-content-center">
                        <button class="btn px-4" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <h5 class="text-center mt-5">Bergabung dengan kami sebagai <a href="/about-seller">Seller di Gifuto</a></h5>
    </div>
</section><!--subscribe -->