@extends('client.layouts.master')

@section('title')
    {{ $chapter->name }}
@endsection

@section('css')
    <style>
        #progressbar {
            float: left;
            background-color: #00b2b2;
            height: 5px;
            transition: width .2s ease-in;
            position: fixed;
            top: 0;
        }
    </style>
@endsection

@section('main')

@include('client.inc.search')

<section class="featured">
    <div id="progressbar"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="chapter__categories">
                    <div class="chapter__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Chương</span>
                    </div>
                    <ul>
                        @foreach ($chapters as $item)
                            <li><a href="{{ route('client.story.read', ['storyId' => $storyId, 'chapterId' => $item->id]) }}" class="{{ $item->id == $chapterId ? 'font-weight-bold' : '' }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-2" style="color: #2489CE;">{{ \App\Models\Story::find($storyId)->name }} - {{ $chapter->name }}</h3>
                <p class="text-center">Tác giả: <a href="{{ route('client.author', ['id' => \App\Models\Story::find($storyId)->user_id]) }}">
                    @if (is_null(\App\Models\Story::find($storyId)->author))
                        {{ \App\Models\User::find(\App\Models\Story::find($storyId)->user_id)->name }}
                    @else
                        {{ \App\Models\Story::find($storyId)->author }}
                    @endif
                </a></p>
                <div class="mb-2 text-center">
                    <div>Kích cỡ chữ</div>
                    <select id="font-size-chapter">
                        @for ($i = 16; $i <= 24; $i++)
                            <option value="{{ $i }}">{{ $i }}px</option>
                        @endfor
                    </select>
                </div>
                <div id="content-chapter">
                    {!! $chapter->content !!}
                </div>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-9">
                @if (!is_null($previous))
                    <div class="float-left">
                        <a class="btn btn-primary" href="{{ route('client.story.read', ['storyId' => $storyId, 'chapterId' => $previous]) }}"><i class="fas fa-arrow-left mr-2"></i>Chương trước</a>
                    </div>
                @endif
                @if (!is_null($next))
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('client.story.read', ['storyId' => $storyId, 'chapterId' => $next]) }}">Chương sau<i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
