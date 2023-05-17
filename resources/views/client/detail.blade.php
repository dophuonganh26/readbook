@extends('client.layouts.master')

@section('title')
    {{ $story->name }}
@endsection

@section('head')
    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $story->name }}" />
    <meta property="og:image" content="{{ asset($story->image) }}" />
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/comment.css') }}">
    <style>
        .primary-btn:hover {
            color: white !important;
        }
    </style>
@endsection

@section('main')
    @include('client.inc.search')

    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 text-center">
                    <img src="{{ asset($story->image) }}" alt="{{ $story->name }}">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $story->name }}</h3>
                        @if (Auth::check() && $story->user_id !== Auth::user()->id)
                            <ul class="d-flex">
                                @for ($count = 1;$count <= 5;$count++)
                                    @php
                                        if ($count <= $rating) {
                                            $color = 'color:#ffcc00;';
                                        } else {
                                            $color = 'color:#ccc;';
                                        }
                                    @endphp
                                    <li id="{{ $story->id }}-{{ $count }}"
                                        data-index="{{ $count }}"
                                        data-story_id="{{ $story->id }}"
                                        data-rating="{{ $rating }}"
                                        class="rating"
                                        style="cursor:pointer;{{ $color }}font-size:30px">&#9733;</li>
                                @endfor
                            </ul>
                        @endif
                        <p style="margin-bottom: 0">Số sao: {{ $rating }} / 5 (Lượt đánh giá: {{ \App\Models\Evaluation::where('story_id', $story->id)->count() }})</p>
                        <ul class="mb-2">
                            <li> <span>
                                @if (is_null($story->author))
                                    <b>Tác giả</b> <a class="text-primary" href="{{ route('client.author', ['id' => $story->user_id]) }}">{{ \App\Models\User::find($story->user_id)->name }}</a>
                                @else
                                    <b>Tác giả phụ</b> <a class="text-primary" href="{{ route('client.author', ['id' => $story->user_id]) }}">{{ \App\Models\User::find($story->user_id)->name }}</a>
                                    <br>
                                    <b>Tác giả chính</b> {{ $story->author }}
                                @endif
                                </span></li>
                            <li><b>Chuyên mục</b>
                                <span>{{ \App\Models\ParentCategory::find($story->parent_category_id)->name }}</span>
                            </li>
                            <li><b>Chương</b> <span>{{ \App\Models\Chapter::where('story_id', $story->id)->count() }}
                            @if ($story->release == 0)
                                | <span class="badge badge-success text-white">Đã hoàn thành</span>
                            @endif</span>
                            </li>
                            <li><b>Thể loại</b> <span>{{ \App\Models\Category::find($story->category_id)->name }}</span>
                            </li>
                            <li><b>Lượt xem</b>
                                <span>{{ \App\Models\Chapter::where('story_id', $story->id)->sum('view') }}</span></li>
                        </ul>
                        @if (!is_null(\App\Models\Chapter::where('story_id', $story->id)->first()))
                            @if (!\App\Models\CookieUserChapter::where([['user_token', Cookie::get('user_token')], ['story_id', $story->id]])->exists())
                                <a href="{{ route('client.story.read', ['storyId' => $story->id, 'chapterId' => \App\Models\Chapter::where('story_id', $story->id)->first()->id]) }}"
                                    class="primary-btn">ĐỌC TRUYỆN</a>
                            @else
                                <a href="{{ route('client.story.read', ['storyId' => $story->id, 'chapterId' => \App\Models\CookieUserChapter::where([['user_token', Cookie::get('user_token')], ['story_id', $story->id]])->first()->chapter_id]) }}"
                                    class="primary-btn">ĐỌC TRUYỆN</a>
                            @endif
                        @endif
                        <a href="javascript:void(0)" class="primary-btn bg-danger share-btn" data-url="{{ URL::current() }}">CHIA SẺ</a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active">Tóm tắt</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <p>{!! $story->short_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="comment-sec-area pt-80 pb-80">
        <div class="container">
            <div class="row flex-column">
                <h5 class="text-uppercase pb-80">{{ $comments->count() }} bình luận</h5>
                <br />
                <div class="comment">
                    @foreach ($comments as $comment)
                        @php
                            $user = \App\Models\User::find($comment->user_id);
                        @endphp
                        <div class="comment-list comment-container">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{ asset(!is_null($user->avatar) ? $user->avatar : 'client/img/people.png') }}"
                                            alt="Avatar" width="50px">
                                    </div>
                                    <div class="desc mb-4">
                                        <h5><a href="javascript:void(0)">{{ $comment->name }}</a></h5>
                                        <p class="date">{{ date('d/m/Y H:i:s', strtotime($comment->created_at)) }}</p>
                                        <p class="comment">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End comment-sec Area -->

    <!-- Start commentform Area -->
    @if (Auth::check())
        @if ($story->user_id !== Auth::user()->id)
            <section class="commentform-area pb-120 pt-80 mb-100">
                <div class="container">
                    <h5 class="text-uppercas pb-50">Bình luận</h5>
                    <div class="row flex-row d-flex">
                        <div class="col-lg-12">
                            <form action="{{ route('add.comment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                <input type="hidden" name="story_id" value="{{ $story->id }}" />
                                <textarea class="form-control mb-10" name="message" cols="5" rows="4" placeholder="Nhập bình luận" required></textarea>
                                <button type="submit" class="primary-btn mt-20" href="#">Bình luận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
@endsection
