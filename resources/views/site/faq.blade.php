@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/faq.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/faq.css') }}">
    @endif
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
                    <h1 class="mt-3 text-uppercase">{{ __('messages.FAQs') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.FAQs') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>{{ __('messages.most_popular_questions') }}</h2>
                </div>
            </div>
            <div class="row justify-content-around accordion without-bg" id="faq">
                @foreach($faqQuestions->chunk(2) as $row)
                    @foreach($row as $i => $value)
                        <div class="col-lg-5 col-xl-5">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <a class="accordion-toggle collapsed" data-bs-toggle="collapse"
                                           data-bs-target="#faq{{$i}}" href="#faq{{$i}}"
                                           aria-expanded="false">{{ $value->title ?? '' }}</a></h4>
                                </div>
                                <div id="faq{{$i}}" class="collapse">
                                    <div class="card-body"><p class="mb-0">{!! $value->details !!}</p></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>
    <section class="section wwa-section border-0 mt-5 py-4" style="background-image: url({{ asset('sites/img/wwa.jpg') }});">
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
