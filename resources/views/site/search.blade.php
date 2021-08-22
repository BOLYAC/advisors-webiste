@extends('layouts.app')
@section('title')
    {{ __('messages.search') }} | Turkey Advisors
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
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
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5" style="background-image: url({{ asset('img/background.jpg') }});">
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
                <form action="" method="get">
                    <div class="input-group input-group-lg">
                        <div class="input-group-text bg-transparent border-end-0"><i class="fa fa-search"></i></div>
                        <input class="form-control form-control-lg py-2 border-start-0" type="search" id="search-input">
                    </div>
                </form>
                <div class="mt-2">
                    <a class="badge badge-primary badge-sm text-secondary me-2">#Turkey</a>
                    <a class="badge badge-primary badge-sm text-secondary me-2">#Istanbul</a>
                    <a class="badge badge-primary badge-sm text-secondary me-2">#Projects_in_istanbul</a>
                    <a class="badge badge-primary badge-sm text-secondary me-2">#Turkey</a>
                    <a class="badge badge-primary badge-sm text-secondary me-2">#Residence_permit</a>
                    <a class="badge badge-primary badge-sm text-secondary me-2">#Living_in_urkey</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="grid row">
            <div class="grid-sizer col-12"></div>
            <div class="grid-item col-12 articles mb-5">
                <h3 class="mb-4">{{ __('messages.articles') }}</h3>
                <div class="row">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="article card border-radius-0">
                                <div class="card-top">
                                    <img class="card-img-top" src="{{ asset('img/post.png') }}" alt="Project">
                                </div>
                                <div class="card-body">
                                    <div class="article-date"><i class="fas fa-calendar-alt me-1"></i> 15 Nov 2020</div>
                                    <div class="article-views"><i class="fa fa-eye me-1"></i> 6485 {{ __('messages.views') }}</div>
                                    <div class="card-title">
                                        <div class="mb-3 text-4 card-subtitle">Istanbul new airport</div>
                                        <h4 class="mb-0 text-5 text-sm-6 text-lg-5 font-weight-bold">Istanbul new airport opening</h4>
                                    </div>
                                    <div class="card-text row align-items-end">
                                        <div class="col-10">
                                            <p class="text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <div class="col-2 read-more text-end">
                                            <a href="#"><span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="grid-item col-12 projects">
                <h3 class="mb-4">{{ __('messages.projects') }}</h3>
                <div class="row">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="project card">
                                <img class="card-img-top" src="{{ asset('img/project.png') }}" alt="Project">
                                <div class="card-body">
                                    <h4 class="card-title mb-4 text-8 font-weight-bold">Project No: TA066</h4>
                                    <div class="row features mb-3 gx-3">
                                        <div class="col-auto text-3"><img class="feature-icon me-1" src="{{ asset('img/project/map.svg') }}" alt="map"/> Istanbul</div>
                                        <div class="col-auto text-3"><img class="feature-icon me-1" src="{{ asset('img/project/hand.svg') }}" alt="hand"/> Installment</div>
                                        <div class="col-auto text-3"><img class="feature-icon me-1" src="{{ asset('img/project/hourglass.svg') }}" alt="hourglass"/> Ready</div>
                                    </div>
                                    <p class="card-text text-4 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    <div class="row align-items-center">
                                        <div class="col-6 price text-primary text-8 font-weight-semibold">30,000 $</div>
                                        <div class="col-6 more-details">
                                            <a href="/" class="btn btn-primary btn-line w-100 text-4">{{ __('messages.more_details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
