@extends('client.layouts.master')

@section('title')
    {{ $chapter->name }}
@endsection

@section('main')

@include('client.inc.search')

<div class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>{{ $chapter->name }}</h2>
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col-lg-12 col-md-12">
                {!! $chapter->content !!}
            </div>
        </div>        
    </div>
</div>
@endsection
