@extends('client.layouts.master')

@section('title')
    {{ $category->name }}
@endsection

@section('main')

@include('client.inc.search')

<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>{{ $category->name }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @if ($stories->count() > 0)
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
            </div>
        </div>
    </div>
</section>
@endsection
