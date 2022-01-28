@extends('layouts.simple')

@section('title')
    {{ __('messages.thankYou') }}
@endsection

@section('stylesheets')

@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')

    <div class="container mt-5 pt-5 text-center">
        <img src="" class="img-lg d-none d-lg-inline-block"/>
        <img src="" class="d-inline-block d-lg-none w-100"/>
        <div class="my-5 py-5 text-center">
            <h3 class="text-2xl">{{ __('Thank you') }}</h3>
            <p class="lead">{!! __('Your message has been sent successfully, we will get in touch with you as soon as possible') !!}</p>
            <a class="btn btn-lg btn-secondary" href="{{ route('home') }}"><i class="fa fa-caret-right me-3"></i> {{ __('messages.return_to_homepage') }}
            </a>
        </div>
    </div>

@endsection
