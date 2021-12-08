@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/services.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/services.css') }}">
    @endif
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5"
             style="background-image: url({{ asset('sites/img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ __('messages.services') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.services') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-2 border-0 mb-0 py-5">
        <div class="container container-lg mb-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-6 text-center mb-5">
                    {{--                    <h2 class="font-weight-extra-bold line-height-4 mb-5">Required Documents for the program.</h2>--}}
                </div>
            </div>
            <div class="beehive pb-lg-5">
                <div class="center center1">
                    <div class="shape odd">
                        <div class="shape-text">

                        </div>
                    </div>
                    <div class="shape even secondary">
                        <div class="shape-text"
                             onclick="location.href='#{{ \Str::slug($services->first_title, '-') }}';"
                             style="cursor: pointer">
                            {{ $services->first_title }}
                        </div>
                    </div>
                    <div class="shape odd">
                        <div class="shape-text">
                            <img src="{{ asset('sites/img/logo.png')  }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="shape even secondary">
                        <div class="shape-text"
                             onclick="location.href='#{{ \Str::slug($services->third_title, '-') }}';"
                             style="cursor: pointer">
                            {{ $services->third_title }}
                        </div>
                    </div>
                    <div class="shape odd">
                        <div class="shape-text">

                        </div>
                    </div>
                </div>
                <div class="center center2">
                    <div class="shape odd secondary">
                        <div class="shape-text"
                             onclick="location.href='#{{ \Str::slug($services->fourth_title, '-') }}';"
                             style="cursor: pointer">
                            {{ $services->fourth_title }}
                        </div>
                    </div>
                    <div class="shape even">
                        <div class="shape-text"
                             onclick="location.href='#{{ \Str::slug($services->fifth_title, '-') }}';"
                             style="cursor: pointer">
                            {{ $services->fifth_title }}
                        </div>
                    </div>
                    <div class="shape odd secondary">
                        <div class="shape-text"
                             onclick="location.href='#{{ \Str::slug($services->sixth_title, '-') }}';"
                             style="cursor: pointer">
                            {{ $services->sixth_title }}
                        </div>
                    </div>
                    <div class="shape even">
                        <div class="shape-text"
                             onclick="location.href='#{{ \Str::slug($services->seventh_title, '-') }}';"
                             style="cursor: pointer">
                            {{ $services->seventh_title }}
                        </div>
                    </div>
                    <div class="shape odd secondary">
                        <div class="shape-text"
                             onclick="location.href='#{{ \Str::slug($services->second_title, '-') }}';"
                             style="cursor: pointer">
                            {{ $services->second_title }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3" id="{{ \Str::slug($services->first_title, '-') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="owner-message">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>{{ $services->first_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $services->first_details ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ pageImage($services->first_image) }}"
                         alt="A message from the owners image"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3" id="{{ \Str::slug($services->second_title, '-') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ pageImage($services->second_image) }}"
                         alt="Our mission"/>
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>{{ $services->second_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $services->second_title ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3" id="{{ \Str::slug($services->third_title, '-') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="owner-message">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>{{ $services->third_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $services->third_details ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ pageImage($services->third_image) }}"
                         alt="A message from the owners image"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3" id="{{ \Str::slug($services->fourth_title, '-') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ pageImage($services->fourth_image) }}"
                         alt="Our mission"/>
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>{{ $services->fourth_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $services->fourth_details ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3" id="{{ \Str::slug($services->fifth_title, '-') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="owner-message">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>{{ $services->fifth_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $services->fifth_details ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ pageImage($services->fifth_image) }}"
                         alt="A message from the owners image"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3" id="{{ \Str::slug($services->sixth_title, '-') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ pageImage($services->sixth_image) }}"
                         alt="Our mission"/>
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>{{ $services->sixth_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $services->sixth_details ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3" id="{{ \Str::slug($services->seventh_title, '-') }}">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="owner-message">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>{{ $services->seventh_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $services->seventh_details ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ pageImage($services->seventh_image) }}"
                         alt="A message from the owners image"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section wwa-section border-0 mt-5 py-4"
             style="background-image: url({{ asset('sites/img/wwa.jpg') }});">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-sm-6">
                    <span class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }}</span>
                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">{{ __('Turkey Advisors') }}</h2>
                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-6">{{ __('messages.contact_us') }}</h4>
                </div>
                <div class="col-sm-6 text-start text-lg-end mt-4">
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile"
                       href="{{ route('contact') }}">{{ __('messages.get_in_touch') }}<span
                            class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
