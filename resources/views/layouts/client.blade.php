<?php
use App\Product_cat;
use App\Account;
use App\Menu;
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    @if (!empty($scriptHead))
        {!! $scriptHead !!}
    @endif
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NJHYCVL4TY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-NJHYCVL4TY');
    </script>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $meta_desc }}" />
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="title" content="{{ $meta_title }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="canonical" href="{{ $url_canonical }}" />
    <link rel="icon" type="image/x-icon" href="https://laptop88.vn/template/template_2019/images/favicon1.png" />
    @if (!empty($image_og))
        <meta property="og:image" content="{{ $image_og }}">
    @endif
    <meta property="og:site_name" content="">
    <meta property="og:description" content="{{ $meta_desc }}">
    <meta property="og:url" content="{{ $url_canonical }}">
    <meta property="og:title" content="{{ $meta_title }}">
    <meta property="og:type" content="website">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{ asset('client/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('client/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('client/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('client/css/carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('client/css/carousel/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('client/css/font-awesome/css/font-awesome.css') }}">
    <link href="{{ asset('client/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('client/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
    <script src="{{ asset('client/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- <script src="{{ asset('client/js/elevatezoom-master/jquery.elevatezoom.js') }}" type="text/javascript"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('client/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/js/carousel/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('client/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/js/ajax.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/js/simple.money.format.js') }}" type="text/javascript"></script>
    <script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    @if (!empty($scriptBodyTop))
        {!! $scriptBodyTop !!}
    @endif
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix" style="height: 45px">
                    <div class="wp-inner container">
                        <div class="address-left clearfix">
                            <div class="pulse-icon">
                                <div class="icon-wrap"></div>
                                <div class="pulse pulse-1"></div>
                            </div>
                        </div>
                        <div id="main-menu-wp" class="fl-right d-flex">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="{{ route('pages_contact') }}" title="">Liên hệ</a>
                                </li>
                            </ul>
                            @if (session()->has('is_login'))
                                <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                                    <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="true">
                                        <h3 id="account" class="fl-right">
                                            Hi!
                                            @if (session()->has('user_email'))
                                                @php
                                                    $user_login = Account::where('email', session('user_email'))->first()->username;
                                                @endphp
                                                {{ $user_login }}
                                            @endif
                                        </h3>
                                        <span class="dropdown-icon">
                                            <i class="fas fa-caret-down"></i>
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu" style="width: 180px">
                                        <li><a href="{{ url('user/profile') }}" title="Thông tin cá nhân"
                                                class="info-account">Thông tin tài khoản</a></li>
                                        <li><a href="{{ url('user/purchase') }}" title="Thông tin cá nhân"
                                                class="info-account">Đơn mua</a></li>
                                        <li><a href="?mod=users&controller=info_account" title="Thông tin cá nhân"
                                                class="info-account">Địa chỉ</a></li>
                                        <li><a href="{{ route('account_logout') }}" title="Thoát"
                                                class="logout">Thoát</a></li>
                                    </ul>
                                </div>
                            @else
                                <ul id="main-menu" class="clearfix">

                                    <li>
                                        <a href="{{ route('account_login') }}" title="">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('account_register') }}" title="">Đăng ký</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner container">
                        <a href="{{ url('/') }}" title="" id="logo" class="fl-left"><img
                                style="height:60px" src="{{ url('public/client/images/logo-new.png') }}" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="GET" action="{{ route('search') }}" id="search_pr">
                                <input type="text" name="s" id="search"
                                    value="{{ request()->input('s') }}"
                                    placeholder="Nhập từ khóa tìm kiếm tại đây!"
                                    data_uri="{{ route('searchAjax') }}">
                                <button type="submit" id="sm-s" disabled="disabled">Tìm kiếm</button>
                                <div id="show_prd">
                                    <ul class="list-rs">
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <i class="fas fa-phone-alt fl-left"></i>
                                <div class="advisory-after fl-right">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">
                                        @if (!empty($phone_contact))
                                            {{ $phone_contact }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('cart.show') }}" title="giỏ hàng" id="cart-respon-wp"
                                class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>
                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <a href="{{ route('cart.show') }}" style="color: #fff">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    </a>
                                    <span id="num">{{ Cart::count() }}</span>
                                </div>
                                <div id="dropdown">
                                    <p class="desc">Có <span id="extra_num">{{ Cart::count() }} sản
                                            phẩm</span> trong giỏ
                                        hàng</p>
                                    @if (Cart::count() == 0){
                                        <div id="no-prdt-cart">
                                            <img src="{{ asset('client/images/img-no-prdt-cart.png') }}"
                                                alt="">
                                        </div>
                                        }
                                    @else
                                        <ul class="list-cart overflow-auto" style="max-height:175px">
                                            @foreach (Cart::content() as $cartItem)
                                                <li class="clearfix">
                                                    <a href="{{ route('productDetail', [$cartItem->options->slug, $cartItem->id]) }}"
                                                        title="" class="thumb fl-left">
                                                        <img src="{{ url($cartItem->options->thumbnail) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="{{ route('productDetail', [$cartItem->options->slug, $cartItem->id]) }}"
                                                            title=""
                                                            class="product-name">{{ Str::of($cartItem->name)->limit(30) }}</a>
                                                        <p class="price">
                                                            {{ number_format($cartItem->price, 0, ',', '.') }}đ</p>
                                                        <p class="qty">Số lượng:
                                                            <span>{{ $cartItem->qty }}</span>
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right">{{ Cart::total() }}đ</p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="{{ route('cart.show') }}" title="Giỏ hàng"
                                                class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="{{ route('checkout') }}" title="Thanh toán"
                                                class="checkout fl-right">Thanh
                                                toán</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear-fix"></div>
                <div id="head-menu">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="head-menu-container">
                                <a href="" class="d-block font-weight-light text-white menu-title">
                                    <i class="fa fa-bars mr-1"></i><span>DANH MỤC SẢN PHẨM</span>
                                </a>
                                <div class="header-menu-holder pt-1" id="wp-hide">
                                    @foreach ($cat1 as $cat)
                                        <div class="item py-2">
                                            <div class="sub-menu">
                                                <div class="cat-child-holder">
                                                    @php
                                                        
                                                        $cat2 = Product_cat::where([['status', 'active'], ['parent_id', $cat->id]])->get();
                                                        
                                                    @endphp
                                                    @foreach ($cat2 as $cat2)
                                                        @php
                                                            
                                                            $catlast = Product_cat::where([['status', 'active'], ['parent_id', $cat2->id]])->get();
                                                            
                                                        @endphp
                                                        <div class="cat-child-items">
                                                            <a href="{{ route('productCat', [$cat2->slug, $cat2->id]) }}"
                                                                title=""
                                                                class="cat-2">{{ $cat2->cat_title }}</a>
                                                            @foreach ($catlast as $item)
                                                                <div class="cat-child-last">
                                                                    <a href="{{ route('productCat', [$item->slug, $item->id]) }}"
                                                                        title="">{{ $item->cat_title }}</a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <ul class="menu-text-right align-items-center justify-content-between font-weight-light">

                                @foreach ($menus as $menu)
                                    @php
                                        $menu_info = Menu::where([['id', $menu->id], ['status', 'active']])->first();
                                    @endphp
                                    @if ($menu->page_id != null)
                                        <li class="menu-item-down d-flex align-items-center">
                                            <i class="{{ $menu->icon }}"></i>
                                            <a
                                                href="{{ route('pages', [$menu_info->slug, $menu->page_id]) }}">{{ $menu_info->menu_title }}</a>
                                        </li>
                                    @elseif($menu->productcat_id != null)
                                        <li class="menu-item-down d-flex align-items-center">
                                            <i class="{{ $menu->icon }}"></i>
                                            <a
                                                href="{{ route('productCat', [$menu_info->slug, $menu->productcat_id]) }}">{{ $menu_info->menu_title }}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="wp-content">
                @yield('content')
            </div>
            <div id="footer-wp">
                <div id="navSocial">
                    <div class="social">
                        <ul>
                            <li><a href=" @if (!empty($facebook_link)) {{ $facebook_link }} @endif"
                                    title="Facebook Hùng Ánh Mobile" target="_blank" class="blue"><span><i
                                            class="fab fa-facebook-f"></i></span></a></li>
                            <li><a href="" title="Youtube Hùng Ánh Mobile Channel" target="_blank"
                                    class="red"><span><i class="fab fa-youtube"></i></span></a></li>
                            <li><a href="" title="Hùng Ánh Mobile Instagram" target="_blank"
                                    class="rainbow"><span><i class="fab fa-instagram"></i></span></a></li>
                            <li><a href="" title="Twister" target="_blank" class="black"><span><i
                                            class="fab fa-twitter"></i></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-content d-flex">
                    <div class="link-content">
                        <h4>
                            <a href="">Hỗ Trợ - Dịch Vụ</a>
                        </h4>
                        @if (count($pages) > 0)
                            <ul>
                                @foreach ($pages as $page)
                                    <li>
                                        <a
                                            href="{{ route('pages', [$page->slug, $page->id]) }}">{{ $page->page_title }}</a>
                                    </li>
                                @endforeach


                            </ul>
                        @endif

                    </div>
                    <div class="link-content">
                        <h4>
                            <a href="">Thông tin liên hệ</a>
                        </h4>
                        <ul>
                            <li>
                                <a href="">Bán hàng online</a>
                            </li>
                            <li>
                                <a href="">Chăm sóc khách hàng</a>
                            </li>
                            <li>
                                <a href="">Hỗ trợ kỹ thuật</a>
                            </li>
                            <li>
                                <a href="">Hỗ trợ bảo hành và sửa chữa</a>
                            </li>
                            <li>
                                <a href="">Liên hệ khối văn phòng</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4>Tổng đài</h4>
                        <a class="hotline" href="tel:0399809731">
                            @if (!empty($phone_contact))
                                {{ $phone_contact }}
                            @endif
                        </a>
                    </div>
                    <div>
                        <h4>Thanh toán miễn phí</h4>
                        <ul class="list-logo">
                            <li>
                                <img src="{{ asset('client/images/logo-visa.png') }}">
                                <img src="{{ asset('client/images/logo-master.png') }}">
                            </li>
                            <li>
                                <img src="{{ asset('client/images/logo-jcb.png') }}">
                                <img src="{{ asset('client/images/logo-samsungpay.png') }}">
                            </li>
                            <li>
                                <img src="{{ asset('client/images/logo-atm.png') }}">
                                <img src="{{ asset('client/images/logo-vnpay.png') }}">
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4>Hình thức vận chuyển</h4>
                        <ul class="list-logo">
                            <li>
                                <img src="{{ asset('client/images/nhattin.jpg') }}">
                                <img src="{{ asset('client/images/vnpost.jpg') }}">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="info_footer">
                    <p>© 2020. CÔNG TY CỔ PHẦN XÂY DỰNG VÀ ĐẦU TƯ THƯƠNG LAPTOP88. MST: 0399809731. (Đăng ký lần đầu:
                        Ngày 15 tháng 09 năm 2021, Đăng ký thay đổi ngày 07/10/2021)</p>
                    <p><strong>GP số 426/GP-TTĐT do sở TTTT Hà Nội cấp ngày 22/01/2021</strong></p>
                    <p>Địa chỉ: 26 Lương Thế Vinh, Đ.Nguyễn Trãi, Q. Thanh Xuân, Hà Nội. Điện thoại: 0399809731 Chịu
                        trách nhiệm nội dung: <strong>Phùng Minh Đức</strong>. </p>
                    <p>Designed by: <strong>Minh Đức</strong> @minhduc.design</p>
                </div>
                <div id="btn-top"><img src="{{ url('public/client/images/icon-to-top.png') }}" alt="" />
                </div>
                <div id="fb-root"></div>
                @if (!empty($scriptFooter))
                    {!! $scriptFooter !!}
                @endif
            </div>
        </div>
        <div id="menu-respon">
            <a href="?page=home" title="" class="logo">LAPTOP88</a>
            <div id="menu-respon-wp">
                <ul class="___class_+?157___" id="main-menu-respon">
                    <li>
                        <a href="{{ url('/') }}" title>Trang chủ</a>
                    </li>
                    @foreach ($cat1 as $catrespon1)
                        <li>
                            <a href="{{ route('productCat', [$catrespon1->slug, $catrespon1->id]) }}"
                                title>{{ $catrespon1->cat_title }}</a>
                            @php
                                
                                $cat2 = Product_cat::where([['status', 'active'], ['parent_id', $catrespon1->id]])->get();
                                
                            @endphp
                            <ul class="sub-menu">
                                @foreach ($cat2 as $catrespon2)
                                    @php
                                        
                                        $catlast = Product_cat::where([['status', 'active'], ['parent_id', $catrespon2->id]])->get();
                                        
                                    @endphp
                                    <li>
                                        <a href="{{ route('productCat', [$catrespon2->slug, $catrespon2->id]) }}"
                                            title="">{{ $catrespon2->cat_title }}</a>
                                        <ul class="sub-menu">
                                            @foreach ($catlast as $catrespon3)
                                                <li>
                                                    <a href="{{ route('productCat', [$catrespon3->slug, $catrespon3->id]) }}"
                                                        title="">{{ $catrespon3->cat_title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
                <div id="pageResponse">
                    <h2>Trang</h2>
                    <ul class="___class_+?157___" id="main-menu-respon">

                        @foreach ($menus as $menu)
                            @php
                                $menu_info = Menu::where([['id', $menu->id], ['status', 'active']])->first();
                            @endphp
                            @if ($menu->page_id != null)
                                <li class="menu-item-down d-flex align-items-center">
                                    <i class="{{ $menu->icon }}"></i>
                                    <a
                                        href="{{ route('pages', [$menu_info->slug, $menu->page_id]) }}">{{ $menu_info->menu_title }}</a>
                                </li>
                            @elseif($menu->postcat_id != null)
                                <li class="menu-item-down d-flex align-items-center">
                                    <i class="{{ $menu->icon }}"></i>
                                    <a
                                        href="{{ route('posts', [$menu_info->slug, $menu->postcat_id]) }}">{{ $menu_info->menu_title }}</a>
                                </li>
                            @elseif($menu->productcat_id != null)
                                <li class="menu-item-down d-flex align-items-center">
                                    <i class="{{ $menu->icon }}"></i>
                                    <a
                                        href="{{ route('productCat', [$menu_info->slug, $menu->productcat_id]) }}">{{ $menu_info->menu_title }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div id="postResponse">
                    <h2>Bài viết</h2>
                    {{-- <ul class="___class_+?157___" id="main-menu-respon">
                        <li>
                            <a href="{{ route('posts') }}" title>{{ $menu_blog->menu_title }}</a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <script>
            
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
    @if (!empty($scriptBodyBottom))
        {!! $scriptBodyBottom !!}
    @endif
</body>

</html>
