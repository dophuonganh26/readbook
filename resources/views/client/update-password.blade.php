@extends('client.layouts.master')

@section('title', 'Đổi mật khẩu')

@section('main')

@include('client.inc.search')

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>ĐỔI MẬT KHẨU</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('auth.update.password', ['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Mật khẩu hiện tại: <span class="text-danger">*</span></label>
                    <input type="password" placeholder="Mật khẩu hiện tại" style="margin-bottom: 10px;" name="curpassword" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Mật khẩu mới: <span class="text-danger">*</span></label>
                    <input type="password" placeholder="Mật khẩu mới" style="margin-bottom: 10px;" name="newpassword" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Nhập lại mật khẩu: <span class="text-danger">*</span></label>
                    <input type="password" placeholder="Nhập lại mật khẩu" style="margin-bottom: 10px;" name="confpassword" required>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Cập nhật</button>
                </div>    
            </div>
        </form>        
    </div>
</div>
@endsection
