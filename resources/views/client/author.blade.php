@extends('client.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/profile.css') }}" type="text/css">
@endsection

@section('title')
    Tác giả {{ $author->name }}
@endsection

@section('main')
@include('client.inc.search')

<section class="featured">
    <div class="container">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset($author->avatar) }}" alt="Admin"
                                class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{ $author->name }}</h4>
                                <p class="text-secondary mb-1">Tổng số truyện: {{ \App\Models\Story::where('user_id', $author->id)->count() }}</p>
                                <p class="text-muted font-size-sm">Số người theo dõi: {{ \App\Models\Follow::where('author_id', $author->id)->count() }}</p>
                                @if (Auth::check())
                                    @if (Auth::user()->id !== $author->id)
                                        @if (!\App\Models\Follow::where([['author_id', $author->id], ['follower_id', Auth::user()->id]])->exists())
                                            <a href="{{ route('follow.author', ['id' => $author->id]) }}" class="btn btn-primary">Theo dõi</a>
                                        @else
                                            <a href="{{ route('unfollow.author', ['id' => $author->id]) }}" class="btn btn-danger">Bỏ theo dõi</a>
                                        @endif                                    
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        @if (!empty($author->facebook))
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>Facebook</h6>
                                <br>
                                <span class="text-secondary">{{ $author->facebook }}</span>
                            </li>
                        @endif
                        @if (!empty($author->instagram))
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5"
                                            ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <br>
                                <span class="text-secondary">{{ $author->instagram }}</span>
                            </li>
                        @endif
                        @if (!empty($author->twitter))
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Twitter</h6>
                                <br>
                                <span class="text-secondary">{{ $author->twitter }}</span>
                            </li>
                        @endif
                        @if (!empty($author->tiktok))
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 387.000000 431.000000"
                                    preserveAspectRatio="xMidYMid meet" class="mr-2">
                                   
                                   <g transform="translate(0.000000,431.000000) scale(0.100000,-0.100000)"
                                   fill="#000000" stroke="none">
                                   <path d="M2105 4088 c-3 -7 -6 -663 -7 -1458 l-3 -1445 -33 -99 c-32 -93 -38
                                   -102 -111 -177 -127 -128 -244 -173 -456 -172 -94 0 -119 4 -171 26 -187 76
                                   -341 245 -383 419 -60 254 37 499 257 645 95 62 171 85 292 87 58 0 126 -3
                                   153 -7 l47 -8 -2 343 -3 343 -40 7 c-71 13 -258 9 -345 -6 -380 -69 -712 -306
                                   -909 -650 -113 -198 -175 -494 -151 -725 35 -351 185 -643 433 -842 175 -141
                                   278 -201 443 -254 318 -105 708 -77 979 69 353 190 581 489 677 884 21 84 22
                                   114 25 880 3 608 7 792 16 792 7 0 36 -16 65 -35 139 -94 365 -186 552 -224
                                   122 -26 319 -46 331 -34 5 5 8 151 7 333 l-3 324 -80 12 c-89 13 -252 67 -350
                                   115 -126 63 -320 232 -383 334 -95 155 -141 287 -151 435 l-6 85 -105 6 c-58
                                   4 -212 7 -343 8 -182 1 -239 -2 -242 -11z"/>
                                   </g>
                                   </svg>Tiktok</h6>
                                <span class="text-secondary">{{ $author->tiktok }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="mb-3">Giới thiệu bản thân</h4>
                            </div>
                            <div class="col-sm-12 text-secondary">
                                {!! $author->introduce ?? 'Chưa có thông tin' !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="mb-3">Danh sách truyện</h4>
                            </div>
                            <div class="col-sm-12 text-secondary">
                                @foreach ($stories as $story)
                                    <div class="d-flex">
                                        <img src="{{ asset($story->image) }}" width="100"/>
                                        <div class="ml-2">
                                            <a class="text-primary" href="{{ route('client.story.detail', ['id' => $story->id]) }}">{{ $story->name }}</a>
                                            <p style="margin-bottom: 0">Số sao: {{ round(\App\Models\Evaluation::where('story_id', $story->id)->avg('star')) }} / 5 (Lượt đánh giá: {{ \App\Models\Evaluation::where('story_id', $story->id)->count() }})</p>
                                            <p style="margin-bottom: 0">Chuyên mục: {{ \App\Models\ParentCategory::find($story->parent_category_id)->name }}</p>
                                            <p style="margin-bottom: 0">Chương: {{ \App\Models\Chapter::where('story_id', $story->id)->count() }}</p>
                                            <p style="margin-bottom: 0">Thể loại: {{ \App\Models\Category::find($story->category_id)->name }}</p>
                                            <p style="margin-bottom: 0">Lượt xem: {{ \App\Models\Chapter::where('story_id', $story->id)->sum('view') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                {!! $stories->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
