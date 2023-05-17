@extends('client.layouts.master')

@section('title', 'Danh sách thông báo')

@section('main')

@include('client.inc.search')
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>DANH SÁCH THÔNG BÁO</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @if (Auth::user()->unreadNotifications->count() > 0)
                    <a href="javascript:void(0)" class="btn btn-primary mb-3 mark-all-as-read-{{ Auth::user()->id }}" onclick="markAllAsRead()">Đọc hết tất cả</a>
                @endif
                <table class="table table-bordered" id="notification-table-{{ Auth::user()->id }}">
                    @include('client.inc.notification', compact('notifications'))
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
