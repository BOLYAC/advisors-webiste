<!doctype html>
<html lang="{{ App::getLocale() }}" class="no-focus {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}"
      dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    @yield('seo_header')
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    @if (App::getLocale() == 'ar')
        <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Tajawal:wght@400;500;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('sites/css/app.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/app.css') }}">@endif
    @yield('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('css/custom.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/custom.css') }}">@endif

<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    <!-- google -->
    {{ config('settings.google_analytics') }}
<!-- facebook -->
    {{ config('settings.facebook_pixels') }}
</head>
<body>

<div class="body">
    @include('site.includes.header')
    @yield('content')
    @include('site.includes.footer')
    @include('site.includes.sideButtons')
</div>
<script src="{{ asset('sites/js/app.js') }}" type="text/javascript"></script>
@yield('javascripts')
</body>
</html>
