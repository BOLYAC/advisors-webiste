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
    <link rel="stylesheet" href="{{ asset('sites/css/intlTelInput.min.css') }}">
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('i.far.fa-heart, i.fas.fa-heart').click(function () {
            @guest

            $("#loginModal").modal('show');

            @else

            var id = $(this).closest(".like").attr('data-id');
            var cObjId = this.id;
            var cObj = $(this);

            console.log(id);
            console.log(cObj);
            console.log(cObjId);

            $.ajax({
                type: 'POST',
                url: '{{ route('ajaxRequest') }}',
                data: {id: id},
                success: function (data) {
                    console.log(data)
                    if (data.success === false) {
                        $(cObj).removeClass("fas fa-heart");
                        $(cObj).addClass("far fa-heart");
                    } else {
                        $(cObj).removeClass("far fa-heart");
                        $(cObj).addClass("fas fa-heart");
                    }
                }
            });

            @endguest

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
@yield('javascripts')
</body>
</html>
