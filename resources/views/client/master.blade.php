<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    {!! SEO::generate() !!}

    <base href="{{ asset('') }}">

    <meta property="fb:app_id" content="1067563290102368" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="client/css/all.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="client/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    .header-btns>li+li {
        margin-left: 0;
    }

    #top-header {
        text-align: center;
    }

    #header .pull-left {
        text-align: center;
    }

    .dropdown.side-dropdown>.custom-menu {
        width: 400px;
    }

    .line-height-2 {
        line-height: 2;
    }

    .product.product-single .product-name {
        height: 30px;
        font-size: 16px;
    }

    #loader {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        z-index: 99999;
    }
    </style>

    @yield('styles')

    {!! $system->web_style ?? null !!}

</head>

<body>

    {!! $system->google_analytic ?? null !!}
    {!! $system->google_webmaster ?? null !!}
    {!! $system->google_adsense ?? null !!}
    {!! $system->google_ads ?? null !!}
    {!! $system->facebook_pixel ?? null !!}
    {!! $system->facebook_auth ?? null !!}
    {!! $system->facebook_script ?? null !!}

    <!-- Image loader -->
    <div id='loader' style='display: none;'>
        <img src='reload.gif' width='100px' height='100px'>
    </div>
    <!-- Image loader -->

    <!-- HEADER -->
    <header>
        <!-- top Header -->
        <div id="top-header">
            <div class="container">
                <div class="pull-left">
                    <span>Chào mừng bạn đến vật phẩm phong thủy!</span>
                </div>
                <div class="pull-right">
                    <ul class="header-top-links">
                        <li><a href="javascript:">Newsletter</a></li>
                        <li><a href="javascript:">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /top Header -->

        <!-- header -->
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="{{ route('client.home') }}">
                            <img src="{{ $system->logo_web ?? 'client/img/logo-default.png' }}" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Search -->
                    <div class="header-search">
                        <form action="{{ route('client.search') }}">
                            <input class="input search-input" type="text" name="keysearch"
                                placeholder="Enter your keyword">
                            <select class="input search-categories">
                                @foreach(\App\Http\Controllers\Helper::categoryNameProduct() as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /Search -->
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        @guest
                        <!-- Account -->
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">Tài khoản <i class="fa fa-caret-down"
                                        style="visibility: hidden;"></i></strong>
                            </div>
                            <a href="javascript:" class="text-uppercase">Login</a> / <a href="javascript:"
                                class="text-uppercase">Join</a>
                        </li>
                        <!-- /Account -->
                        @else
                        <li class="header-account dropdown default-dropdown" style="padding-right: 10px;">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">{{ Auth::user()->name }} <i
                                        class="fa fa-caret-down"></i></strong>
                            </div>
                            <ul class="custom-menu">
                                <li><a href="javascript:"><i class="fa fa-user-o"></i> Tài khoản của tôi</a></li>
                                <li><a href="javascript:"><i class="fa fa-heart-o"></i> Sản phẩm yêu thích</a></li>
                                <li><a href="javascript:"><i class="fa fa-exchange"></i> So sánh sản phẩm</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="text-uppercase"><i
                                            class="fa fa-power-off"></i> {{ __('Logout') }}</a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                        <!-- Cart -->
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty">{{ \App\Facade\CartFacede::getQty() }}</span>
                                </div>
                                <strong class="text-uppercase">Giỏ hàng:</strong>
                                <br>
                                <span>{{ \App\Facade\CartFacede::getQty() }}</span>
                            </a>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                        @foreach(\App\Facade\CartFacede::content() as $item)

                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <img src="{{ $item->options['cover'] ?? 'client/img/thumb-product01.jpg' }}"
                                                    alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">{{ $item->price }} <span
                                                        class="qty">x{{ $item->quantity }}</span></h3>
                                                <h2 class="product-name"><a
                                                        href="{{ $item->options['link'] ?? 'javascript:' }}">{{ $item->name }}</a>
                                                </h2>
                                            </div>
                                            <button class="cancel-btn"
                                                data-href="{{route('client.shopping-cart.delete-item', $item->uniqueId)}}"
                                                onclick="event.preventDefault(); deleteItem('{{ $item->name }}', this)">
                                                <i class="fa fa-trash"></i></button>
                                        </div>

                                        @endforeach
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <a href="{{ route('client.shopping-cart.checkout') }}" class="primary-btn">Xem
                                            giỏ
                                            hàng và Checkout
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- /Cart -->

                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav @if(Route::currentRouteName() !== 'client.home') show-on-click @endif">
                    <span class="category-header">Danh mục sản phẩm <i class="fa fa-list"></i></span>
                    <ul class="category-list @if(Route::currentRouteName() === 'client.home') open @endif">
                        @foreach(\App\Http\Controllers\Helper::categoryProduct() as $key => $item)
                        <li class="dropdown side-dropdown">

                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                {{ $key }}
                                <i class="fa fa-angle-right"></i>
                            </a>

                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="list-links">
                                            @foreach($item as $categoryID => $name)
                                            <li class="line-height-2"><a
                                                    href="{{ route('client.product.index', Str::slug($name) . '-' . strtoupper(substr(dechex(~$categoryID), -10, 10))) }}">{{ $name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /category nav -->

                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="{{ route('client.home') }}">Trang chủ</a></li>
                        <li class="dropdown mega-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Sản phẩm <i
                                    class="fa fa-caret-down"></i></a>
                            <div class="custom-menu">
                                <div class="row">

                                    @foreach(\App\Http\Controllers\Helper::categoryProduct() as $key => $item)
                                    @if($loop->index / 3 === 1)
                                    <div class="clearfix"></div>
                                    @endif
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li>
                                                <h3 class="list-links-title">{{ $key }}</h3>
                                            </li>
                                            @foreach($item as $categoryID => $name)
                                            <li class="line-height-2"><a
                                                    href="{{ route('client.product.index', Str::slug($name) . '-' . strtoupper(substr(dechex(~$categoryID), -10, 10))) }}">{{ $name }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>

                                    @endforeach

                                </div>
                                {{--                            <div class="row hidden-sm hidden-xs">--}}
                                {{--                                <div class="col-md-12">--}}
                                {{--                                    <hr>--}}
                                {{--                                    <a class="banner banner-1" href="#">--}}
                                {{--                                        <img src="client/img/banner05.jpg" alt="">--}}
                                {{--                                        <div class="banner-caption text-center">--}}
                                {{--                                            <h2 class="white-color">NEW COLLECTION</h2>--}}
                                {{--                                            <h3 class="white-color font-weak">HOT DEAL</h3>--}}
                                {{--                                        </div>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}
                                {{--                            </div>--}}
                            </div>
                        </li>
                        <li><a href="javascript:">Tin tức phong thủy</a></li>
                        <li><a href="javascript:">Về chúng tôi</a></li>
                        <li><a href="{{ route('client.contact') }}">Liên hệ</a></li>
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    @yield('breadcrumb')
    <!-- /BREADCRUMB -->

    <!-- content -->
    @yield('content')
    <!-- /content -->

    <!-- FOOTER -->
    <footer id="footer" class="section section-grey">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <!-- footer logo -->
                        <div class="footer-logo">
                            <a class="logo" href="{{ route('client.home') }}">
                                <img src="{{ $system->logo_web ?? 'client/img/logo-default.png' }}" alt="">
                            </a>
                        </div>
                        <!-- /footer logo -->

                        <p>Vật phẩm phong thủy - May mắn đến với mọi người!</p>

                        <!-- footer social -->
                        <ul class="footer-social">
                            <li><a href="{{ $system->social_facebook ?? 'javascript:' }}"><i
                                        class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="{{ $system->social_twitter ?? 'javascript:' }}"><i
                                        class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="{{ $system->social_instagram ?? 'javascript:' }}"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ $system->social_skype ?? 'javascript:' }}"><i class="fa fa-skype"></i></a>
                            </li>
                            <li><a href="{{ $system->social_pinterest ?? 'javascript:' }}"><i
                                        class="fa fa-pinterest"></i></a></li>
                            <li><a href="{{ $system->social_linkdin ?? 'javascript:' }}"><i
                                        class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a href="{{ $system->social_youtube ?? 'javascript:' }}"><i
                                        class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                        <!-- /footer social -->
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Tài khoản</h3>
                        <ul class="list-links">
                            <li><a href="javascript:">Tài khoản của tôi</a></li>
                            <li><a href="javascript:">Sản phẩm yêu thích</a></li>
                            <li><a href="javascript:">So sánh sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <div class="clearfix visible-sm visible-xs"></div>

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Dịch vụ khách hàng</h3>
                        <ul class="list-links">
                            <li><a href="javascript:">Thông tin về chúng tôi</a></li>
                            <li><a href="javascript:">Vận chuyển và trả hàng</a></li>
                            <li><a href="javascript:">Hướng dẫn vận chuyển</a></li>
                            <li><a href="javascript:">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer subscribe -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Giữ liên lạc</h3>
                        <p>Bạn là người quan tâm về lĩnh vực phong thủy. Hãy để lại mail để nhận được những thông tin
                            hàng
                            ngày.</p>
                        <form action="javascript:">
                            <div class="form-group">
                                <input class="input" placeholder="Vui lòng nhập địa chỉ email">
                            </div>
                            <button class="primary-btn">Nhận tin phong thủy</button>
                        </form>
                    </div>
                </div>
                <!-- /footer subscribe -->
            </div>
            <!-- /row -->
            <hr>
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        Bản quyền &copy;<script>
                        document.write(new Date().getFullYear());
                        </script>
                        Đã đăng ký Bản quyền | Tác giả <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <a href="{{ env('APP_URL') }}" target="_blank">Phương Đông Huyền Bí</a>
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->

    <script src='client/js/all.js'></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js'></script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ajaxStart(function() {
        // Show image container
        $("body").css('opacity', 0.5);
        $("#loader").css('display', 'block');
    });

    $(document).ajaxComplete(function() {
        // Hide image container
        $("body").css('opacity', 1);
        $("#loader").css('display', 'none');
    });

    @if(Illuminate\ Support\ Facades\ Session::has('success'))
    swal({
        title: "Thành công!",
        text: "{{ Illuminate\Support\Facades\Session::get('success') }}",
        icon: "success",
        button: "Đóng!",
    });
    @endif

    @if(Illuminate\ Support\ Facades\ Session::has('checkout'))
    swal({
        title: "",
        text: "{{ Illuminate\Support\Facades\Session::get('checkout') }}",
        icon: "success",
        button: "Đóng!",
    });
    @endif

    @if(Illuminate\ Support\ Facades\ Session::has('danger'))
    swal({
        title: "Có Lỗi!",
        text: "{{ Illuminate\Support\Facades\Session::get('danger') }}",
        icon: "error",
        button: "Đóng!",
    });

    @endif

    function deleteItem(name, _this) {
        bootbox.confirm({
            title: "Xoá sản phẩm " + name,
            message: "Bạn có chắc chắn muốn xóa sản phẩm này!",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Giữ lại'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Đồng ý'
                }
            },
            callback: function(result) {
                if (result) {
                    let url = $(_this).attr('data-href');
                    location.href = url;
                }
            }
        });
    }

    function addCart(sku, qty = 1) {
        $.post("{{ route('client.shopping-cart.add-item') }}", {
                sku: sku,
                qty: qty
            }, function(data, status) {
                if (status === 'success') {
                    swal({
                        title: 'Cảm ơn!',
                        text: "Sản phẩm đã được thêm vào giỏ hàng!",
                        type: 'success',
                    }).then(function() {
                        location.href = "{{ route('client.shopping-cart.checkout') }}";
                    });
                } else {
                    swal({
                        title: "Có Lỗi!",
                        text: "Không thành công. Vui lòng thử lại!",
                        icon: "error",
                        button: "Đóng!",
                    });
                }
            })
            .fail(function() {
                swal({
                    title: "Có Lỗi!",
                    text: "Không thành công. Vui lòng thử lại!",
                    icon: "error",
                    button: "Đóng!",
                });
            });
    }
    </script>

    @yield('scipts')

    {!! $system->web_script ?? null !!}

</body>

</html>