<!doctype html>
<html lang="{{ App::getLocale() }}" class="no-focus ltr"
      dir="ltr">
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
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Tajawal:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('sites/css/app.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('sites/css/landingPage.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('sites/css/custom.rtl.css') }}">
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
    <div class="landing-page"
         style="background-image: url({{ asset('sites/img/landing-page/landing-page-background.jpg') }}">
        <div class="landing-page-header py-4 py-sm-5 text-center"
             style="background-image: url('{{ asset('sites/img/landing-page/landing-page-header.jpg') }}')">
            <img src="{{ asset('sites/img/landing-page/landing-page-logo.png') }}" alt="">
        </div>
        <section class="banner-section py-0">
            <img class="banner-background" src="{{ asset('sites/img/landing-page/banner.png') }}" alt="">
            <div class="banner-content d-flex align-items-center">
                <div class="container d-flex align-items-center justify-content-center justify-content-lg-start">
                    <img src="{{ asset('sites/img/landing-page/passport.png') }}" alt="Citizenship By Investment"
                         class="d-inline-flex banner-image">
                    <div class="banner-text d-inline-flex font-weight-bold" style="right:10px;">{{__('دریافت شهروندی')}}<br/>{{ __('ترکیه
                        با سرمایه گذاری') }}
                    </div>
                </div>
            </div>
        </section>
        <section class="statistics-section py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9 col-md-12">
                        <div class="row gx-5">
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/infrastructures.png') }}"
                                                 alt="infrastructures">
                                        </div>
                                        <div class="stat-text text-center">
                                            {{ __('. ترکیه، قابل توجه ترین میزاندر افزایش سرمایه را داراست') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/health-care.png') }}"
                                                 alt="health care">
                                        </div>
                                        <div class="stat-text text-center">
                                            {{ __('ترکیه') }} <br/>
                                            {{ __('از بهترین خدمات درمانی بهره مند است') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/investment.png') }}"
                                                 alt="investment">
                                        </div>
                                        <div class="stat-text text-center">
                                            {{ __('ترکیه') }}<br/>
                                            {{ __('دارای زیرساخت های پیشرفته است') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/robust-economy.png') }}"
                                                 alt="robust economy">
                                        </div>
                                        <div class="stat-text text-center">
                                            {{ __('تجارت ترکیه، جاذب بزرگترین سرمایه') }} <br/>
                                            {{ __('گذاران دنیا شده است') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/taxation-system.png') }}"
                                                 alt="Taxation System">
                                        </div>
                                        <div class="stat-text text-center">
                                            {{ __('ترکیه، سیستم مالیاتی آسانی دارد') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/international-capital.png') }}"
                                                 alt="International Capital">
                                        </div>
                                        <div class="stat-text text-center">
                                            {{ __('ترکیه، اقتصاد قدرتمندی دارد') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11 col-xl-10 col-xxl-9">
                        <h2 class="mt-5">{{ __('آمار مربوط به املاک فروخته شده در فوریه 2022') }}</h2>
                        <ul>
                            <li class="mb-3">{{ __('فروش املاک به اقشار سرمایه گذار غیر ترک به 77.1% افزایش داشته که نشان میدهد
                                در فوریه سال 2022 ، تعداد 7841 ملک خریداری شده است') }}
                            </li>
                            <li class="mb-3">{{ __('سرمایه گذاران ایرانی با رتبه اول – 1462 خرید شهروندان عراقی با رتبه دوم
                                1039 خرید و روسیه ای ها با تعداد 885 خرید ملک در رتبه سوم قرار دارند') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section statistics2-section"
                 style="background-image: url({{ asset('sites/img/landing-page/statistics2-background.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="stat text-center">
                            <img src="{{ asset('sites/img/landing-page/stat1.png') }}" alt="" class="mb-3">
                            <h4>{{ __('فروش') }}<br/>{{ __(' کلی به تعداد 226.503 در فوریه 2011') }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="stat text-center">
                            <img src="{{ asset('sites/img/landing-page/stat2.png') }}" alt="" class="mb-3">
                            <h4>{{ __('77.1%') }} <br>{{ __('رشد در تعداد املاک فروخته شده به نسبت ماه فوریه') }}</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="stat text-center">
                            <img src="{{ asset('sites/img/landing-page/stat3.png') }}" alt="" class="mb-3">
                            <h4>{{ __('7.841') }}<br/>{{ __(' واحد به سرمایه گذاران خارجی در ماه فوریه') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section contact-section section-height-3">
            <div class="container">
                <p class="mb-5">
                    {{ __(' قانون دریافت شهروندی ترکیه به سرمایه گذاران خارجی با خرید ملک به ارزش 250.000 دلار قطعی میباشد
                     انتظار میرود که در آینده ارزش این نوع سرمایه گذاری تغییر کرده و افزایش خواهد یافت، بنابراین فرصت
                     سرمایه گذاری در سودآورترین نقطه ی جهان را از دست ندهید') }}
                </p>
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-6 text-center">
                        <a href="#" class="btn btn-gradient px-4 px-sm-5 py-2 py-sm-3 fw-bold">
                            {{ __('امروز همراه ما شوید') }}
                        </a>
                    </div>
                </div>
                <h4 class="text-center fw-bold mb-5">
                    {{ __('واز فرصت مشاوره رایگان و تور مجازی ما استفاده کنید') }}
                </h4>
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center">
                        <div class="card card-rounded">
                            <div class="card-body shadow-lg">
                                <h2 class="mb-5">{{ __('با ما در تماس باشید') }}</h2>
                                <form action="{{ route('submit.contact') }}" method="POST">
                                    @csrf
                                    <input name="url_link" type="hidden" value="{{ url()->full()}}">
                                    <div class="form-group mb-5">
                                        <input
                                            class="form-control form-control-lg {{ $errors->has('name') ? 'error' : '' }}"
                                            name="name"
                                            placeholder="{{ __('نام') }}" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <input
                                            class="form-control form-control-lg {{ $errors->has('email') ? 'error' : '' }}"
                                            name="email"
                                            placeholder="{{ __('ایمیل') }}" required>
                                        @if ($errors->has('email'))
                                            <div class="error">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <input
                                            type="text"
                                            class="phone-input form-control form-control-lg {{ $errors->has('phone') ? 'error' : '' }}"
                                            name="phone"
                                            placeholder="{{ __('شماره تلفن شما') }}" required>
                                        @if ($errors->has('phone'))
                                            <div class="error">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <textarea class="form-control form-control-lg" rows="3"
                                                  name="message"
                                                  placeholder="{{ __('پیام') }}"></textarea>
                                    </div>
                                    <div class="form-group pt-4 pt-xs-5">
                                        <button type="submit"
                                                class="btn btn-gradient px-5 py-2">{{ __('برای کسب اطلاعات بیشتر') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section projects-section section-height-2">
            <div class="container">
                <h2 class="text-uppercase">{{__('پروژه های پیشنهادی')}}</h2>
                <div class="projects">
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">1</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-1-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-1-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-1-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">{{ __('برای کسب اطلاعات بیشتر') }}</div>
                            <div class="price text-secondary text-center">$500.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <span class="d-block text-light mb-1 mb-sm-2">{{ __('برای اطلاعات بیشتر') }}</span>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta124">
                                {{__('اکنون پرس و جو کنید')}}</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Zeytinburnu
                            </div>
                        </div>
                    </div>
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">2</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-2-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-2-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-2-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">{{ __('برای کسب اطلاعات بیشتر') }}</div>
                            <div class="price text-secondary text-center">$582.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <span class="d-block text-light mb-1 mb-sm-2">{{ __('برای اطلاعات بیشتر') }}</span>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta127">
                                {{__('اکنون پرس و جو کنید')}}</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Sariyer
                            </div>
                        </div>
                    </div>
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">3</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-3-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-3-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-3-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">{{ __('برای کسب اطلاعات بیشتر') }}</div>
                            <div class="price text-secondary text-center">$479.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <span class="d-block text-light mb-1 mb-sm-2">{{ __('برای اطلاعات بیشتر') }}</span>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta121">
                                {{__('اکنون پرس و جو کنید')}}</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Şişli
                            </div>
                        </div>
                    </div>
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">4</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-4-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-4-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-4-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">{{ __('برای کسب اطلاعات بیشتر') }}</div>
                            <div class="price text-secondary text-center">$184.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <span class="d-block text-light mb-1 mb-sm-2">{{ __('برای اطلاعات بیشتر') }}</span>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta09">
                                {{__('اکنون پرس و جو کنید')}}</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Bomonti
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section footer-section py-5"
                 style="background-image: url({{ asset('sites/img/landing-page/statistics2-background.jpg') }})">
            <div class="container text-center text-lg-left">
                <div class="row justify-content-between d-inline-block d-lg-flex">
                    <div class="col-lg-auto footer-contact align-items-center mb-3 mb-lg-0">
                        <img src="{{ asset('sites/img/landing-page/phone.png') }}" alt="" class="me-2 me-lg-3"> <a
                            href="tel:+905530124846">+90 553 012 48 46</a>
                    </div>
                    <div class="col-lg-auto footer-contact text-light align-items-center mb-3 mb-lg-0">
                        <img src="{{ asset('sites/img/landing-page/email.png') }}" alt="" class="me-2 me-lg-3"> <a
                            href="mailto:info@turkeyadvisors.com">info@turkeyadvisors.com</a>
                    </div>
                    <div class="col-lg-auto footer-contact text-light align-items-center mb-3 mb-lg-0">
                        <img src="{{ asset('sites/img/landing-page/cursor.png') }}" alt="" class="me-2 me-lg-3"> <a
                            href="https://www.turkeyadvisors.com">www.turkeyadvisors.com</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal for the inquiry project -->
    <div class="modal contact-modal fade" id="inquiry-project" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-uppercase my-0 py-0">{{ __('با ما در تماس باشید') }}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4">
                    <form action="{{ route('submit.contact') }}" method="POST">
                        @csrf
                        <input id="url_link" name="url_link" type="hidden" value="">
                        <div class="form-group">
                            <input
                                type="text" name="name"
                                class="form-control form-control-lg {{ $errors->has('name') ? 'error' : '' }}"
                                placeholder="{{ __('نام') }}" required>
                            @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input
                                type="email" name="email"
                                class="form-control form-control-lg {{ $errors->has('email') ? 'error' : '' }}"
                                placeholder="{{ __('ایمیل') }}" required>
                            @if ($errors->has('email'))
                                <div class="error">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input
                                type="text" name="phone"
                                class="phone-input form-control form-control-lg  {{ $errors->has('phone') ? 'error' : '' }}"
                                placeholder="{{ __('شماره تلفن') }}" required>
                            @if ($errors->has('phone'))
                                <div class="error">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                        <textarea name="message" class="form-control form-control-lg" rows="3"
                                  placeholder="{{ __('پیام') }}"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                    class="btn btn-primary text-secondary w-100 btn-lg px-5">{{ __('برای کسب اطلاعات بیشتر') }}
                                <span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal enquiry -->
    @include('site.includes.sideButtons')
    @include('cookieConsent::index')
</div>
<script src="{{ asset('sites/js/app.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $('.select-the-project').on('click', function (e) {
        $tr = $(this).data("id")
        $('#url_link').val($tr);
    })
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
