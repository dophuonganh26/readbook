@extends('admin.layouts.index')

@section('title')
    {{ $chapter->name }}
@endsection

@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ $chapter->name }}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            {!! $chapter->content !!}
        </div>
    </div>
@endsection
