@extends('layouts.simple')

@section('content')
    <div class="section section-height-1 border-0 mb-0 pt-5">
        <div class="row justify-content-around">
            <div class="col-lg-4">
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
                        <h2 class="text-uppercase text-6 text-sm-7 text-lg-6 text-xxl-7">{{ __('messages.registration') }}</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <input id="name" type="text"
                                       class="form-control form-control-lg @error('name') error @enderror"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="{{ __('messages.your_name') }}"
                                       required autocomplete="name" autofocus>
                                @error('name')
                                <span class="error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input
                                    type="email"
                                    class="form-control form-control-lg {{ $errors->has('email') ? 'error' : '' }}"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="{{ __('messages.your_email') }}" required>
                                @if ($errors->has('email'))
                                    <div class="error">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3" style="text-align: left!important;">
                                <input type="text" name="phone"
                                       class="phone-input form-control form-control-lg {{ $errors->has('phone') ? 'error' : '' }}"
                                       placeholder="{{ __('messages.your_phone_number') }}" required>
                                @if ($errors->has('phone'))
                                    <div class="error">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input id="password" type="password"
                                       class="form-control form-control-lg @error('password') error @enderror"
                                       name="password"
                                       placeholder="{{ __('messages.your_password') }}"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <input id="password-confirm"
                                       type="password" class="form-control form-control-lg"
                                       name="password_confirmation"
                                       placeholder="{{ __('messages.confirm_your_password') }}"
                                       required
                                       autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary text-secondary w-100 btn-lg px-5">{{ __('messages.submit') }}
                                    <span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
