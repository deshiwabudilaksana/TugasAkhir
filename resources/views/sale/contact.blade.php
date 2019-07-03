@extends('layouts.market-app')

@section('active4')
    sale-noti
@endsection

@section('content')
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-b-30">
                <div class="p-r-20 p-r-0-lg">
                    <iframe class="p-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1944.5113136335283!2d115.2543515419474!3d-8.637948467094175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23f8dd8edcb95%3A0x1080eecf9db8d6ce!2sBali+Creative+Industry+Center!5e0!3m2!1sen!2sid!4v1540322241425" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <form class="leave-comment">
                    <h4 class="m-text26 p-b-36 p-t-15">
                        Send us your message
                    </h4>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone-number" placeholder="Phone Number">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
                    </div>

                    <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

                    <div class="w-size25">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg0 bo-rad-23 hov1 m-text3 trans-0-4">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection