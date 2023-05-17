@extends('client.layouts.master')

@section('title', 'Đăng ký')

@section('main')

@include('client.inc.search')

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>TRANG ĐĂNG KÝ</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('auth.post.register') }}" method="POST">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Họ tên" style="margin-bottom: 10px;" name="name" value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Email" style="margin-bottom: 10px;" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Mật khẩu" style="margin-bottom: 10px;" name="password" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <input type="password" placeholder="Xác nhận mật khẩu" style="margin-bottom: 10px;" name="repassword" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Đăng ký</button>
                </div>
                
            </div>
        </form>        
    </div>
</div>
@endsection
