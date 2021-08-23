@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/service.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/service.css') }}">
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
                    <h1 class="mt-3 text-uppercase">{{ __('messages.single_service') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li><a href="{{ route('services') }}">{{ __('messages.services') }}</a></li>
                        <li class="active">{{ __('messages.single_service') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-1 border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-8 mb-5">
                    <div class="fluid-col-lg text-end">
                        <img src="{{ asset('sites/img/service/luxury_touch.png') }}" class="luxury-img img-fluid w-100"
                             alt=""/>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <h2 class="font-weight-extra-bold line-height-1 mb-4">Fine Touch Of Luxury</h2>
                    <p class="lead">You can be a Turkish Citizen by purchasing a property in Turkey that is worth a
                        minimum of $250,000. The Spouse and children who are less than 18 years old will also be granted
                        Turkish Citizenship. Your Turkish Citizenship will remain throughout your life and your children
                        will be born as Turkish Citizens. You can keep multiple citizenships along with your Turkish
                        Citizenship.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-1 border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9 text-center">
                    <h2 class="font-weight-extra-bold line-height-1 mb-4">Fine Touch Of Luxury</h2>
                    <p class="lead">You can be a Turkish Citizen by purchasing a property in Turkey that is worth a
                        minimum of $250,000. The Spouse and children who are less than 18 years old will also be granted
                        Turkish Citizenship. Your Turkish Citizenship will remain throughout your life and your children
                        will be born as Turkish Citizens. You can keep multiple citizenships along with your Turkish
                        Citizenship.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-1 border-0 mb-0 pt-5 smart-home">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-xl-6 mb-4">
                    <div class="pr-xl-5">
                        <h2 class="font-weight-extra-bold line-height-2 mb-3">CHOOSE A<br/>SMART HOME</h2>
                        <p class="text-6 font-weight-semibold text-danger">with our real estate agency</p>
                        <p class="lead mb-5 pb-2">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum. Sed do eiusmod.</p>
                        <div class="row">
                            <ul class="col-12 col-xl-8 list list-icons mb-4 mb-sm-5 mb-xl-0">
                                <li class="mb-5"><span class="service-img"><img
                                            src="{{ asset('sites/img/service/service1.svg') }}" alt="service1"/></span> Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec dui consectetur tellus
                                    ornare vehicula.
                                </li>
                                <li class="mb-5"><span class="service-img"><img
                                            src="{{ asset('sites/img/service/service2.svg') }}" alt="service2"/></span>
                                    Phasellus in risus quis lectus iaculis vulputate id quis nisl.
                                </li>
                                <li class="mb-0"><span class="service-img"><img
                                            src="{{ asset('sites/img/service/service3.svg') }}" alt="service3"/></span> Fusce
                                    sit amet orci quis arcu vestibulum vestibulum sed.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 floating-img">
                    <img src="{{ asset('sites/img/service/smart_home.png') }}" alt="smart_home"/>
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
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile"
                       href="#">{{ __('messages.get_in_touch') }} <span
                            class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
