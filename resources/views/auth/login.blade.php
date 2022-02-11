@extends('layouts.simple')

@section('content')
    <div class="section section-height-1 border-0 mb-0 pt-5">
        <div class="row justify-content-around">
            <div class="col-lg-5">
                @if($errors->any())
                    <div class="success-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="featured-box featured-box-primary featured-box-effect-1 mt-5">
                    <div class="box-content box-content-border-0 p-5">
                        <h2 class="text-uppercase text-6 text-sm-7 text-lg-6 text-xxl-7">{{ __('messages.login') }}</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input
                                    type="email"
                                    class="form-control form-control-lg {{ $errors->has('email') ? 'error' : '' }}"
                                    name="email"
                                    placeholder="{{ __('messages.your_email') }}" required>
                                @if ($errors->has('email'))
                                    <div class="error">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input
                                    type="password"
                                    class="form-control form-control-lg {{ $errors->has('password') ? 'error' : '' }}"
                                    name="password"
                                    placeholder="{{ __('messages.password') }}" required>
                                @if ($errors->has('password'))
                                    <div class="error">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3" style="text-align: left!important;">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary text-secondary w-100 btn-lg px-5">{{ __('messages.login') }}
                                    <span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                            </div>
                            <div class="row">
                                <div class="flex items-center justify-end mt-4 col">
                                    <a href="{{ url('auth/facebook') }}"
                                       class="btn btn-outline-primary btn-sm px-5">
                                        <i class="fab fa-facebook-f fa-fw"></i>
                                        Login with Facebook
                                    </a>
                                </div>

                                <div class="flex items-center justify-end mt-4 col">
                                    <a href="{{ url('auth/google') }}"
                                       class="btn btn-outline-primary btn-sm px-5">
                                        <i class="fab fa-google"></i>
                                        Login with Google
                                    </a>
                                </div>
                            </div>

                            <div class="row mt-2 mb-2">
                                <div class="col-6 text-left">
                                    <a href="{{ route('password.request') }}"
                                       style="background-color: rgb(255, 255, 255);"><b><u>{{ __('messages.reset') }}</u></b></a>
                                </div>
                                <div class="col-6 text-left">
                                    <a href="{{ route('register') }}"
                                       style="background-color: rgb(255, 255, 255);"><b><u>{{ __('messages.register') }}</u></b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
