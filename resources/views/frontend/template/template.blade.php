<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Wonosobo Best Motel">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Salu Amana Residence | Landing </title>

    <link rel="shortcut icon" href="{{ asset('main-logo.png') }}" type="image/x-icon">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('/template/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/template/css/style.css') }}" type="text/css">
    @yield('head')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <a href="{{ route('frontend.bookings') }}" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li><a href="{{ route('frontend.rooms') }}">Rooms</a></li>
                <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (+62) 813 2834 4002</li>
            <li><i class="fa fa-envelope"></i> saluamana03@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (+62) 813 2834 4002</li>
                            <li><i class="fa fa-envelope"></i> saluamana03@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="{{ route('frontend.bookings') }}" class="bk-btn">Booking Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="{{ asset('main-logo.png') }}" alt="" width="70px" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="{{ Route::is('frontend.home') ? 'active' : '' }}"><a href="{{ route('frontend.home') }}">Home</a></li>
                                    <li class="{{ Route::is('frontend.rooms') ? 'active' : '' }}"><a href="{{ route('frontend.rooms') }}">Rooms</a></li>
                                    <li class="{{ Route::is('frontend.about') ? 'active' : '' }}"><a href="{{ route('frontend.about') }}">About Us</a></li>
                                    <li class="{{ Route::is('frontend.contact') ? 'active' : '' }}"><a href="{{ route('frontend.contact') }}">Contact</a></li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/footer-logo.png" alt="">
                                </a>
                            </div>
                            <p>We inspire and reach millions of travelers<br /> across 90 local websites</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li>(62) 813 2834 4002</li>
                                <li>info@saluamana.com</li>
                                <li>Jl. Sabuk Alu No.3, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('/template/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('/template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/template/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('/template/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('/template/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('/template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/template/js/main.js') }}"></script>
    @yield('script')
</body>

</html>
