@extends('client.layouts.master')

@section('title', 'Trang chủ')

@section('main')

@include('client.inc.search')

<section class="featured">
    <div class="container">
        @foreach ($categories as $category)
            @php
                $stories = \App\Models\Story::where([['category_id', $category->id], ['status', 1]])->limit(4)->orderByDesc('id')->get();
            @endphp
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ $category->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($stories->count() > 0)
                    <div class="col-lg-12 mb-3">
                        <a href="{{ route('client.story.category', ['id' => $category->id]) }}">Xem thêm</a>
                    </div>
                    @foreach ($stories as $story)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset($story->image) }}">
                                    @if (Auth::check() && Auth::user()->id !== $story->user_id)
                                        @if (!\App\Models\Wishlist::where([['story_id', $story->id], ['user_id', Auth::user()->id]])->exists())
                                            <ul class="featured__item__pic__hover">
                                                <li><a href="javascript::void(0)" onclick="addWishlist({{ $story->id }});this.style.display='none';"><i class="fa fa-heart"></i></a></li>
                                            </ul>
                                        @endif
                                    @endif
                                </div>
                                <div class="featured__item__text">
                                    <h5 class="mb-2"><a href="{{ route('client.story.detail', ['id' => $story->id]) }}">{{ $story->name }}</a></h5>
                                    <h6>
                                        @if (is_null($story->author))
                                            Tác giả: <a class="text-primary" href="{{ route('client.author', ['id' => $story->user_id]) }}">{{ \App\Models\User::find($story->user_id)->name }}</a>
                                        @else
                                            <div class="mb-1">Edit: <a class="text-primary" href="{{ route('client.author', ['id' => $story->user_id]) }}">{{ \App\Models\User::find($story->user_id)->name }}</a></div>
                                            <div>Tác giả: {{ $story->author }}</div>
                                        @endif
                                    </h6>
                                    <h6>Số chương: {{ \App\Models\Chapter::where('story_id', $story->id)->count() }}
                                        @if ($story->release == 0)
                                            | <span class="badge badge-success text-white">Đã hoàn thành</span>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center">Hiện chưa có truyện nào</div>
                @endif
            </div>
        @endforeach
    </div>
</section>
@endsection
