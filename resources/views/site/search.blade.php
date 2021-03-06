@extends('layouts.simple')
@section('title')
    {{ __('messages.search') }} | Turkey Advisors
@endsection
@section('stylesheets')
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/search.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/search.css') }}">
    @endif
@endsection

@section('javascripts')
    <script src="{{ asset('sites/js/search.js') }}" type="text/javascript"></script>
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
                    <h1 class="mt-3 text-uppercase">{{ __('messages.search') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.search') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5 mb-4">
        <div class="row filter-button-group justify-content-md-center">
            <div class="col-md-auto text-center">
                <a class="btn active mb-2" data-filter="*">{{ __('messages.ALL') }}</a>
                <a class="btn mb-2" data-filter="articles">{{ __('messages.articles') }}</a>
                <a class="btn mb-2" data-filter="projects">{{ __('messages.projects') }}</a>
            </div>
        </div>
    </div>
    <div class="container mb-5 search-bar">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <form action="{{ route('searchFull') }}" method="post">
                    @csrf
                    <div class="input-group input-group-lg">
                        <div class="input-group-text bg-transparent border-end-0"><i class="fa fa-search"></i></div>
                        <input class="form-control form-control-lg py-2 border-start-0" type="search" id="search-input"
                               name="search_input">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="grid row">
            <div class="grid-sizer col-12"></div>
            <div class="grid-item col-12 articles mb-5">
                <h3 class="mb-4">{{ __('messages.articles') }}</h3>
                <div class="row">
                    @forelse($postResult as $post)
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="article card border-radius-0">
                                <a href="{{ route('post.details', $post->seo_url_slug ?? $post->translate('en')->seo_url_slug) }}">
                                    <div class="card-top ratio ratio-16x9">
                                        <img class="card-img-top" src="{{ pageImage($post->photo_file) }}"
                                             alt="Project">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <div class="article-date"><i
                                            class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($post->date)->format('d M Y')}}
                                    </div>
                                    <div class="article-views"><i class="fa fa-eye me-1"></i>
                                        {{ $post->visits }} {{ __('messages.views') }}</div>
                                    <div class="card-title">
                                        <h4 class="mb-0 text-5 text-sm-6 text-lg-5 font-weight-bold">{{ $post->title }}</h4>
                                    </div>
                                    <div class="card-text row align-items-end">
                                        <div class="col-10">
                                            <p class="text-2">{{ \Str::limit(strip_tags($post->details) , 90, $end='...') }}</p>
                                        </div>
                                        <div class="col-2 read-more text-end">
                                            <a href="#"><span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="grid-item col-12 projects">
                <h3 class="mb-4">{{ __('messages.projects') }}</h3>
                <div class="row mt-3 gx-3 gx-lg-4 gx-xl-3 gx-xxl-4">
                    @forelse($projectResult as $project)
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="project card">
                                <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug) }}"
                                >
                                    <div class="ratio ratio-16x9">
                                        <img class="card-img-top" src="{{ pageImage($project->photo_file) }}"
                                             alt="Project">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <div class="card-infos">
                                        <h4 class="card-title mb-4 text-6 text-sm-7 text-lg-6 text-xl-6 text-xxl-7 font-weight-bold">{{ __('messages.project_no') }} {{ $project->title  }}</h4>
                                        <div class="row features mb-3 gx-2 gx-sm-3 gx-xl-2 gx-xxl-3">
                                            <div class="col-auto text-3">

                                                <img class="feature-icon me-1"
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
                                                    {{  __('K??br??s') }}
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
                                                                              alt="hand"/> {{ $project->payment_type === 1 ? __('Cash') : __('Installment') }}
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
                                        <p class="card-text text-4 mb-2">{!! \Str::limit($project->details , 180, $end='...') !!}</p>
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
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
