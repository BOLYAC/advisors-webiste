@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('sites/css/aboutUs.css') }}">
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
                    <h1 class="mt-3 text-uppercase">{{ __('messages.about_us') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.about_us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>{{ $about->about_us_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $about->about_us_details ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ pageImage($about->about_us_image) }}" alt="About us"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-2 border-0 mb-0 py-5">
        <div class="container container-lg mb-lg-5">
            <div class="beehive pb-lg-5">
                <div class="center center1">
                    <div class="shape odd">
                        <div class="shape-text" onclick="location.href='#owner-message';" style="cursor: pointer">
                            {{ $about->a_message_from_the_owners_tile ?? '' }}
                        </div>
                    </div>
                    <div class="shape even secondary">
                        <div class="shape-text" onclick="location.href='#our-mission';" style="cursor: pointer">
                            {{ $about->our_mission_title ?? '' }}
                        </div>
                    </div>
                    <div class="shape odd">
                        <div class="shape-text">
                            <img src="{{ asset('sites/img/logo.png')  }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="shape even secondary">
                        <div class="shape-text" onclick="location.href='#our-vision';" style="cursor: pointer">
                            {{ $about->our_vision_title ?? '' }}
                        </div>
                    </div>
                    <div class="shape odd">
                        <div class="shape-text" onclick="location.href='#our-team';" style="cursor: pointer">
                            {{ $about->team_title ?? '' }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="owner-message">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>{{ $about->a_message_from_the_owners_tile ?? '' }}</h2>
                    <p class="lead">
                        {!! $about->a_message_from_the_owners_details ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ pageImage($about->a_message_from_the_owners_image) }}"
                         alt="A message from the owners image"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="our-mission">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ pageImage($about->our_mission_image) }}"
                         alt="Our mission"/>
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>{{ $about->our_mission_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $about->our_mission_details ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="our-vision">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>{{ $about->our_vision_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $about->our_vision_details ?? '' !!}
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ pageImage($about->our_vision_image) }}"
                         alt="Our vision"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="our-team">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ pageImage($about->team_image) }}"
                         alt="Our team"/>
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>{{ $about->team_title ?? '' }}</h2>
                    <p class="lead">
                        {!! $about->team_details ?? '' !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section team-section section-height-3 border-0">
        <div class="container">
            <h2 class="text-center mb-5">Our Team</h2>
            @foreach($users as $user)
                <div class="row team-member gx-4 gx-xxl-5 align-items-center mb-5">
                    <div class="col-lg-3 mb-4">
                        <div class="team-photo ratio ratio-1x1 mb-4 text-center m-auto">
                            <img src="{{ pageImage($user->photo_file) }}" alt="">
                        </div>
                        <div class="team-info text-center mb-2">
                            <h5 class="mb-2"><a>{{ $user->name }}</a></h5>
                            <span>{{ $user->title }}</span>
                        </div>
                    </div>
                    <div class="col-lg-9 team-testimonial">
                        <blockquote>
                            {{ $user->details }}
                        </blockquote>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <section class="section wwa-section border-0 mt-5 py-4"
             style="background-image: url({{ asset('sites/img/wwa.jpg') }});">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-sm-6">
                    <span class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">{{ __('Turkey Advisors') }}</h2>
                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-6">{{ __('messages.contact_us_now') }}</h4>
                </div>
                <div class="col-sm-6 text-start text-lg-end mt-4">
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile"
                       href="{{ route('contact') }}">{{ __('messages.get_in_touch') }} <span
                            class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
