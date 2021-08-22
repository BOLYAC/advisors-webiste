<!doctype html>
<html lang="{{ App::getLocale() }}" class="no-focus {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}" dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/app.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/app.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('sites/css/error404.css') }}">
</head>

<body>
    <div class="container mt-5 pt-5 text-center">
        <img src="{{ asset('img/404.svg') }}" alt="404" class="img-lg d-none d-lg-inline-block"/>
        <img src="{{ asset('img/404-mobile.svg') }}" alt="404" class="d-inline-block d-lg-none w-100"/>
        <div class="my-5 py-5 text-center">
            <h3>{{ __('messages.sorry_page_not_found') }}</h3>
            <p>{!! __('messages.link_broken') !!}</p>
            <a href="{{ route('home') }}"><i class="fa fa-caret-right me-3"></i> {{ __('messages.return_to_homepage') }}</a>
        </div>
    </div>
</body>
</html>
