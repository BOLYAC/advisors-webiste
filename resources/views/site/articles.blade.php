@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/articles.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/articles.css') }}">
    @endif
@endsection

@section('javascripts')
    <script src="{{ asset('sites/js/articles.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        window.$ = window.jQuery = $;
        const hasSupport = 'loading' in HTMLImageElement.prototype;
        document.documentElement.className = hasSupport ? 'pass' : 'fail';
        document.querySelector('span').textContent = hasSupport;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5"
             style="background-image: url({{ asset('sites/img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ $topic->title }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.best_articles') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-2">
        <div class="row sidebar d-block d-xl-none">
            <div class="col-12">
                <h3 class="mb-4">{{ __('messages.search_for_something') }}</h3>
                <form action="" method="get" class="search-bar mb-5">
                    <div class="input-group">
                        <div class="input-group-text bg-transparent border-end-0"><i class="fa fa-search"></i></div>
                        <input class="form-control py-2 border-start-0" type="search" id="search-input"
                               placeholder="Search">
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 col-lg-10 col-xl-8">
                <h2 class="mb-4">All Articles About Real Estate</h2>
                <p class="lead">{!! $topic->details !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 articles mb-5 pr-xl-5">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-6 mb-4">
                            <div class="article card border-radius-0">
                                <a href="{{ route('post.detail', $post->seo_url_slug ?? $post->translate('en')->seo_url_slug) }}">
                                    <div class="ratio ratio-16x9">
                                        <img src="{{ pageImage($post->photo_file) }}" class="card-img-top"
                                             loading="lazy"
                                             alt="{{ $post->title }}">

                                    </div>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="article-date"><i
                                        class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($post->date)->format('d M Y')}}
                                </div>
                                <div class="article-views"><i
                                        class="fa fa-eye me-1"></i> {{ $post->visits }} {{ __('messages.views') }}
                                </div>
                                <div class="card-title">
                                    <h4 class="mb-0 text-5 text-sm-6 text-lg-5 font-weight-bold">{{ $post->title }}</h4>
                                </div>
                                <div class="card-text row align-items-end">
                                    <div class="col-10">
                                        <p class="text-1">{!! \Str::limit(strip_tags($post->details) , 90, $end='...') !!}</p>
                                    </div>
                                    <div class="col-2 read-more text-end">
                                        <a href="{{ route('post.details', $post->seo_url_slug ?? $post->translate('en')->seo_url_slug) }}"><span
                                                class="arrow2 is-triangle arrow-bar is-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-xl-4 sidebar">
            <div class="search d-none d-xl-block">
                <h3 class="mb-4">{{ __('messages.search_for_something') }}</h3>
                <form action="" method="get" class="search-bar mb-5">
                    <div class="input-group">
                        <div class="input-group-text bg-transparent border-end-0"><i class="fa fa-search"></i></div>
                        <input class="form-control py-2 border-start-0" type="search" id="search-input"
                               placeholder="{{ __('messages.search') }}">
                    </div>
                </form>
            </div>
            <h3 class="mb-4">{{ __('messages.special_offers') }}</h3>
            <div class="owl-carousel owl-theme projects mt-3">
                @foreach($projects as $project)
                    <div class="project card">
                        <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}">
                            <div class="ratio ratio-16x9">
                                <img class="card-img-top" src="{{ pageImage($project->photo_file) }}"
                                     alt="{{ $project->seo_title }}">
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="card-infos">
                                <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}">
                                    <h4 class="card-title mb-4 text-5 text-sm-6 text-lg-5 text-xl-6 font-weight-bold">
                                        {{ __('messages.project_no') }} {{ $project->title }}</h4>
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
                                                                      alt="hand"/> Installment
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
                                <p class="card-text text-4 mb-5">{!! \Str::limit($project->details , 150, $end='...') !!}</p>
                            </div>
                            <div class="row align-items-center justify-content-between">
                                <div
                                    class="col-auto col-sm-6 price text-primary text-6 text-xl-5 text-xxl-6 font-weight-semibold">{{ currencyConvert($project->lowest_price) }}
                                </div>
                                <div class="col-auto col-sm-6 more-details">
                                    <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}"
                                       class="btn btn-primary btn-line w-100 text-4">{{ __('messages.more_details') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <section class="section wwa-section border-0 my-5 px-3 py-4"
                     style="background-image: url({{ asset('img/wwa.jpg') }});">
                <div class="container container-lg">
                    <div class="row align-items-end justify-content-between">
                        <div class="col-12">
                                <span
                                    class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                            <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">Turkey Advisors</h2>
                            <h4 class="font-weight-extra-bold text-secondary line-height-1 text-8">{{ __('messages.some_offers') }}</h4>
                            <a class="btn btn-lg btn-secondary px-4 mt-5 py-3 w-100"
                               href="{{ route('contact') }}">{{ __('messages.get_in_touch') }} <span
                                    class="arrow1 is-triangle arrow-bar is-right"></span></a>
                        </div>
                    </div>
                </div>
            </section>
            <h3 class="mb-4">{{ __('messages.latest_articles') }}</h3>
            <div class="latest-posts articles row">
                @foreach($lastArticles as $a)
                    <div class="col-12 col-lg-6 col-xl-12">
                        <div class="mb-4 article card border-radius-0">
                            <a href="{{ route('post.details', $a->seo_url_slug ?? $a->translate('en')->seo_url_slug) }}">
                                <div class="ratio ratio-16x9">
                                    <img class="card-img-top" src="{{ pageImage($a->photo_file) }}" alt="Project">
                                </div>
                            </a>
                            <div class="card-body">
                                <div class="article-date"><i
                                        class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($a->date)->format('d M Y')}}
                                </div>
                                <div class="article-views"><i class="fa fa-eye me-1"></i>
                                    {{ $a->visits }} {{ __('messages.views') }}</div>
                                <a href="{{ route('post.details', $a->seo_url_slug ?? $a->translate('en')->seo_url_slug) }}">
                                    <div class="card-title">
                                        <div
                                            class="mb-3 text-4 card-subtitle">{{ $a->categories->first()->title ?? '' }}</div>
                                        <h4 class="mb-0 text-5 text-sm-6 text-lg-5 font-weight-bold">{{ $a->title }}</h4>
                                    </div>
                                </a>
                                <div class="card-text row align-items-end">
                                    <div class="col-10">
                                        <p class="text-4">{!! \Str::limit(strip_tags($a->details) , 100, $end='...') !!}</p>
                                    </div>
                                    <div class="col-2 read-more text-end">
                                        <a href="{{ route('post.details', $a->seo_url_slug ?? $a->translate('en')->seo_url_slug) }}"><span
                                                class="arrow2 is-triangle arrow-bar is-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
