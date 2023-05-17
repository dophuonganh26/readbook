@extends('client.layouts.master')

@section('title', 'Thêm chương')

@section('main')

@include('client.inc.search')

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>THÊM CHƯƠNG</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('client.upload.chapter', ['storyId' => $storyId]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Chương: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Chương" style="margin-bottom: 10px;" name="name" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Nội dung: <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Thêm</button>
                </div>  
            </div>
        </form>        
    </div>
</div>
@endsection
