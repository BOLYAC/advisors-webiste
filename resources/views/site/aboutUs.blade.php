@extends('layouts.simple')
@section('title')
    {{ __('messages.about_us') }} | Turkey Advisors
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/aboutUs.css') }}">
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5" style="background-image: url({{ asset('img/background.jpg') }});">
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
                    <h2>Our Vision</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ asset('sites/img/about/our-vision.jpg') }}" alt="Our vision" />
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ asset('sites/img/about/our-approach.jpg') }}" alt="Our approach" />
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>Our Approach</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>Our Process</h2>
                    <p class="lead">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ asset('sites/img/about/our-process.jpg') }}" alt="Our process" />
                </div>
            </div>
        </div>
    </section>
    <section class="section wwa-section border-0 mt-5 py-4" style="background-image: url({{ asset('img/wwa.jpg') }});">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-sm-6">
                    <span class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">Turkey Advisors</h2>
                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-6">{{ __('messages.contact_us_now') }}</h4>
                </div>
                <div class="col-sm-6 text-start text-lg-end mt-4">
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile" href="#">{{ __('messages.get_in_touch') }} <span class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
