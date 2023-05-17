<!-- Hero Section Begin -->
<section class="hero {{ !Route::is('client.home') ? 'hero-normal' : '' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Thể loại</span>
                    </div>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{ route('client.story.category', ['id' => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{ route('client.story.search') }}" method="GET">
                            <input type="text" placeholder="Tìm kiếm truyện ..." name="q">
                            <button type="submit" class="site-btn">TÌM KIẾM</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>(+84) 973 055 398</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
                @if (Route::is('client.home'))
                    <div class="hero__item set-bg" data-setbg="{{ asset('client/img/hero/banner.jpg') }}"></div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->