<!doctype html>
<html lang="{{ App::getLocale() }}" class="no-focus {{ App::getLocale() === 'ar' ? 'rtl' : 'ltr'}}"
      dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @yield('seo_header')
    <meta name="robots">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('favicon-192x192.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon-180x180.ico') }}">

    @if (App::getLocale() === 'ar')
        <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Tajawal:wght@400;500;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('sites/css/app.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/app.css') }}">
    @endif
    @yield('stylesheets')
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('css/custom.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/custom.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('sites/plugins/css/intlTelInput.css') }}">
    <style>
        .search-form-wrapper {
            display: none;
            position: absolute;
            left: 0;
            right: 0;
            padding: 20px 15px;
            margin-top: 50px;
            background: url(/resources/images/misc/bg_search-open.png) right center no-repeat #f89d1c;
        }
        .search-form-wrapper.open {
            display: block;
        }
    </style>
    <!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    <!-- google -->
    {{ config('settings.google_analytics') }}
<!-- facebook -->
    {{ config('settings.facebook_pixels') }}
    <style media="screen">
        body {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
</head>
<body>

<div class="body">
    @include('site.includes.header')
    @yield('content')
    @include('site.includes.footer')
    @include('site.includes.sideButtons')
    @include('cookieConsent::index')
    {{--    @include('cookie-consent::index')--}}
</div>
<script src="{{ asset('sites/js/app.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    // Banner Trigger if Not Closed
    if (!localStorage.bannerClosed) {
        $('.privacy-banner').css('display', 'inherit');
    } else {
        $('.privacy-banner').css('display', 'none');
    }
    $('.privacy-banner button').click(function () {
        $('.privacy-banner').css('display', 'none');
        localStorage.bannerClosed = 'true';
    });
    $('.banner-accept').click(function () {
        $('.privacy-banner').css('display', 'none');
        localStorage.bannerClosed = 'true';
    });
    if (navigator.userAgent.match(/Opera|OPR\//)) {
        $('.privacy-banner').css('display', 'inherit');
    }
    $(document).ready(function () {
        $.getJSON("currency.json", function (data) {
            let d = [
                "1 USD / " + data.rates.rates.TRY + " Turkish Lira",
                "1 USD /  " + data.rates.rates.EUR + " Euro",
                "1 USD /  " + data.rates.rates.GBP + " British pound",
                "1 USD /  " + data.rates.rates.BTC + " BTC",
                "1 USD /  " + data.rates.rates.ETH + " ETH",
                "1 USD /  " + data.rates.rates.LTC + " LTC"
            ];
            $.each(d, function (i, l) {
                $("#new-currency").append(`
                    <li class="nav-item nav-item-anim-icon d-inline-block me-5 font-weight-bold">
                        <a href="javascript:void(0)">` + l + `</a>
                    </li>`
                );
            });
        }).fail(function () {
            console.log("An error has occurred.");
        });

        $('[data-toggle=search-form]').click(function() {
            $('.search-form-wrapper').toggleClass('open');
            $('.search-form-wrapper .search').focus();
            $('html').toggleClass('search-form-open');
        });
        $('[data-toggle=search-form-close]').click(function() {
            $('.search-form-wrapper').removeClass('open');
            $('html').removeClass('search-form-open');
        });
        $('.search-form-wrapper .search').keypress(function( event ) {
            if($(this).val() == "Search") $(this).val("");
        });

        $('.search-close').click(function(event) {
            $('.search-form-wrapper').removeClass('open');
            $('html').removeClass('search-form-open');
        });
    });
    <!-- Use as a jQuery plugin -->
    // $(document).ready(function () {
    //     //to disable the entire page
    //     $("body").on("contextmenu",function(e){
    //         return false;
    //     });
    //
    //     $('body').bind('cut copy paste', function (e) {
    //         e.preventDefault();
    //     });
    // });
</script>
<script src="{{ asset('sites/plugins/js/intlTelInput.min.js') }}"></script>
<script>
    $(document).ready(function () {
        var input = document.querySelector("#phone");
        console.log(input)
        window.intlTelInput(input, {
            // any initialisation options go here
        });
    });
</script>
@yield('javascripts')
</body>
</html>
