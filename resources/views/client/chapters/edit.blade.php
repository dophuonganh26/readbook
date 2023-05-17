@extends('client.layouts.master')

@section('title', 'Cập nhật chương')

@section('main')

@include('client.inc.search')

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>CẬP NHẬT CHƯƠNG</h2>
                </div>
            </div>
        </div>
        <form action="{{ route('client.chapter.update', ['id' => $chapter->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Chương: <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Chương" style="margin-bottom: 10px;" name="name" value="{{ $chapter->name }}" required>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-lg-6 col-md-6">
                    <label>Nội dung: <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content">{{ $chapter->content }}</textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="site-btn">Cập nhật</button>
                </div>  
            </div>
        </form>        
    </div>
</div>
@endsection
