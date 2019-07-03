@extends('seller.auth.template-seller')

@section('title','Login Seller')

@section('style')
<style>
    a{
        text-decoration-line: none;
    }
    .my-form{
        background-color: aqua;
        position: relative;
        width: 50%;
        height: 50%;
    }

    .my-login-content .my-container{
        margin-top:30vh;
        /* padding-left: 50px; */
        padding-right: 50px;
        background: #fff;   
        display: flex;
        min-height: 80%;
        border-radius: 28px;
        overflow: hidden;
        border-left: #ff9671;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }

    .my-login-content .my-container:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }

    .side-login-panel{

        background-image: url("/img/index/gambar-kado.jpeg");
        background-size:     cover;                      /* <------ */
        background-repeat:   no-repeat;
        background-position: center center;   
        padding: 0;

    }
    
    .login-panel-wrapper{
        padding-top:30px;
        padding-left:30px;

    }
    .login-panel-wrapper input,.login-panel-wrapper {
        border-left: 2px solid #ff9671;
        font-size: 90%;
        /* font-size: 0.8rem; */
    }

    .login-panel-wrapper input{
        background: #eceff1;
    }

    .login-panel-wrapper h3{
        padding-bottom: 24px;
        text-align: center;
        
    }

    #content-side-login{
        background: rgba(168 , 193 , 200, 0.7);
        height:100%;
        width: 100%;
    }
    #desc-login{
        color: #FFF;
        text-align: center;
        justify-content: center;
        /* font: 1.3em sans-serif; */
    }

    body{
        background-image: linear-gradient(to right top, #ff9671, #ffac69, #ffc465, #ffde66, #f9f871);
    }

    .wrapper-login{
        display: flex;
        justify-content: center;
    }

    .my-input{
        padding: 20px;
    }

    .my-btn-size{
        min-width: 100%;;
    }
    #register-page{
     clear: both;
     padding-top:10%;
     align-content: center;
     text-align: center;
    }

    #to-register-page{
        cursor:pointer;
        color:skyblue;
        text-decoration:underline;
    }

    @media only screen and (max-width:600px){
        .my-login-content .my-container{
            margin-top: 10vh;
            padding-bottom: 20vh;
            padding-right: 10px;
           
            /* background-color: transparent; */
            /* padding-left: 10px; */
        }
        .login-panel-wrapper{
            border-left: 0px;
        }

        /* .login-panel-wrapper{
        padding-top:30px;
        padding-left:30px;

    } */
    }

</style>
@endsection

@section('content')

<div class="wrapper-login">

    <section class="my-login-content col-sm-12 col-xl-6">
        {{-- <section class="col-xl-6">
            <img src="{{asset("/img/index/logo.png")}}" alt="" sizes="" srcset="">
        </section> --}}
        <div class="my-container">
            <div class="col-lg-6 d-none d-sm-block side-login-panel">

                <div id="content-side-login">
                    {{-- <img src="{{asset   ("img/index/gift.png")}}" alt=""> --}}
                    {{-- <p id="desc-login">Teks berisi tentang apasaja tentang seller gifuto</p> --}}

                </div>
            </div>
            <div class="col-lg-6 login-panel-wrapper">
                <h3>Login Seller</h3>
                <form action="{{route('seller.login')}}" method="POST">
                    @csrf
                    <div class="form-group">

                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                            aria-describedby="emailHelp" name="email" value="{{ old('email') }}" placeholder="Enter email">



                    </div>

                    <div class="form-group ">


    
                            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->any() ? ' is-invalid' : '' }}"
                                name="password" required>
                            @if ($errors->any())
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first() }}</strong>
                                </span>
                            @endif
               
                    </div>
                    <button type="submit    " class="btn btn-secondary my-btn-size">Login</button>
                <small id="register-page" class="form-text text-muted">Belum punya akun ? <a href="{{route('seller.register.view')}}" id="to-register-page">register
                            disini<span></small>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection