@extends('layouts.app')
@section('title')
    {{ __('messages.FAQs') }} | Turkey Advisors
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
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5" style="background-image: url({{ asset('img/background.jpg') }});">
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
                    <h2>Most Popular Questions</h2>
                </div>
            </div>
            <div class="row justify-content-around accordion without-bg" id="faq">
                <div class="col-lg-6 col-xl-5">
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#faq1" href="#faq1" aria-expanded="true">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq1" class="collapse show">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq2" href="#faq2" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq2" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq3" href="#faq3" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq3" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq4" href="#faq4" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq4" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq5" href="#faq5" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq5" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-target="#faq6" href="#faq6" aria-expanded="true">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq6" class="collapse show" style="">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien. Praesent id enim sit amet odio vulputate eleifend in in tortor. Donec tellus massa, tristique sit amet condim vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq7" href="#faq2" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq7" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq8" href="#faq8" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq8" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq9" href="#faq9" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq9" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            <h4 class="card-title m-0">
                                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#faq10" href="#faq10" aria-expanded="false">
                                    We Build Possibilities.
                                </a>
                            </h4>
                        </div>
                        <div id="faq10" class="collapse">
                            <div class="card-body">
                                <p class="mb-0">Donec tellus massa, tristique sit amet condimentum vel, facilisis quis sapien.</p>
                            </div>
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
