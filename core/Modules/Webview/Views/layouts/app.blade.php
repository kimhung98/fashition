<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fashi</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}" type="text/css">
    @yield('header')
    <base href="{{ asset('') }}">
</head>

<body>

<div id="preloder">
    <div class="loader"></div>
</div>

<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    kimhung01.bn@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +84 358.842.200
                </div>
            </div>
            <div class="ht-right">
                @if(Auth::check())
                    <a href="" class="login-panel" id="login"><i
                            class="fa fa-user"></i>{{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('pages.login') }}" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
                @endif
                <div class="lan-selector">
                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value='yt' data-image="client/img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English
                        </option>
                    </select>
                </div>
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="">
                            <img src="client/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">Tất cả thể loại</button>
                        <div class="input-group">
                            <form action="" method="get">
                                {{ csrf_field() }}
                                <input type="text" placeholder="Bạn cần gì?" name="key">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon">
                            <a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <i class="icon_bag_alt"></i>
                                <span>{{ Cart::count() }}</span>
                            </a>
                            <div class="cart-hover">
                                <div class="select-items">
                                    <table>
                                        <tbody>
                                        @foreach (Cart::content() as $item)
                                            <tr>
                                                <td class="si-pic"><img src="image/product/{{ $item->options->image }}"
                                                                        alt="" width="75px" height="75px">
                                                </td>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        <p>{{ number_format($item->price, 0) }}đ x {{ $item->qty }}</p>
                                                        <h6>{{ $item->name }}</h6>
                                                    </div>
                                                </td>
                                                <td class="si-close">
                                                    <form action="{{ route('cart.destroy', $item->rowId) }}"
                                                          method="post"
                                                          class="form-remove">
                                                        <i class="ti-close remove"></i>
                                                        {{ csrf_field() }}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="select-total">
                                    <span>total:</span>
                                    <h5>{{ Cart::Subtotal($decimals = 0) }}₫</h5>
                                </div>
                                <div class="select-button">
                                    <a href="" class="primary-btn view-card">VIEW
                                        CARD</a>
                                    @if(Auth::check())
                                        <a href=""
                                           class="primary-btn checkout-btn">CHECK
                                            OUT</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        {{--                        <li class="cart-price">{{ Cart::Subtotal($decimals = 0) }}₫</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="{{ route('pages.shop') }}">Sản phẩm</a></li>
                    <li><a href="">Bộ sưu tập</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('pages.category', 'nam') }}">Nam</a></li>
                            <li><a href="{{ route('pages.category', 'nu') }}">Nữ</a></li>
                        </ul>
                    </li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">Liên hệ</a></li>
                    <li><a href="#">Khác</a>
                        <ul class="dropdown">
                            <li><a href="">Blog Chi tiết</a></li>
                            <li><a href="">Giỏ hàng</a></li>
                            @if(Auth::check())
                                <li><a href="{{ route('pages.checkout', Auth::user()->id) }}">Checkout</a></li>
                            @endif
                            <li><a href="">Câu gỏi thường gặp</a></li>
                            <li><a href="">Đăng ký</a></li>
                            <li><a href="">Đăng nhập</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

@yield('content')
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="client/img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="client/img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="client/img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="client/img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="client/img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="#"><img src="client/img/footer-logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: Ha Noi - Viet Nam</li>
                        <li>Phone: +84 358.842.200</li>
                        <li>Email: kimhung01.bn@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Serivius</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>My Account</h5>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Mail">
                        <button type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                    </div>
                    <div class="payment-pic">
                        <img src="client/img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('client/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.dd.min.js') }}"></script>
<script src="{{ asset('client/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('client/js/main.js') }}"></script>
@yield('script')
</body>

</html>
