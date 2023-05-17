<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Đọc truyện Online - @yield('title')</title>
    @yield('head')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Font Awaesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}" type="text/css">
    <link rel="shortcut icon" href="{{ asset('client/img/logo.png') }}" type="image/png">
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @yield('css')
</head>

<body>
    @include('sweetalert::alert')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('client.home') }}"><img src="{{ asset('client/img/logo.png') }}" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            @if (!Auth::check())
                <div class="header__top__right__auth">
                    <a href="{{ route('auth.show.login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                </div>
                <div class="header__top__right__auth">
                    <a href="{{ route('auth.show.register') }}">| Đăng ký</a>
                </div>
            @else
                <div class="header__top__right__language">
                    <div>
                        @if (is_null(Auth::user()->avatar))
                            <img src="{{ asset('client/img/people.png') }}" class="avatar" /> 
                        @else
                            <img src="{{ asset(Auth::user()->avatar) }}" class="avatar" /> 
                        @endif
                        Xin chào, {{ Auth::user()->name }}
                    </div>
                </div>
            @endif
        </div>
        @if (Auth::check())
            <div id="mobile-menu-wrap"><div class="slicknav_menu"><a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed" style="outline: none;"><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span></span></a><nav class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
                <ul>
                    <li><a style="font-family: sans-serif;" href="{{ route('client.notifications') }}">Thông báo <span style="top: 0;font-size: 10px;" class="ml-2 text-white badge badge-pill badge-danger notification-count-{{ Auth::user()->id }}">{{ Auth::user()->unreadNotifications->count() < 3 ? Auth::user()->unreadNotifications->count() : '3+' }}</span></a></li>
                    <li><a style="font-family: sans-serif;" href="{{ route('client.story') }}">Đăng truyện</a></li>
                    <li><a style="font-family: sans-serif;" href="{{ route('client.show.wishlist') }}">Tủ truyện</a></li>
                    <li><a style="font-family: sans-serif;" href="{{ route('auth.show.update.profile') }}">Cập nhật tài khoản</a></li>
                    <li><a style="font-family: sans-serif;" href="{{ route('auth.show.update.password') }}">Đổi mật khẩu</a></li>
                    <li><a style="font-family: sans-serif;" href="{{ route('auth.logout') }}">Đăng xuất</a></li>
                </ul>
            </nav></div></div>
        @endif
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> lienhe@doctruyenonline.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"> lienhe@doctruyenonline.com</i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            @if (!Auth::check())
                                <div class="header__top__right__auth">
                                    <a href="{{ route('auth.show.login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                                </div>
                                <div class="header__top__right__auth">
                                    <a href="{{ route('auth.show.register') }}">| Đăng ký</a>
                                </div>
                            @else
                                <div class="header__top__right__language">
                                    <div>
                                        @if (is_null(Auth::user()->avatar))
                                            <img src="{{ asset('client/img/people.png') }}" class="avatar" /> 
                                        @else
                                            <img src="{{ asset(Auth::user()->avatar) }}" class="avatar" /> 
                                        @endif
                                        Xin chào, {{ Auth::user()->name }}</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="{{ route('client.notifications') }}">Thông báo <span style="top: 0;font-size: 10px;" class="ml-2 text-white badge badge-pill badge-danger notification-count-{{ Auth::user()->id }}">{{ Auth::user()->unreadNotifications->count() < 3 ? Auth::user()->unreadNotifications->count() : '3+' }}</span></a></li>
                                        <li><a href="{{ route('client.story') }}">Đăng truyện</a></li>
                                        <li><a href="{{ route('client.show.wishlist') }}">Tủ truyện</a></li>
                                        <li><a href="{{ route('auth.show.update.profile') }}">Cập nhật tài khoản</a></li>
                                        <li><a href="{{ route('auth.show.update.password') }}">Đổi mật khẩu</a></li>
                                        <li><a href="{{ route('auth.logout') }}">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('client.home') }}"><img src="{{ asset('client/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href={{ route('client.home') }}>Trang chủ</a></li>
                            <li><a href={{ route('client.introduce') }}>Giới thiệu</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('main')

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about d-flex justify-content-center align-items-center flex-column">
                        <div class="footer__about__logo">
                            <a href="{{ route('client.home') }}"><img src="{{ asset('client/img/logo.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Số điện thoại: (+84) 973 055 398</li>
                            <li>Email: lienhe@doctruyenonline.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="mt-4 text-justify">
                        Đọc truyện Online là một website hỗ trợ đọc truyện trên Internet hoặc trên điện thoại di động, máy tính bảng với rất nhiều thể loại truyện được chúng tôi sưu tầm từ nhiều nguồn khác nhau trên internet. Chúng tôi <b>KHÔNG CHỊU TRÁCH NHIỆM</b> về vấn đề bản quyền! Nếu bạn cho rằng chúng tôi đang đăng tải một tài liệu có bản quyền hãy
                        cho chúng tôi biết về điều đó
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="footer__widget d-flex justify-content-center">
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram" ></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <div class="mt-4 text-justify">
                                Lượt truy cập: {{ \App\Models\Traffic::count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <p>Copyright {{ date('Y') }} - Website độc quyền của Đọc truyện online</p>
                        <i class="fa fa-arrow-circle-up" aria-hidden="true" onclick="botToTop()" id="botToTopBtn"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('client/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/main.js') }}"></script>
    <script src="{{ asset('client/js/bot-to-top.js') }}"></script>
    <script src="{{ asset('client/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('client/js/story.js') }}"></script>
    <script src="{{ asset('client/js/rating.js') }}"></script>
    <script src="{{ asset('client/js/progressbar.js') }}"></script>
    <script src="{{ asset('client/js/notification.js') }}"></script>
    <script>CKEDITOR.replace('content')</script>
    <script>
        // Block view source
        $(document).keydown(function(event) {
            if (event.keyCode == 123) {
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
                return false;
            } else if (event.ctrlKey && (event.keyCode == 67 || event.keyCode == 86 || event.keyCode === 85 || event
                    .keyCode === 117)) {
                return false;
            }
        });
        $(document).on("contextmenu", function(e) {
            e.preventDefault();
        });
    </script>
    @yield('script')
</body>

</html>
