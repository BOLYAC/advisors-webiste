@extends('layouts.simple')

@section('title')
    {{ __('messages.page_not_found') }}
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('sites/css/error404.css') }}">
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')

    <div class="container mt-5 pt-5 text-center">
        <img src="{{ asset('sites/img/404.svg') }}" alt="404" class="img-lg d-none d-lg-inline-block"/>
        <img src="{{ asset('sites/img/404-mobile.svg') }}" alt="404" class="d-inline-block d-lg-none w-100"/>
        <div class="my-5 py-5 text-center">
            <h3>{{ __('messages.sorry_page_not_found') }}</h3>
            <p>{!! __('messages.link_broken') !!}</p>
            <a href="{{ route('home') }}"><i class="fa fa-caret-right me-3"></i> {{ __('messages.return_to_homepage') }}
            </a>
        </div>
    </div>

@endsection
