@extends('client.layouts.master')

@section('title', 'Đăng nhập')

@section('main')

@include('client.inc.search')

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>TRANG ĐĂNG NHẬP</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('auth.post.login') }}" method="POST">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="email" placeholder="Email" style="margin-bottom: 10px;" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Mật khẩu" name="password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Đăng nhập</button>
                </div>
            </div>
            <div class="row justify-content-md-center" >
                <div class="col-lg-6 col-md-6 mt-4">
                    <a href="{{ route('client.social.oauth', ['driver' => 'google']) }}" class="btn btn-lg btn-google btn-block text-uppercase"><i class="fab fa-google mr-2"></i> Đăng nhập với Google</a> 
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection
