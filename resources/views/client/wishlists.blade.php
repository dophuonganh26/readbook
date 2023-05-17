@extends('client.layouts.master')

@section('title', 'Tủ truyện')

@section('main')

@include('client.inc.search')
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>TỦ TRUYỆN</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if ($wishlists->count() > 0)
                @foreach ($wishlists as $wishlist)
                    @php
                        $story = \App\Models\Story::find($wishlist->story_id);
                    @endphp
                    @if ($story->status === 1)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="{{ asset($story->image) }}">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="{{ route('client.delete.wishlist', ['id' => $wishlist->id]) }}" onclick="return confirm('Bạn có muốn xóa truyện này ra khỏi tủ truyện ?')"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h5 class="mb-2"><a href="{{ route('client.story.detail', ['id' => $story->id]) }}">{{ $story->name }}</a></h5>
                                    <h6>Tác giả:
                                        @if (is_null($story->author))
                                            {{ \App\Models\User::find($story->user_id)->name }}
                                        @else
                                            {{ $story->author }}
                                        @endif
                                    </h6>
                                    <h6>Chương: {{ \App\Models\Chapter::where('story_id', $story->id)->count() }}
                                        @if ($story->release == 0)
                                            | <span class="badge badge-success text-white">Đã hoàn thành</span>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {!! $wishlists->links() !!}
            @else
                <div class="col-md-12 text-center">Hiện tại tủ truyện trống</div>
            @endif
        </div>
    </div>
</section>
@endsection
