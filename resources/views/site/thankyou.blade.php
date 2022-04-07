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
            @if(session()->has('message'))
                <h3 class="text-2xl">{{ __('Thank you') }}</h3>
                <p class="lead mb-5">{{ session()->get('message') }}</p>
            @endif
            <a class="btn btn-lg btn-secondary" href="{{ route('home') }}"><i
                    class="fa fa-caret-right me-3"></i> {{ __('messages.return_to_homepage') }}
            </a>
        </div>
    </div>

@endsection
