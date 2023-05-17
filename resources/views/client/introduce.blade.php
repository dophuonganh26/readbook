@extends('client.layouts.master')

@section('title', 'Giới thiệu')

@section('main')

@include('client.inc.search')
<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>GIỚI THIỆU</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p style="font-size: 2rem;line-height:1.5;text-align:justify;">
                    Đọc truyện online là website đọc truyện chất lượng hàng đầu việt nam, với nhiều truyện tiên hiệp, truyện kiếm hiệp, truyện ngôn tình, truyện teen, truyện đô thị được tác giả và dịch giả chọn lọc và đăng tải
                </p>
            </div>
        </div>       
    </div>
</div>
@endsection
