<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">
    <link rel="icon" href="{{ asset('/') }}fontend/favicon.ico" type="image/x-icon">
    <!-- CSS  -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend/lib/font-awesome/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{ asset('/') }}fontend/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}fontend/css/normalize.css">
    <link rel="stylesheet" href="{{ asset('/') }}fontend/css/style.css">
    <!-- materialize icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend/lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}fontend/lib/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}fontend/lib/slick/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}fontend/lib/slick/slick/slick-theme.css">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{ asset('/') }}fontend/lib/Magnific-Popup-master/dist/magnific-popup.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>

    </style>
</head>
<body id="homepage">


@if(Session::has('success'))
    <script>
        Swal.fire(
            'Success!',
            '{{Session::get("success")}}',
            'success'
        )
    </script>
@endif

@if(Session::has('error'))
    <script>
        Swal.fire(
            'Error!',
            '{{Session::get("error")}}',
            'error'
        )
    </script>
@endif
<div class="preloading">
    <div class="wrap-preload">
        <div class="cssload-loader"></div>
    </div>
</div>

<!-- HEADER -->
<header id="header">
    <div class="nav-wrapper container">


        <div class="header-menu-button">
            <div class="cst-btn-menu">
                <a style="color: white;fontcategory20px;margin-right: -10px;" href="#" data-activates="nav-mobile-category" class="button-collapse" id="button-collapse-account">
                    <i class="fas fa-algin-left"></i></a>
            </div>
        </div>

        <a style="color: white;font-size: 12px" href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-category">
            <div class="cst-btn-menu">
                <i style="font-size:18px" class="fas fa-user-circle"></i>
            </div>
        </a>


        <div style="margin-top: -50px" class="header-icon-menu cart-item-wrap">
            @if($cart)
                <a href="{{ route('show-cart') }}"><i class="fas fa-shopping-cart"></i><span class="cart-item">{{ Cart::count() }}</span></a>
            @else
                <i class="fas fa-shopping-cart"></i><span class="cart-item">{{ Cart::count() }}</span>
            @endif
        </div>
        <a style="margin-top: -40px" href="{{ url('/') }}" class="nav-logo text-center"><img
                    src="{{ asset('/').$setting->header_logo }}" alt=""></a>
    </div>
</header>


<!-- HEADER -->
{{--
<header id="header">
    <div class="nav-wrapper container">


                <div class="header-menu-button">
                    <div class="cst-btn-menu">
                    <a style="color: white;font-size: 20px;margin-right: -10px;" href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account">
                        <i class="far fa-user-circle"></i></a>
                    </div>
                </div>

        <a style="color: white;font-size: 12px" href="#" data-activates="nav-mobile-category" class="button-collapse" id="button-collapse-category">
            <div class="cst-btn-menu">
                <i style="" class="fas fa-align-left"></i>
            </div>
        </a>


                <div style="margin-top: -50px" class="header-icon-menu cart-item-wrap">
                    @if($cart)
                        <a href="{{ route('show-cart') }}"><i class="fas fa-shopping-cart"></i><span class="cart-item">{{ Cart::count() }}</span></a>
                    @else
                        <i class="fas fa-shopping-cart"></i><span class="cart-item">{{ Cart::count() }}</span>
                    @endif
                </div>
               <a style="margin-top: -40px" href="{{ url('/') }}" class="nav-logo text-center"><img
                           src="{{ asset('/').$setting->header_logo }}" alt=""></a>
    </div>
</header>
--}}
