<div class="side-fixed d-none d-lg-block">
    <div class="open">
        <i class="far fa-comment-dots btn-blink" aria-hidden="true"></i>
        <ul class="ml-1">
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="{{ config('settings.phone_number_2') }}">
                <a href="tel://{{ config('settings.phone_number_2') }}" target="_blank"
                   rel="nofollow noreferrer"
                   data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right"
                   data-bs-content="Right popover">
                    <i class="far fa-phone" aria-hidden="true"></i>
                </a>
            </li>
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Request Call">
                <button data-bs-toggle="modal" data-bs-target="#contactModal" data-bs-container="body"
                        data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover">
                    <i class="far fa-edit" aria-hidden="true"></i>
                </button>
            </li>
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Messenger Chat">
                <a href="https://www.messenger.com/t/108140434291027" target="_blank" rel="noreferrer">
                    <i class="fab fa-facebook-messenger" aria-hidden="true"></i>
                </a>
            </li>
            <li data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="00905530124846">
                <a href="https://api.whatsapp.com/send/?phone=00905530124846&text&app_absent=0" target="_blank"
                   rel="nofollow noreferrer"
                   data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right"
                   data-bs-content="Right popover">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="modal contact-modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-uppercase my-0 py-0">{{ __('messages.send_us_an_email') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <form action="{{ route('submit.contact') }}" method="POST">
                    @csrf
                    <input name="url_link" type="hidden" value="{{ url()->full()}}">
                    <div class="form-group">
                        <input
                            type="text" name="name"
                            class="form-control form-control-lg {{ $errors->has('name') ? 'error' : '' }}"
                            placeholder="{{ __('messages.your_name') }}">
                        @if ($errors->has('name'))
                            <div class="error">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input
                            type="email" name="email"
                            class="form-control form-control-lg {{ $errors->has('email') ? 'error' : '' }}"
                            placeholder="{{ __('messages.your_email') }}">
                        @if ($errors->has('email'))
                            <div class="error">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input
                            type="text" name="phone"
                            class="phone-input form-control form-control-lg  {{ $errors->has('phone') ? 'error' : '' }}"
                            placeholder="{{ __('messages.your_phone_number') }}">
                        @if ($errors->has('phone'))
                            <div class="error">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control form-control-lg" rows="3"
                                  placeholder="{{ __('messages.your_message') }}"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                                class="btn btn-primary text-secondary w-100 btn-lg px-5">{{ __('messages.request_for_details') }}
                            <span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal contact-modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-uppercase my-0 py-0">{{ __('messages.send_us_an_email') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
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
                                class="btn btn-primary text-secondary w-100 btn-lg">{{ __('messages.login') }}
                            <span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                    </div>

                    <div class="text-center">
                        <a href="{{ url('auth/facebook') }}"
                           class="btn btn-outline-primary w-100 px-5">
                            <i class="fab fa-facebook-f fa-fw"></i>
                            {{ __('messages.Login_with_facebook') }}
                        </a>
                    </div>

                    <div class="text-center mt-2 mb-2">
                        <a href="{{ url('auth/google') }}"
                           class="btn btn-outline-primary w-100 px-5">
                            <i class="fab fa-facebook-f fa-fw"></i>
                            Login with Google
                        </a>
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
<div class="modal contact-modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-uppercase my-0 py-0">{{ __('messages.send_us_an_email') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
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
                        <input type="text" name="phone" id="phone"
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
