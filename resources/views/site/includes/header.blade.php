<header id="header" class="header-effect-shrink"
        data-plugin-options="{'headerContainerHeight': 130, 'stickyEnabled': false, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 130}">
    <div class="header-body border-top-0" style="background-image: url({{ asset('sites/img/header_bg.jpg') }})">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column order-0">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                <img alt="Logo Turkey Advisors" src="{{ asset('sites/img/logo.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end order-2 order-lg-1">
                    <div class="header-row">
                        <div class="header-nav header-nav-line header-nav-bottom-line order-2 order-lg-1">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li>
                                            <a href="{{ route('home') }}">
                                                {{ __('messages.home') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about') }}">
                                                {{ __('messages.about_us') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('projects') }}">
                                                {{ __('messages.projects') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('services') }}">
                                                {{ __('messages.services') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('citizenShipPage') }}">
                                                {{ __('messages.citizenship') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('blog') }}">
                                                {{ __('messages.blog') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('articles') }}">
                                                {{ __('messages.articles') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('faqQuestion') }}">
                                                {{ __('messages.faq') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact') }}">
                                                {{ __('messages.contact_us') }}
                                            </a>
                                        </li>
                                        <li class="d-lg-none">
                                            <a href="{{ route('login') }}">
                                                {{ __('messages.login') }}
                                            </a>
                                        </li>
                                        <li class="d-lg-none">
                                            <a href="{{ route('contact') }}">
                                                {{ __('messages.register') }}
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="hamburger header-btn-collapse-nav hamburger--collapse collapsed"
                                    type="button" data-set-active="false" data-bs-toggle="collapse"
                                    data-bs-target=".header-nav-main nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <div class="header-nav-features p-0 order-1 order-lg-2 ms-4 ms-xl-5">
                            <ul class="header-extra-info">
                                <li class="m-0">
                                    <div
                                        class="feature-box feature-box-style-2 align-items-end flex-column header-nav-features-search-reveal-container">
                                        <div
                                            class="header-nav-feature header-nav-features-search header-nav-features-search-reveal align-items-center">
                                            <a href="#"
                                               class="btn btn-link text-light header-nav-features-search-show-icon d-inline-flex px-0 me-2 me-xl-3"><i
                                                    class="fas fa-search header-nav-top-icon"></i></a>
                                            <a href="#"
                                               class="btn btn-sm btn-secondary px-2 py-1 d-none d-lg-inline-flex"
                                               data-bs-toggle="modal" data-bs-target="#contactModal"
                                               data-bs-container="body"
                                               data-bs-trigger="hover focus" data-bs-placement="right"
                                               data-bs-content="Right popover"
                                            >{{ __('messages.enquire_now') }}</a>
                                        </div>
                                        <div class="d-none d-lg-flex">
                                            @guest
                                                <a href="#" class="btn btn-link text-light px-0 me-3 me-xl-4"
                                                   data-bs-toggle="modal" data-bs-target="#loginModal"
                                                   data-bs-container="body"
                                                   data-bs-trigger="hover focus" data-bs-placement="right"
                                                   data-bs-content="Right popover"
                                                >{{ __('messages.login') }}</a>
                                                <a href="#" class="btn btn-link text-light px-0"
                                                   data-bs-toggle="modal" data-bs-target="#registerModal"
                                                   data-bs-container="body"
                                                   data-bs-trigger="hover focus" data-bs-placement="right"
                                                   data-bs-content="Right popover"
                                                >{{ __('messages.register') }}</a>
                                            @else
                                                <a href="{{ route('logout') }}" class="btn btn-link text-light px-0"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                >{{ __('messages.logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="header-nav-features header-nav-features-no-border p-static">
                            <div
                                class="header-nav-feature header-nav-features-search header-nav-features-search-reveal header-nav-features-search-reveal-big-search header-nav-features-search-reveal-big-search-full">
                                <div class="container">
                                    <div class="row justify-content-center h-100 d-flex">
                                        <div class="col-lg-10 col-xl-9 h-100 d-flex">
                                            <form role="search" class="d-flex h-100 w-100"
                                                  action="{{ route('searchFull') }}" method="post" id="search">
                                                @csrf
                                                <div class="big-search-header input-group input-group-lg">
                                                    <input class="form-control form-control-lg text-1" id="headerSearch"
                                                           name="q" type="search" value=""
                                                           placeholder="Example: Appartment Istanbul Sea View...">
                                                    <button class="btn btn-lg bg-secondary text-primary px-5"
                                                            type="submit" id="button-addon2">{{ __('messages.search') }}
                                                    </button>
                                                    <a href="javascript:void(0)"
                                                       class="header-nav-features-search-hide-icon"><i
                                                            class="fas fa-times header-nav-top-icon"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="header-top" style="min-height:40px!important;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-0 mb-lg-2 mb-xl-0">
                <div class="header-row">
                    <nav class="header-nav-top flash-news">
                        <h6 class="d-inline-flex align-middle flash-news mb-0 text-4">
                            <strong>{{ __('messages.latest_news') }} : </strong></h6>
                        <div class="d-inline-flex align-middle">
                            <marquee direction="{{ App::getLocale() === 'ar' ? 'right' : 'left'}}"
                                     onmouseover="this.stop();" onmouseout="this.start();">
                                <ul class="nav nav-pills d-block" id="new-currency">
                                </ul>
                            </marquee>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-xl-6 d-none d-lg-inline-flex">
                <div class="header-row w-100">
                    <nav class="header-nav-top justify-content-center justify-content-xl-end">
                        <ul class="nav nav-pills align-items-center">
                            <li class="nav-item nav-item-left-border-remove nav-item-left-border-sm-show me-3">
                                <span class="ws-nowrap"><img src="{{ asset('sites/img/envelope.svg') }}" alt="email"
                                                             class="fa-border"/> <a
                                        href="mailto:{{ config('settings.default_email_address') }}">{{ config('settings.default_email_address') }}</a></span>
                            </li>
                            <li class="nav-item nav-item-left-border-remove nav-item-left-border-sm-show me-3">
                                <span class="ws-nowrap"><img src="{{ asset('sites/img/phone.svg') }}" alt="phone"
                                                             class="fa-border"/> <a
                                        href="tel://{{ config('settings.phone_number_2') }}">{{ config('settings.phone_number') }}</a></span>
                            </li>
                            <li class="nav-item nav-item-borders dropdown me-1">
                                <a class="btn btn-primary btn-sm" href="#" role="button" id="dropdownCurrencies"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    @switch(\Illuminate\Support\Facades\Session::get('currency'))
                                        @case('EUR')
                                        <img class="img-thumb" src="{{ asset('sites/img/currency.svg') }}"
                                             alt="currency"/>
                                        EUR
                                        @break
                                        @case('USD')
                                        <img class="img-thumbnail"
                                             src="{{ asset('sites/img/currency.svg') }}" alt="currency"/>
                                        USD
                                        @break
                                        @case('TRY')
                                        <img class="img img-fluid"
                                             src="{{ asset('sites/img/currency.svg') }}"
                                             alt="currency"/>
                                        TRY
                                        @break
                                        @case('GBP')
                                        <img class="img img-avatar-rounded"
                                             src="{{ asset('sites/img/currency.svg') }}" alt="currency"/>
                                        GBP
                                        @break
                                    @endswitch
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCurrencies">
                                    <a class="dropdown-item" href="{{ route('switch_currency', 'USD') }}">
                                        <img src="{{ asset('sites/img/flags/us.png') }}"
                                             class="flag flag-us rounded-circle" alt="USD"> USD
                                    </a>
                                    <a class="dropdown-item" href="{{ route('switch_currency', 'EUR') }}">
                                        <img src="{{ asset('sites/img/flags/eu.png') }}"
                                             class="flag flag-us rounded-circle" alt="EUR"> EUR
                                    </a>
                                    <a class="dropdown-item" href="{{ route('switch_currency', 'TRY') }}">
                                        <img src="{{ asset('sites/img/flags/tr.png') }}"
                                             class="flag flag-us rounded-circle" alt="EUR"> TRY
                                    </a>
                                    <a class="dropdown-item" href="{{ route('switch_currency', 'GBP') }}">
                                        <img src="{{ asset('sites/img/flags/gb.png') }}"
                                             class="flag flag-us rounded-circle" alt="GBP"> GBP
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item nav-item-borders dropdown">
                                <a class="btn btn-primary btn-sm" href="#" role="button" id="dropdownLanguages"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('sites/img/locale.svg') }}" alt="locale">
                                    @switch(LaravelLocalization::getCurrentLocale())
                                        @case('en')
                                        EN
                                        @break
                                        @case('ru')
                                        RU
                                        @break
                                    @endswitch
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLanguages">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a rel="alternate"
                                           hreflang="{{ $localeCode }}"
                                           class="dropdown-item text-uppercase"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
