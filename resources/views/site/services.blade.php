@extends('layouts.simple')
@section('title')
    {{ __('messages.services') }} | Turkey Advisors
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
             style="background-image: url({{ asset('img/background.jpg') }});">
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
    <section class="section about-section border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-4 mb-4">
                    <div class="pr-5">
                        <h2 class="font-weight-extra-bold line-height-1 mb-5">Fine Touch Of Luxury</h2>
                        <p class="lead mb-5 pb-2">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua</p>
                        <div class="more-details d-inline-block mb-4">
                            <a class="btn btn-outline-secondary btn-secondary-animated btn-lg px-5 w-auto-mobile w-100">{{ __('messages.view_more') }}
                                <span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-8 fluid-col-lg-6 fluid-col-xl-8">
                    <div class="fluid-col-lg fluid-col-end text-end">
                        <img src="{{ asset('sites/img/services/luxury.jpg') }}" class="img-fluid w-100" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section about-section section-height-3 border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-8 fluid-col-xl-8 order-1 order-lg-0" style="min-height: 33vw;">
                    <div class="fluid-col-lg fluid-col-start text-start">
                        <img src="{{ asset('sites/img/services/virtual.jpg') }}" class="img-fluid w-100" alt=""/>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 order-0 order-lg-1 mb-4">
                    <div class="pr-5">
                        <h2 class="font-weight-extra-bold line-height-1 mb-5">Virtual Tour 360</h2>
                        <p class="lead mb-5 pb-2">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                            nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua</p>
                        <div class="more-details d-inline-block mb-4">
                            <a class="btn btn-outline-secondary btn-secondary-animated btn-lg px-5 w-auto-mobile w-100">{{ __('messages.view_more') }}
                                <span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section wwa-section border-0 mt-5 py-4" style="background-image: url({{ asset('img/wwa.jpg') }});">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-sm-6">
                    <span class="d-block font-weight-semibold text-4 mb-1">Who we are !</span>
                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">Turkey Advisors</h2>
                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-6">Contact Us Now</h4>
                </div>
                <div class="col-sm-6 text-start text-lg-end mt-4">
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile" href="#">Get In Touch <span
                            class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
