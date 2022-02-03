@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('sites/vendor/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('sites/vendor/rs-plugin/css/layers.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('sites/vendor/rs-plugin/css/navigation.css') }}" media="screen">
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/homepage.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/homepage.css') }}">
    @endif
@endsection

@section('javascripts')
    <script src="{{ asset('sites/js/homepage.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        window.$ = window.jQuery = $;
        $('.common_selector').click(function () {
            console.log($(this).attr('id'))
            $('#citiesMenu').html($(this).attr('id'))
        });
    </script>
    <script src="{{ asset('sites/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('sites/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
@endsection

@section('content')
    <div class="slider-container rev_slider_wrapper" style="height: 700px;">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
             data-plugin-options="{ 'gridwidth': 1200, 'gridheight':700, 'disableProgressBar': 'on', 'navigation': {'arrows': {'enable': true, 'hide_onmobile': true, 'style': 'gyges', 'left': { 'h_offset': 100 }, 'right': { 'h_offset': 100 } }, 'bullets': {'enable': true, 'style': 'hesperiden','h_align': 'center', 'v_align': 'bottom', 'h_offset': 0, 'v_offset': 20, 'space': 5} }}">
            <ul>
                @foreach($banners as $banner)
                    <li data-transition="fade" class="slide slide1">
                        <img
                            src="{{ ($banner->vide_type === true ? asset('sites/img/slides/slide1/background.jpg') : pageImage($banner->youtube_link) ) }}"
                            alt="slide background"
                            class="rev-slidebg"/>
                        <div class="tp-caption slide-text"
                             data-x="{{ App::getLocale() === 'ar' ? 'right' : 'left'}}"
                             data-hoffset="{{ App::getLocale() === 'ar' ? '-740' : '40'}}"
                             data-y="top" data-voffset="250"
                             data-width="850"
                             data-start="800"
                             data-whitespace="nowrap"
                             data-transform_in="y:100%;s:400;"
                             data-transform_out="opacity:0;s:1000;"
                             data-basealign="grid"
                             style="z-index: 5"
                             data-mask_in="x:0px;y:0px;">
                            <h2>{{ $banner->title ?? '' }}</h2>
                            <h4>{!! $banner->details !!}</h4>
                        </div>
                        <div class="tp-caption slide-text"
                             data-x="{{ App::getLocale() === 'ar' ? 'right' : 'left'}}"
                             data-hoffset="{{ App::getLocale() === 'ar' ? '-740' : '40'}}"
                             data-y="top" data-voffset="430"
                             data-width="800"
                             data-start="800"
                             data-whitespace="nowrap"
                             data-transform_in="y:100%;s:400;"
                             data-transform_out="opacity:0;s:1000;"
                             data-basealign="grid"
                             style="z-index: 5"
                             data-mask_in="x:0px;y:0px;">
                            <a class="btn btn-secondary btn-blink"
                               href="{{ $banner->link_url }}">{{ __('messages.enquire_now') }} <span
                                    class="arrow1 is-triangle arrow-bar is-right"></span></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <section class="section search-form-section section-no-background my-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-4 mb-3">
                    <h3 class="mb-0">{{ __('messages.find_your_dream_home') }}</h3>
                </div>
                <div class="col-xl-8">
                    <form class="row align-items-center" id="form-projects-ajax" role="form" method="get"
                          action="{{ route('projects') }}">
                        @csrf
                        <div class="col-lg-3">
                            <button class="cities-dropdown btn dropdown-toggle" type="button" id="citiesMenu"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('messages.city') }}
                            </button>
                            <div class="cities-dropdown-menu dropdown-menu p-4" aria-labelledby="citiesMenu">
                                <h6>{{ __('messages.city') }}</h6>
                                <div class="row gx-5">
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="1" id="istanbul"
                                                   name="city[]">
                                            <label class="form-check-label" for="istanbul">
                                                {{ __('Istanbul') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="4" id="sapanca"
                                                   name="city[]">
                                            <label class="form-check-label" for="sapanca">
                                                {{ __('Sapanca') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="6" id="kıbrıs"
                                                   name="city[]">
                                            <label class="form-check-label" for="kıbrıs">
                                                {{ __('Kıbrıs') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="2" id="bodrum"
                                                   name="city[]">
                                            <label class="form-check-label" for="bodrum">
                                                {{ __('Bodrum') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="5" id="trapzon"
                                                   name="city[]">
                                            <label class="form-check-label" for="trapzon">
                                                {{ __('Trapzon') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="7" id="bursa"
                                                   name="city[]">
                                            <label class="form-check-label" for="bursa">
                                                {{ __('Bursa') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="3" id="antalya"
                                                   name="city[]">
                                            <label class="form-check-label" for="antalya">
                                                {{ __('Antalya') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="8" id="izmir"
                                                   name="city[]">
                                            <label class="form-check-label" for="izmir">
                                                {{ __('Izmir') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="property-type" id="property-type" class="form-control form-control-lg">
                                    <option value="">{{ __('messages.property_type') }}</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="project_bedrooms" id="project_bedrooms"
                                        class="form-control form-control-lg">
                                    <option value="">{{ __('messages.bedrooms') }}</option>
                                    <option value="1">1+0</option>
                                    <option value="2">1+1</option>
                                    <option value="3">2+1</option>
                                    <option value="4">3+1</option>
                                    <option value="5">4+1</option>
                                    <option value="6">{{ __('More') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2 mt-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3"><i
                                    class="fa fa-search me-2"></i> {{ __('messages.search') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="section best-offers-section my-0">
        <div class="container">
            <h3 class="mb-4">{{ __('messages.best_offers') }}</h3>
            <div class="owl-carousel owl-theme offers">
                @foreach($stories as $story)
                    <div class="offer">
                        <div class="story embed-responsive embed-responsive-1by1">
                            <a href="{{ route('story', $story->id) }}">
                                <img class="embed-responsive-item w-100 h-100 img-responsive p-2"
                                     src="{{ pageImage($story->photo_file) }}" alt="">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section projects-section my-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-10">
                    <h3>{{ __('messages.hot_properties') }} | {{ __('messages.own_what_you_deserve') }}.</h3>
                </div>
                <div class="col-lg-3 col-xl-2 text-start text-lg-end mb-3">
                    <a href="{{ route('projects') }}"
                       class="btn btn-secondary btn-secondary-animated btn-lg px-5 px-lg-0 w-auto-mobile w-100">{{ __('messages.projects') }}
                        <span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
            <div class="owl-carousel owl-theme projects mt-3">
                @foreach($projects as $project)
                    <div class="project card">
                        <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}">
                            <div class="ratio ratio-16x9">
                                <img class="card-img-top" src="{{ pageImage($project->photo_file) }}" alt="Project">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="card-infos">
                                <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}">
                                    <h4 class="card-title mb-4 text-7 font-weight-bold">{{ __('messages.project_no') }} {{ $project->title  }}</h4>
                                </a>
                                <div class="row features mb-3 gx-2 gx-sm-3">
                                    <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                      src="{{ asset('sites/img/project/map.svg') }}"
                                                                      alt="map"/>
                                        @switch($project->city)
                                            @case(1)
                                            {{  __('Istanbul') }}
                                            @break
                                            @case(2)
                                            {{  __('Bodrum') }}
                                            @break
                                            @case(3)
                                            {{  __('Antalya') }}
                                            @break
                                            @case(4)
                                            {{  __('Sapanca') }}
                                            @break
                                            @case(5)
                                            {{  __('Trapzon') }}
                                            @break
                                            @case(6)
                                            {{  __('Kıbrıs') }}
                                            @break
                                            @case(7)
                                            {{  __('Bursa') }}
                                            @break
                                            @case(8)
                                            {{  __('Izmir') }}
                                            @break

                                        @endswitch
                                    </div>
                                    <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                      src="{{ asset('sites/img/project/hand.svg') }}"
                                                                      alt="hand"/> {{ $project->payment_type == '1' ? __('Cash') : __('Installment') }}
                                    </div>
                                    <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                      src="{{ asset('sites/img/project/hourglass.svg') }}"
                                                                      alt="hourglass"/>
                                        @switch($project->status)
                                            @case(1)
                                            {{  __('Not available') }}
                                            @break
                                            @case(2)
                                            {{  __('Preparing selling') }}
                                            @break
                                            @case(3)
                                            {{  __('Selling') }}
                                            @break
                                            @case(4)
                                            {{  __('Sold') }}
                                            @break
                                            @case(5)
                                            {{  __('Building') }}
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                                <p class="card-text text-4 mb-5">
                                    {!! \Str::limit($project->details , 150, $end='...') !!}
                                </p>
                            </div>
                            <div class="row align-items-center justify-content-between">
                                <div
                                    class="col-auto col-sm-6 price text-primary text-5 text-sm-6 font-weight-semibold">{{ currencyConvert($project->lowest_price) }}
                                </div>
                                <div class="col-auto col-sm-6 more-details">
                                    <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}"
                                       class="btn btn-primary btn-line w-100 text-3">{{ __('messages.more_details') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section articles-section my-0 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-10">
                    <h3>{{ __('messages.recently_added_articles') }}</h3>
                </div>
                <div class="col-lg-3 col-xl-2 text-start text-lg-end mb-3">
                    <a href="{{ route('blog') }}"
                       class="btn btn-secondary btn-secondary-animated btn-lg px-5 px-lg-0 w-auto-mobile w-100">{{ __('messages.articles') }}
                        <span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
            <div class="owl-carousel owl-theme articles mt-3">
                @foreach($posts as $post)
                    <div class="article card border-radius-0">
                        <a href="{{ route('post.details', $post->seo_url_slug ?? $post->translate('en')->seo_url_slug) }}">
                            <div class="ratio ratio-16x9">
                                <img class="card-img-top" src="{{ pageImage($post->photo_file) }}"
                                     alt="{{ $post->title }}">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="article-date"><i
                                    class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($post->date)->format('d M Y')}}
                            </div>
                            <div class="article-views"><i
                                    class="fa fa-eye me-1"></i> {{ $post->visits }} {{ __('messages.views') }}
                            </div>
                            <a href="{{ route('post.details', $post->seo_url_slug ?? $post->translate('en')->seo_url_slug) }}">
                                <div class="card-title">
                                    <div
                                        class="mb-3 text-4 card-subtitle">{{ $post->categories->first()->title ?? '' }}</div>
                                    <h4 class="mb-0 text-5 text-sm-6 text-lg-5 font-weight-bold">{{ $post->title }}</h4>
                                </div>
                            </a>
                            <div class="card-text row align-items-end">

                                <div class="col-10">
                                    <p class="text-4">{!! \Str::limit($post->details , 100, $end='...') !!}</p>
                                </div>
                                <div class="col-2 read-more text-end">
                                    <a href="{{ route('post.details', $post->seo_url_slug ?? $post->translate('en')->seo_url_slug) }}"><span
                                            class="arrow2 is-triangle arrow-bar is-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container">
        <hr class="bg-color-grey-scale-3 mt-5">
    </div>
    <section class="section about-section section-height-4 border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-xl-5">
                    <div class="pr-5">
                        <span class="d-block font-weight-light text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                        <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">{{ __('Turkey Advisors') }}</h2>
                        <div class="img-fluid d-block d-lg-none mb-4">
                            <img src="{{ asset('sites/img/about.jpg') }}" class="img-fluid" alt=""/>
                        </div>
                        <p class="text-5 mb-5 pb-2">{{ __('messages.turkey_advisors_about') }}</p>
                        <div class="more-details d-inline-block mb-4">
                            <a href="{{ route('about') }}"
                               class="btn btn-primary btn-line text-4 px-5">{{ __('messages.about_us') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 fluid-col-lg-6 d-none d-lg-flex" style="min-height: 33vw;">
                    <div class="fluid-col text-end">
                        <img src="{{ asset('sites/img/about.jpg') }}" class="img-fluid" alt=""/>
                    </div>
                </div>
            </div>
            <img src="{{ asset('sites/img/about2.png') }}" class="img-center d-none d-xl-block" alt=""/>
        </div>
    </section>
    <section class="section wwa-section border-0 mt-5 py-4"
             style="background-image: url({{ asset('sites/img/wwa.jpg') }});">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-sm-6">
                    <span class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">{{ __('Turkey Advisors') }}</h2>
                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-6">{{ __('messages.some_offers') }}</h4>
                </div>
                <div class="col-sm-6 text-start text-lg-end mt-4">
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile"
                       href="{{ route('contact') }}">{{ __('messages.get_in_touch') }} <span
                            class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="section projects-section mt-4 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-10">
                    <h3>{{ __('messages.projects_conform_to_obtaining_turkish_citizenship') }}</h3>
                </div>
                <div class="col-lg-3 col-xl-2 text-start text-lg-end mb-3">
                    <a href="{{ route('projects') }}"
                       class="btn btn-secondary btn-secondary-animated btn-lg px-5 px-lg-0 w-auto-mobile w-100">{{ __('messages.projects') }}
                        <span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
            <div class="owl-carousel owl-theme projects mt-3">
                @foreach($citizenProjects as $p)
                    <div class="project card">
                        <a href="{{ route('project.detail', $p->seo_url_slug ?? $p->translate('en')->seo_url_slug) }}">
                            <div class="ratio ratio-16x9">
                                <img class="card-img-top" src="{{ pageImage($p->photo_file) }}" alt="Project">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="card-infos">
                                <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}">
                                    <h4 class="card-title mb-4 text-7 font-weight-bold">{{ __('messages.project_no') }} {{ $p->title  }}</h4>
                                </a>
                                <div class="row features mb-3 gx-3">
                                    <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                      src="{{ asset('sites/img/project/map.svg') }}"
                                                                      alt="map"/>
                                        @switch($project->city)
                                            @case(1)
                                            {{  __('Istanbul') }}
                                            @break
                                            @case(2)
                                            {{  __('Bodrum') }}
                                            @break
                                            @case(3)
                                            {{  __('Antalya') }}
                                            @break
                                            @case(4)
                                            {{  __('Sapanca') }}
                                            @break
                                            @case(5)
                                            {{  __('Trapzon') }}
                                            @break
                                            @case(6)
                                            {{  __('Kıbrıs') }}
                                            @break
                                            @case(7)
                                            {{  __('Bursa') }}
                                            @break
                                            @case(8)
                                            {{  __('Izmir') }}
                                            @break

                                        @endswitch
                                    </div>
                                    <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                      src="{{ asset('sites/img/project/hand.svg') }}"
                                                                      alt="hand"/> {{ $p->payment_type == '1' ? __('Cash') : __('Installment') }}
                                    </div>
                                    <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                      src="{{ asset('sites/img/project/hourglass.svg') }}"
                                                                      alt="hourglass"/>
                                        @switch($p->status)
                                            @case(1)
                                            {{  __('Not available') }}
                                            @break
                                            @case(2)
                                            {{  __('Preparing selling') }}
                                            @break
                                            @case(3)
                                            {{  __('Selling') }}
                                            @break
                                            @case(4)
                                            {{  __('Sold') }}
                                            @break
                                            @case(5)
                                            {{  __('Building') }}
                                            @break
                                        @endswitch

                                    </div>
                                </div>
                                <p class="card-text text-4 mb-5">{!! \Str::limit($p->details , 150, $end='...') !!}</p>
                            </div>
                            <div class="row align-items-center justify-content-between">
                                <div
                                    class="col-auto col-sm-6 price text-primary text-5 text-sm-6 font-weight-semibold">{{ currencyConvert($p->lowest_price) }}
                                </div>
                                <div class="col-auto col-sm-6 more-details">
                                    <a href="{{ route('project.detail', $p->seo_url_slug ?? $p->translate('en')->seo_url_slug) }}"
                                       class="btn btn-primary btn-line w-100 text-3">{{ __('messages.more_details') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section newsletter-section my-0">
        <div class="container">
            <div class="newsletter-content row justify-content-around py-5 px-5 px-lg-0 px-xl-5">
                <div class="col-lg-5 col-xl-6 text-center">
                    <img src="{{ asset('sites/img/newsletter.png') }}" alt="newsletter" class="w-100-mobile"/>
                </div>
                <div class="col-lg-7 col-xl-5 col-xxl-4 py-5">
                    <h5>{{ __('messages.subscribe_via_email') }}</h5>
                    <p class="text-4">{{ __('messages.subscription_details') }}</p>
                    <form action="{{ route('submit.subscribe') }}" method="POST" class="newsletter-form row gx-2">
                        @csrf
                        <div class="col-auto mb-2">
                            <label class="sr-only" for="email">{{ __('messages.email') }}</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="{{ __('messages.email_address') }}">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit"
                                    class="btn btn-secondary px-4 px-sm-5 px-xxl-4 text-uppercase">{{ __('messages.subscribe') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="section services-section my-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-xl-10">
                    <h3>{{ __('messages.our_services') }}</h3>
                </div>
                <div class="col-lg-3 col-xl-2 text-start text-lg-end mb-3">
                    <a href="{{ route('services') }}"
                       class="btn btn-secondary btn-secondary-animated btn-lg px-5 px-lg-0 w-auto-mobile w-100">{{ __('messages.services') }}
                        <span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
            <div class="row gx-4 gx-xl-3 gx-xxl-4 mt-4">
                <div class="service col-md-6 col-xl-3 mb-4 flex-fill">
                    <div class="card">
                        <div class="card-body">
                            <span class="icon-border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40.305"><defs></defs><g
                                        transform="translate(0 -0.003)"><path class="a"
                                                                              d="M1.342,40.308H5.383a1.339,1.339,0,0,0,1.342-1.342V37.624h15.2a18.013,18.013,0,0,0,17.74-14.881l.292-1.649a2.529,2.529,0,0,0-2.042-2.932,2.493,2.493,0,0,0-1.59.233V15.419H37a.679.679,0,0,0,.671-.671.739.739,0,0,0-.19-.481L32.081,8.9a.669.669,0,0,0-.948,0l-1.546,1.546V1.312A.679.679,0,0,0,28.916.64H22.19a.679.679,0,0,0-.671.671v7.4H18.791a11.145,11.145,0,0,0-1.2-2.159L19.3,2.391A1.153,1.153,0,0,0,18.674.874,1.167,1.167,0,0,0,17.711.9l-1.269.642L15.64.48A1.165,1.165,0,0,0,14.006.247c-.058.015-.088.058-.131.088L12.853,1.355l-.671-.89A1.18,1.18,0,0,0,10.548.232c-.044.029-.088.073-.131.1l-1.284,1.3-1.94-.554a1.161,1.161,0,0,0-1.444.8,1.145,1.145,0,0,0,.1.875L7.878,6.505c-1.43,1.284-3.166,4.917-3.166,8.214v2.057a4.05,4.05,0,0,0,4.041,4.041H34.562l-1.415,2.845-3.706,1.59a3.344,3.344,0,0,0-3.21-2.407H16.544a18.652,18.652,0,0,0-9.818,2.787V24.187a1.339,1.339,0,0,0-1.342-1.342H1.342A1.317,1.317,0,0,0,0,24.173V38.966A1.339,1.339,0,0,0,1.342,40.308ZM8.856,2.96a1.163,1.163,0,0,0,1.138-.292l1.225-1.225.686.89a1.18,1.18,0,0,0,1.634.233.834.834,0,0,1,.117-.1l1.021-1.021.773,1.021a1.175,1.175,0,0,0,1.459.35l.977-.5L16.369,6.024H14.531L15.392,4.3l-1.2-.6-1.167,2.32H11.861l-.948-1.955L9.7,4.652l.657,1.371H9.147L7.236,2.493Zm6.609,6.419V19.46H8.739a2.687,2.687,0,0,1-2.684-2.684V14.719c0-3.6,2.232-6.959,2.859-7.353h7.616A7.269,7.269,0,0,1,17.3,8.708H16.136A.679.679,0,0,0,15.464,9.379Zm1.342.671h4.712v9.41H16.807Zm14.793.277,3.749,3.749H27.836ZM22.861,1.983h5.383v9.8L25.75,14.281a.669.669,0,0,0,0,.948.649.649,0,0,0,.481.19H26.9V19.46H22.861Zm5.383,13.451H34.97v4.041H33.628v-2.7a.679.679,0,0,0-.671-.671H30.272a.679.679,0,0,0-.671.671V19.46H28.259V15.434Zm4.041,4.027H30.929V17.447h1.342V19.46ZM16.544,24.173h9.687a2.013,2.013,0,1,1,0,4.027H15.464v1.342H26.231a3.337,3.337,0,0,0,3.312-2.9L33.89,24.8a.653.653,0,0,0,.336-.321L36.4,20.132a1.186,1.186,0,0,1,1.59-.525,1.2,1.2,0,0,1,.642,1.269l-.292,1.649A16.654,16.654,0,0,1,21.927,36.282H6.726v-9.06A17.356,17.356,0,0,1,16.544,24.173Zm-15.2,0H5.383V38.966H1.342Z"
                                                                              transform="translate(0 0)"/><path
                                            class="a" d="M1.84,17.95H3.013v1.76H1.84Z"
                                            transform="translate(0.506 8.409)"/><path class="a"
                                                                                      d="M16.59,2.28h.587V3.453H16.59Z"
                                                                                      transform="translate(7.665 0.626)"/><path
                                            class="a" d="M17.98,2.28h.587V3.453H17.98Z"
                                            transform="translate(8.308 0.626)"/><path class="a"
                                                                                      d="M16.59,5.97h.587V7.143H16.59Z"
                                                                                      transform="translate(7.665 2.776)"/><path
                                            class="a" d="M17.98,5.97h.587V7.143H17.98Z"
                                            transform="translate(8.308 2.776)"/><path class="a"
                                                                                      d="M12.19,7.92h.587V9.093H12.19Z"
                                                                                      transform="translate(5.632 3.683)"/><path
                                            class="a" d="M13.57,7.92h.587V9.093H13.57Z"
                                            transform="translate(6.27 3.683)"/><path class="a"
                                                                                     d="M12.19,9.76h.587v1.173H12.19Z"
                                                                                     transform="translate(5.632 4.539)"/><path
                                            class="a" d="M13.57,9.76h.587v1.173H13.57Z"
                                            transform="translate(6.27 4.539)"/><path class="a"
                                                                                     d="M9.856,7.477H9.269V6.89H8.1v.587H7.509a.593.593,0,0,0-.587.587V9.836a.593.593,0,0,0,.587.587h1.76v.587H6.91V11.6a.593.593,0,0,0,.587.587h.587v.587H9.256v-.587h.587a.593.593,0,0,0,.587-.587V9.836a.593.593,0,0,0-.587-.587H8.1v-.6h2.346V8.063A.593.593,0,0,0,9.856,7.477Z"
                                                                                     transform="translate(3.314 3.414)"/></g></svg>
                            </span>
                            <h4 class="card-title my-3">{{ __('A name you can trust') }}</h4>
                            <p class="card-text">{{ __('We have served hundreds of satified and happy clients from all over
                                    the world. Turkey Advisors is a name you can trust') }}</p>
                        </div>
                    </div>
                </div>
                <div class="service col-md-6 col-xl-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="icon-border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40.305"><defs></defs><g
                                        transform="translate(0 -0.003)"><path class="a"
                                                                              d="M1.342,40.308H5.383a1.339,1.339,0,0,0,1.342-1.342V37.624h15.2a18.013,18.013,0,0,0,17.74-14.881l.292-1.649a2.529,2.529,0,0,0-2.042-2.932,2.493,2.493,0,0,0-1.59.233V15.419H37a.679.679,0,0,0,.671-.671.739.739,0,0,0-.19-.481L32.081,8.9a.669.669,0,0,0-.948,0l-1.546,1.546V1.312A.679.679,0,0,0,28.916.64H22.19a.679.679,0,0,0-.671.671v7.4H18.791a11.145,11.145,0,0,0-1.2-2.159L19.3,2.391A1.153,1.153,0,0,0,18.674.874,1.167,1.167,0,0,0,17.711.9l-1.269.642L15.64.48A1.165,1.165,0,0,0,14.006.247c-.058.015-.088.058-.131.088L12.853,1.355l-.671-.89A1.18,1.18,0,0,0,10.548.232c-.044.029-.088.073-.131.1l-1.284,1.3-1.94-.554a1.161,1.161,0,0,0-1.444.8,1.145,1.145,0,0,0,.1.875L7.878,6.505c-1.43,1.284-3.166,4.917-3.166,8.214v2.057a4.05,4.05,0,0,0,4.041,4.041H34.562l-1.415,2.845-3.706,1.59a3.344,3.344,0,0,0-3.21-2.407H16.544a18.652,18.652,0,0,0-9.818,2.787V24.187a1.339,1.339,0,0,0-1.342-1.342H1.342A1.317,1.317,0,0,0,0,24.173V38.966A1.339,1.339,0,0,0,1.342,40.308ZM8.856,2.96a1.163,1.163,0,0,0,1.138-.292l1.225-1.225.686.89a1.18,1.18,0,0,0,1.634.233.834.834,0,0,1,.117-.1l1.021-1.021.773,1.021a1.175,1.175,0,0,0,1.459.35l.977-.5L16.369,6.024H14.531L15.392,4.3l-1.2-.6-1.167,2.32H11.861l-.948-1.955L9.7,4.652l.657,1.371H9.147L7.236,2.493Zm6.609,6.419V19.46H8.739a2.687,2.687,0,0,1-2.684-2.684V14.719c0-3.6,2.232-6.959,2.859-7.353h7.616A7.269,7.269,0,0,1,17.3,8.708H16.136A.679.679,0,0,0,15.464,9.379Zm1.342.671h4.712v9.41H16.807Zm14.793.277,3.749,3.749H27.836ZM22.861,1.983h5.383v9.8L25.75,14.281a.669.669,0,0,0,0,.948.649.649,0,0,0,.481.19H26.9V19.46H22.861Zm5.383,13.451H34.97v4.041H33.628v-2.7a.679.679,0,0,0-.671-.671H30.272a.679.679,0,0,0-.671.671V19.46H28.259V15.434Zm4.041,4.027H30.929V17.447h1.342V19.46ZM16.544,24.173h9.687a2.013,2.013,0,1,1,0,4.027H15.464v1.342H26.231a3.337,3.337,0,0,0,3.312-2.9L33.89,24.8a.653.653,0,0,0,.336-.321L36.4,20.132a1.186,1.186,0,0,1,1.59-.525,1.2,1.2,0,0,1,.642,1.269l-.292,1.649A16.654,16.654,0,0,1,21.927,36.282H6.726v-9.06A17.356,17.356,0,0,1,16.544,24.173Zm-15.2,0H5.383V38.966H1.342Z"
                                                                              transform="translate(0 0)"/><path
                                            class="a" d="M1.84,17.95H3.013v1.76H1.84Z"
                                            transform="translate(0.506 8.409)"/><path class="a"
                                                                                      d="M16.59,2.28h.587V3.453H16.59Z"
                                                                                      transform="translate(7.665 0.626)"/><path
                                            class="a" d="M17.98,2.28h.587V3.453H17.98Z"
                                            transform="translate(8.308 0.626)"/><path class="a"
                                                                                      d="M16.59,5.97h.587V7.143H16.59Z"
                                                                                      transform="translate(7.665 2.776)"/><path
                                            class="a" d="M17.98,5.97h.587V7.143H17.98Z"
                                            transform="translate(8.308 2.776)"/><path class="a"
                                                                                      d="M12.19,7.92h.587V9.093H12.19Z"
                                                                                      transform="translate(5.632 3.683)"/><path
                                            class="a" d="M13.57,7.92h.587V9.093H13.57Z"
                                            transform="translate(6.27 3.683)"/><path class="a"
                                                                                     d="M12.19,9.76h.587v1.173H12.19Z"
                                                                                     transform="translate(5.632 4.539)"/><path
                                            class="a" d="M13.57,9.76h.587v1.173H13.57Z"
                                            transform="translate(6.27 4.539)"/><path class="a"
                                                                                     d="M9.856,7.477H9.269V6.89H8.1v.587H7.509a.593.593,0,0,0-.587.587V9.836a.593.593,0,0,0,.587.587h1.76v.587H6.91V11.6a.593.593,0,0,0,.587.587h.587v.587H9.256v-.587h.587a.593.593,0,0,0,.587-.587V9.836a.593.593,0,0,0-.587-.587H8.1v-.6h2.346V8.063A.593.593,0,0,0,9.856,7.477Z"
                                                                                     transform="translate(3.314 3.414)"/></g></svg>
                            </span>
                            <h4 class="card-title my-3">{{ __('Young and Dynamic Team') }}</h4>
                            <p class="card-text">{{ __('Our team is young and active. We understand the contemporary needs of the homeowner, and the ins and outs of the market and will serve you with enthusiasm.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="service col-md-6 col-xl-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="icon-border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40.305"><defs></defs><g
                                        transform="translate(0 -0.003)"><path class="a"
                                                                              d="M1.342,40.308H5.383a1.339,1.339,0,0,0,1.342-1.342V37.624h15.2a18.013,18.013,0,0,0,17.74-14.881l.292-1.649a2.529,2.529,0,0,0-2.042-2.932,2.493,2.493,0,0,0-1.59.233V15.419H37a.679.679,0,0,0,.671-.671.739.739,0,0,0-.19-.481L32.081,8.9a.669.669,0,0,0-.948,0l-1.546,1.546V1.312A.679.679,0,0,0,28.916.64H22.19a.679.679,0,0,0-.671.671v7.4H18.791a11.145,11.145,0,0,0-1.2-2.159L19.3,2.391A1.153,1.153,0,0,0,18.674.874,1.167,1.167,0,0,0,17.711.9l-1.269.642L15.64.48A1.165,1.165,0,0,0,14.006.247c-.058.015-.088.058-.131.088L12.853,1.355l-.671-.89A1.18,1.18,0,0,0,10.548.232c-.044.029-.088.073-.131.1l-1.284,1.3-1.94-.554a1.161,1.161,0,0,0-1.444.8,1.145,1.145,0,0,0,.1.875L7.878,6.505c-1.43,1.284-3.166,4.917-3.166,8.214v2.057a4.05,4.05,0,0,0,4.041,4.041H34.562l-1.415,2.845-3.706,1.59a3.344,3.344,0,0,0-3.21-2.407H16.544a18.652,18.652,0,0,0-9.818,2.787V24.187a1.339,1.339,0,0,0-1.342-1.342H1.342A1.317,1.317,0,0,0,0,24.173V38.966A1.339,1.339,0,0,0,1.342,40.308ZM8.856,2.96a1.163,1.163,0,0,0,1.138-.292l1.225-1.225.686.89a1.18,1.18,0,0,0,1.634.233.834.834,0,0,1,.117-.1l1.021-1.021.773,1.021a1.175,1.175,0,0,0,1.459.35l.977-.5L16.369,6.024H14.531L15.392,4.3l-1.2-.6-1.167,2.32H11.861l-.948-1.955L9.7,4.652l.657,1.371H9.147L7.236,2.493Zm6.609,6.419V19.46H8.739a2.687,2.687,0,0,1-2.684-2.684V14.719c0-3.6,2.232-6.959,2.859-7.353h7.616A7.269,7.269,0,0,1,17.3,8.708H16.136A.679.679,0,0,0,15.464,9.379Zm1.342.671h4.712v9.41H16.807Zm14.793.277,3.749,3.749H27.836ZM22.861,1.983h5.383v9.8L25.75,14.281a.669.669,0,0,0,0,.948.649.649,0,0,0,.481.19H26.9V19.46H22.861Zm5.383,13.451H34.97v4.041H33.628v-2.7a.679.679,0,0,0-.671-.671H30.272a.679.679,0,0,0-.671.671V19.46H28.259V15.434Zm4.041,4.027H30.929V17.447h1.342V19.46ZM16.544,24.173h9.687a2.013,2.013,0,1,1,0,4.027H15.464v1.342H26.231a3.337,3.337,0,0,0,3.312-2.9L33.89,24.8a.653.653,0,0,0,.336-.321L36.4,20.132a1.186,1.186,0,0,1,1.59-.525,1.2,1.2,0,0,1,.642,1.269l-.292,1.649A16.654,16.654,0,0,1,21.927,36.282H6.726v-9.06A17.356,17.356,0,0,1,16.544,24.173Zm-15.2,0H5.383V38.966H1.342Z"
                                                                              transform="translate(0 0)"/><path
                                            class="a" d="M1.84,17.95H3.013v1.76H1.84Z"
                                            transform="translate(0.506 8.409)"/><path class="a"
                                                                                      d="M16.59,2.28h.587V3.453H16.59Z"
                                                                                      transform="translate(7.665 0.626)"/><path
                                            class="a" d="M17.98,2.28h.587V3.453H17.98Z"
                                            transform="translate(8.308 0.626)"/><path class="a"
                                                                                      d="M16.59,5.97h.587V7.143H16.59Z"
                                                                                      transform="translate(7.665 2.776)"/><path
                                            class="a" d="M17.98,5.97h.587V7.143H17.98Z"
                                            transform="translate(8.308 2.776)"/><path class="a"
                                                                                      d="M12.19,7.92h.587V9.093H12.19Z"
                                                                                      transform="translate(5.632 3.683)"/><path
                                            class="a" d="M13.57,7.92h.587V9.093H13.57Z"
                                            transform="translate(6.27 3.683)"/><path class="a"
                                                                                     d="M12.19,9.76h.587v1.173H12.19Z"
                                                                                     transform="translate(5.632 4.539)"/><path
                                            class="a" d="M13.57,9.76h.587v1.173H13.57Z"
                                            transform="translate(6.27 4.539)"/><path class="a"
                                                                                     d="M9.856,7.477H9.269V6.89H8.1v.587H7.509a.593.593,0,0,0-.587.587V9.836a.593.593,0,0,0,.587.587h1.76v.587H6.91V11.6a.593.593,0,0,0,.587.587h.587v.587H9.256v-.587h.587a.593.593,0,0,0,.587-.587V9.836a.593.593,0,0,0-.587-.587H8.1v-.6h2.346V8.063A.593.593,0,0,0,9.856,7.477Z"
                                                                                     transform="translate(3.314 3.414)"/></g></svg>
                            </span>
                            <h4 class="card-title my-3">{{ __('10 Years of Experience') }}</h4>
                            <p class="card-text">{{ __('Our Real Estate Consultants have a deep and extensive knowledge of the Real Estate market in Turkey, with experience exceeding 10 years in the field.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="service col-md-6 col-xl-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="icon-border">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40.305"><defs></defs><g
                                        transform="translate(0 -0.003)"><path class="a"
                                                                              d="M1.342,40.308H5.383a1.339,1.339,0,0,0,1.342-1.342V37.624h15.2a18.013,18.013,0,0,0,17.74-14.881l.292-1.649a2.529,2.529,0,0,0-2.042-2.932,2.493,2.493,0,0,0-1.59.233V15.419H37a.679.679,0,0,0,.671-.671.739.739,0,0,0-.19-.481L32.081,8.9a.669.669,0,0,0-.948,0l-1.546,1.546V1.312A.679.679,0,0,0,28.916.64H22.19a.679.679,0,0,0-.671.671v7.4H18.791a11.145,11.145,0,0,0-1.2-2.159L19.3,2.391A1.153,1.153,0,0,0,18.674.874,1.167,1.167,0,0,0,17.711.9l-1.269.642L15.64.48A1.165,1.165,0,0,0,14.006.247c-.058.015-.088.058-.131.088L12.853,1.355l-.671-.89A1.18,1.18,0,0,0,10.548.232c-.044.029-.088.073-.131.1l-1.284,1.3-1.94-.554a1.161,1.161,0,0,0-1.444.8,1.145,1.145,0,0,0,.1.875L7.878,6.505c-1.43,1.284-3.166,4.917-3.166,8.214v2.057a4.05,4.05,0,0,0,4.041,4.041H34.562l-1.415,2.845-3.706,1.59a3.344,3.344,0,0,0-3.21-2.407H16.544a18.652,18.652,0,0,0-9.818,2.787V24.187a1.339,1.339,0,0,0-1.342-1.342H1.342A1.317,1.317,0,0,0,0,24.173V38.966A1.339,1.339,0,0,0,1.342,40.308ZM8.856,2.96a1.163,1.163,0,0,0,1.138-.292l1.225-1.225.686.89a1.18,1.18,0,0,0,1.634.233.834.834,0,0,1,.117-.1l1.021-1.021.773,1.021a1.175,1.175,0,0,0,1.459.35l.977-.5L16.369,6.024H14.531L15.392,4.3l-1.2-.6-1.167,2.32H11.861l-.948-1.955L9.7,4.652l.657,1.371H9.147L7.236,2.493Zm6.609,6.419V19.46H8.739a2.687,2.687,0,0,1-2.684-2.684V14.719c0-3.6,2.232-6.959,2.859-7.353h7.616A7.269,7.269,0,0,1,17.3,8.708H16.136A.679.679,0,0,0,15.464,9.379Zm1.342.671h4.712v9.41H16.807Zm14.793.277,3.749,3.749H27.836ZM22.861,1.983h5.383v9.8L25.75,14.281a.669.669,0,0,0,0,.948.649.649,0,0,0,.481.19H26.9V19.46H22.861Zm5.383,13.451H34.97v4.041H33.628v-2.7a.679.679,0,0,0-.671-.671H30.272a.679.679,0,0,0-.671.671V19.46H28.259V15.434Zm4.041,4.027H30.929V17.447h1.342V19.46ZM16.544,24.173h9.687a2.013,2.013,0,1,1,0,4.027H15.464v1.342H26.231a3.337,3.337,0,0,0,3.312-2.9L33.89,24.8a.653.653,0,0,0,.336-.321L36.4,20.132a1.186,1.186,0,0,1,1.59-.525,1.2,1.2,0,0,1,.642,1.269l-.292,1.649A16.654,16.654,0,0,1,21.927,36.282H6.726v-9.06A17.356,17.356,0,0,1,16.544,24.173Zm-15.2,0H5.383V38.966H1.342Z"
                                                                              transform="translate(0 0)"/><path
                                            class="a" d="M1.84,17.95H3.013v1.76H1.84Z"
                                            transform="translate(0.506 8.409)"/><path class="a"
                                                                                      d="M16.59,2.28h.587V3.453H16.59Z"
                                                                                      transform="translate(7.665 0.626)"/><path
                                            class="a" d="M17.98,2.28h.587V3.453H17.98Z"
                                            transform="translate(8.308 0.626)"/><path class="a"
                                                                                      d="M16.59,5.97h.587V7.143H16.59Z"
                                                                                      transform="translate(7.665 2.776)"/><path
                                            class="a" d="M17.98,5.97h.587V7.143H17.98Z"
                                            transform="translate(8.308 2.776)"/><path class="a"
                                                                                      d="M12.19,7.92h.587V9.093H12.19Z"
                                                                                      transform="translate(5.632 3.683)"/><path
                                            class="a" d="M13.57,7.92h.587V9.093H13.57Z"
                                            transform="translate(6.27 3.683)"/><path class="a"
                                                                                     d="M12.19,9.76h.587v1.173H12.19Z"
                                                                                     transform="translate(5.632 4.539)"/><path
                                            class="a" d="M13.57,9.76h.587v1.173H13.57Z"
                                            transform="translate(6.27 4.539)"/><path class="a"
                                                                                     d="M9.856,7.477H9.269V6.89H8.1v.587H7.509a.593.593,0,0,0-.587.587V9.836a.593.593,0,0,0,.587.587h1.76v.587H6.91V11.6a.593.593,0,0,0,.587.587h.587v.587H9.256v-.587h.587a.593.593,0,0,0,.587-.587V9.836a.593.593,0,0,0-.587-.587H8.1v-.6h2.346V8.063A.593.593,0,0,0,9.856,7.477Z"
                                                                                     transform="translate(3.314 3.414)"/></g></svg>
                            </span>
                            <h4 class="card-title my-3">{{ __('Extensive Portfolio') }}</h4>
                            <p class="card-text">{{ __('We have a wide-ranging portfolio of the best Real Estate the market in Turkey has to offer, from lavish villas and apartments, to exceptional offices and commercial units. Whatever you need, Turkey Advisors will deliver!') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section citizenship-section section-height-4"
             style="background-image: url({{ asset('sites/img/citizenship-bg.jpeg') }})">
        <div class="container">
            <div class="row align-items-center gx-5">
                <div class="col-lg-8 col-xl-6">
                    <h3 class="section-title text-red mb-0">Turkish Citizenship</h3>
                    <span class="section-sub-title text-6 text-light d-block mb-4">By Investment Programme</span>
                    <p class="text-light">You can apply for Turkish citizenship by speculation whenever you have put at
                        least $250,000 in private or business property in Turkey. Your companion and your childern
                        younger than 18 will likewise be qualified for Turkish identity. Kindly get in touch with us for
                        furthur subtleties, legitimate guidance and a rundown of properties in Turkey that are
                        pre-endorsed for the citizenship by venture program.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section testimonials-section my-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10">
                    <h3>{{ __('messages.our_clients_what_they_said') }}</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10">
                    <div class="owl-carousel owl-theme testimonials mt-3">
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial p-1 testimonial-style-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="testimonial-author">
                                            <img src="{{ pageImage($testimonial->photo_file) }}"
                                                 class="img-fluid rounded-circle"
                                                 alt="">
                                            <p>
                                                <strong
                                                    class="font-weight-extra-bold">{{ $testimonial->name ?? '' }}</strong>
                                                <span>{{ $testimonial->title ?? '' }}</span>
                                            </p>
                                        </div>
                                        <blockquote>
                                            <p class="mb-0 line-height-5">{!! $testimonial->details ?? ''  !!}</p>
                                        </blockquote>
                                        <div class="testimonial-arrow-down"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
