@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/contact.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/contact.css') }}">
    @endif
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaQL2m5UerHfS1R118pLL8a1BeMu6sxB4&callback=initMap">
    </script>
    <script type="text/javascript">
        function initMap() {
            var zoom = 15;
            var latitude = 41.082941;
            var longitude = 28.941819;
            var mapOptions = {
                zoom: zoom,
                center: new google.maps.LatLng(latitude, longitude),
                styles: [
                    {elementType: "geometry", stylers: [{color: "#242f3e"}]},
                    {elementType: "labels.text.stroke", stylers: [{color: "#242f3e"}]},
                    {elementType: "labels.text.fill", stylers: [{color: "#746855"}]},
                    {
                        featureType: "administrative.locality",
                        elementType: "labels.text.fill",
                        stylers: [{color: "#e3ba32"}],
                    },
                    {
                        featureType: "poi",
                        elementType: "labels.text.fill",
                        stylers: [{color: "#e3ba32"}],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "geometry",
                        stylers: [{color: "#263c3f"}],
                    },
                    {
                        featureType: "poi.park",
                        elementType: "labels.text.fill",
                        stylers: [{color: "#6b9a76"}],
                    },
                    {
                        featureType: "road",
                        elementType: "geometry",
                        stylers: [{color: "#455465"}],
                    },
                    {
                        featureType: "road",
                        elementType: "geometry.stroke",
                        stylers: [{color: "#081217"}],
                    },
                    {
                        featureType: "road",
                        elementType: "labels.text.fill",
                        stylers: [{color: "#9ca5b3"}],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "geometry",
                        stylers: [{color: "#746855"}],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "geometry.stroke",
                        stylers: [{color: "#1f2835"}],
                    },
                    {
                        featureType: "road.highway",
                        elementType: "labels.text.fill",
                        stylers: [{color: "#f3d19c"}],
                    },
                    {
                        featureType: "transit",
                        elementType: "geometry",
                        stylers: [{color: "#2f3948"}],
                    },
                    {
                        featureType: "transit.station",
                        elementType: "labels.text.fill",
                        stylers: [{color: "#d59563"}],
                    },
                    {
                        featureType: "water",
                        elementType: "geometry",
                        stylers: [{color: "#17263c"}],
                    },
                    {
                        featureType: "water",
                        elementType: "labels.text.fill",
                        stylers: [{color: "#515c6d"}],
                    },
                    {
                        featureType: "water",
                        elementType: "labels.text.stroke",
                        stylers: [{color: "#17263c"}],
                    }]
            };


            var mapElement = document.getElementById('map');

            var map = new google.maps.Map(mapElement, mapOptions);

            var marker = new google.maps.Marker({
                map: map,
                title: 'Turkey Advisors',
            });
        }
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5"
             style="background-image: url({{ asset('sites/img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ __('messages.contact_us') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.contact_us') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-2">
        <div class="row justify-content-around">
            <div class="col-lg-5">
                <h2 class="text-uppercase">{{ __('messages.lets_chat') }} !</h2>
                <div class="row mt-5">
                    <div class="col-auto col-sm-6">
                        <span class="icon-border me-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.537" height="15.528"
                                 viewBox="0 0 16.537 15.528"><defs><style>.a {
                                            fill: #1f2b50;
                                        }

                                        .d {
                                            fill: #fff;
                                        }

                                        .c {
                                            fill: none;
                                            stroke: #002e5d;
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                        }</style></defs><g transform="translate(0.5)"><g transform="translate(0)"><rect
                                            class="a" width="7.927" height="15.528" rx="1.28"
                                            transform="translate(3.808)"/><rect class="d" width="6.768" height="12.503"
                                                                                rx="1.28"
                                                                                transform="translate(4.39 1.238)"/><path
                                            class="c" d="M36.49,14.18a2.931,2.931,0,0,1,.137,4.562"
                                            transform="translate(-23.499 -9.062)"/><path class="c"
                                                                                         d="M38.65,10.9a4.454,4.454,0,0,1,.213,6.93"
                                                                                         transform="translate(-24.879 -6.966)"/><path
                                            class="c" d="M5.494,14.18a2.931,2.931,0,0,0-.137,4.562"
                                            transform="translate(-2.949 -9.062)"/><path class="c"
                                                                                        d="M2.265,10.9a4.454,4.454,0,0,0-.213,6.93"
                                                                                        transform="translate(-0.499 -6.966)"/><path
                                            class="b"
                                            d="M20.529,1.546h-3.3a.13.13,0,0,1-.13-.13h0a.13.13,0,0,1,.13-.126h3.3a.13.13,0,0,1,.13.126h0A.13.13,0,0,1,20.529,1.546Z"
                                            transform="translate(-11.108 -0.824)"/><path class="b"
                                                                                         d="M21.666,39.752a.469.469,0,1,1-.141-.339A.473.473,0,0,1,21.666,39.752Z"
                                                                                         transform="translate(-13.421 -25.101)"/></g></g></svg>
                        </span>
                        <span class="text-3 text-sm-4 text-lg-3 text-xl-4"><a
                                href="tel://{{ config('settings.phone_number') }}">{{ config('settings.phone_number') }}</a></span>
                    </div>
                    <div class="col-auto col-sm-6 divider-left-border text-center">
                        <span
                            class="text-3 text-sm-4 text-lg-3 text-xl-4"><a
                                href="tel://{{ config('settings.phone_number_2') }}">{{ config('settings.phone_number_2') }}</a></span>
                    </div>
                </div>
                <hr class="taller"/>
                <div>
                    <span class="icon-border envelope me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14.4" height="16.032" viewBox="0 0 14.4 16.032"><defs><style>.a {
                                        fill: none;
                                    }

                                    .a, .b, .c {
                                        stroke: #002e5d;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                    }

                                    .b {
                                        fill: #002e5d;
                                    }

                                    .c, .d {
                                        fill: #fff;
                                    }</style></defs><g transform="translate(0.5 0.5)"><g transform="translate(0 0)"><rect
                                        class="a" width="13.4" height="9.043" transform="translate(0 5.989)"/><path
                                        class="b"
                                        d="M10.549,3.495,7.2.5,3.851,3.495.5,6.489,3.851,9.48,7.2,12.475,10.549,9.48,13.9,6.489Z"
                                        transform="translate(-0.5 -0.5)"/><path class="c"
                                                                                d="M7.2,26.38l3.347,2.995L13.9,32.369H.5l3.351-2.995Z"
                                                                                transform="translate(-0.5 -17.337)"/><path
                                        class="d"
                                        d="M15.82,9.5a2.509,2.509,0,0,1,1.013.95,2.638,2.638,0,0,1,.349,1.377,2.145,2.145,0,0,1-.314,1.237,1,1,0,0,1-.86.447.853.853,0,0,1-.493-.136.72.72,0,0,1-.28-.391,1.247,1.247,0,0,1-1.1.528,1.464,1.464,0,0,1-.734-.2,1.4,1.4,0,0,1-.524-.552,1.684,1.684,0,0,1-.189-.8,1.656,1.656,0,0,1,.189-.8,1.4,1.4,0,0,1,.524-.545,1.433,1.433,0,0,1,.748-.2,1.551,1.551,0,0,1,.584.1,1.136,1.136,0,0,1,.433.325v-.381h.674v2.069a.451.451,0,0,0,.091.314.287.287,0,0,0,.227.1.412.412,0,0,0,.381-.283,2.013,2.013,0,0,0,.129-.818A2.187,2.187,0,0,0,16.38,10.7a2.006,2.006,0,0,0-.825-.765,2.792,2.792,0,0,0-2.449.014,2.016,2.016,0,0,0-.825.807,2.341,2.341,0,0,0-.3,1.174,2.366,2.366,0,0,0,.29,1.188,2.02,2.02,0,0,0,.818.807,2.5,2.5,0,0,0,1.216.29,2.823,2.823,0,0,0,.608-.07,2.418,2.418,0,0,0,.573-.2l.164.486a2.331,2.331,0,0,1-.629.213,3.585,3.585,0,0,1-.716.073,3.068,3.068,0,0,1-1.506-.349,2.551,2.551,0,0,1-1.017-.992,2.827,2.827,0,0,1-.349-1.436,2.8,2.8,0,0,1,.349-1.422A2.617,2.617,0,0,1,12.8,9.526a3.145,3.145,0,0,1,1.516-.349A3.145,3.145,0,0,1,15.82,9.5Zm-.888,3.145a.961.961,0,0,0,.255-.7.907.907,0,0,0-1.555-.7.964.964,0,0,0-.248.7.975.975,0,0,0,.248.7A.94.94,0,0,0,14.933,12.643Z"
                                        transform="translate(-7.609 -6.143)"/></g></g></svg>
                    </span>
                    <a href="mailto:info@turkeyadvisors.com"
                       class="text-4">{{ config('settings.default_email_address') }}</a>
                </div>
                <hr class="taller"/>
                <div class="row mb-5 pb-5">
                    <div class="col-auto me-1 me-sm-5 text-4">{{ __('messages.follow_us') }} :</div>
                    <div class="col-auto">
                        <ul class="footer-social-icons social-icons social-icons-icon-light m-0">
                            <li class="social-icons-facebook"><a href="{{ config('settings.social_facebook') }}"
                                                                 target="_blank"
                                                                 title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li class="social-icons-instagram"><a href="{{ config('settings.social_instagram') }}"
                                                                  target="_blank"
                                                                  title="Instagram"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="social-icons-twitter"><a href="{{ config('settings.social_twitter') }}"
                                                                title="twitter"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-youtube"><a href="https://www.youtube.com/" target="_blank"
                                                                title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            <li class="social-icons-linkedin"><a href="{{ config('settings.social_linkedin') }}"
                                                                 target="_blank"
                                                                 title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <h2 class="text-uppercase">{{ __('messages.send_us_an_email') }}</h2>
                @if($errors->any())
                    <div class="success-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form action="{{ route('submit.contact') }}" method="POST">
                    @csrf
                    <div class="form-group mb-5">
                        <input type="text" name="name"
                               class="form-control form-control-lg {{ $errors->has('name') ? 'error' : '' }}"
                               placeholder="{{ __('messages.your_name') }}" required>
                        @if ($errors->has('name'))
                            <div class="error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <input type="email" name="email"
                               class="form-control form-control-lg {{ $errors->has('email') ? 'error' : '' }}"
                               placeholder="{{ __('messages.your_email') }}" required>
                        @if ($errors->has('email'))
                            <div class="error">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <input type="text" name="phone"
                               class="form-control form-control-lg {{ $errors->has('phone') ? 'error' : '' }}"
                               placeholder="{{ __('messages.your_phone_number') }}" required>
                        @if ($errors->has('phone'))
                            <div class="error">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group mb-5">
                        <textarea name="message" class="form-control form-control-lg" rows="3"
                                  placeholder="{{ __('messages.your_message') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-lg px-5">{{ __('messages.submit') }}
                            <span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="googlemap mt-5">
        <div id="map" style="height: 600px; margin-top: 25px"></div>
    </div>
@endsection
