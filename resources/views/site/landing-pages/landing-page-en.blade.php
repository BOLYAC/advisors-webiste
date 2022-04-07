@extends('layouts.simple')
@section('title')
    {{ __('messages.about_us') }} | Turkey Advisors
@endsection
@section('stylesheets')
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/landingPage.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/landingPage.css') }}">
    @endif

@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <div class="landing-page"
         style="background-image: url({{ asset('sites/img/landing-page/landing-page-background.jpg') }}">
        <section class="banner-section py-0">
            <img class="banner-background" src="{{ asset('sites/img/landing-page/banner.png') }}" alt="">
            <div class="banner-content d-flex align-items-center">
                <div class="container d-flex align-items-center justify-content-center justify-content-lg-start">
                    <img src="{{ asset('sites/img/landing-page/passport.png') }}" alt="Citizenship By Investment"
                         class="d-inline-flex banner-image">
                    <div class="banner-text d-inline-flex">Citizenship<br/>By Investment</div>
                </div>
            </div>
        </section>
        <section class="statistics-section py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9 col-md-12">
                        <div class="row gx-5">
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/infrastructures.png') }}"
                                                 alt="infrastructures">
                                        </div>
                                        <div class="stat-text text-center">
                                            Turkey Has<br/>
                                            Developed Infrastructure
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/health-care.png') }}"
                                                 alt="health care">
                                        </div>
                                        <div class="stat-text text-center">
                                            Turkey Has <br/>
                                            Excellent Health Care
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/investment.png') }}"
                                                 alt="investment">
                                        </div>
                                        <div class="stat-text text-center">
                                            Turkey has The Most Substantial<br/>
                                            Increasing Investment Value
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/robust-economy.png') }}"
                                                 alt="robust economy">
                                        </div>
                                        <div class="stat-text text-center">
                                            Turkey Has <br/>
                                            A Robust Economy
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/taxation-system.png') }}"
                                                 alt="Taxation System">
                                        </div>
                                        <div class="stat-text text-center">
                                            Turkey Has<br/>
                                            A Taxation System Works For You
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4 mb-lg-5">
                                <div class="stat">
                                    <img src="{{ asset('sites/img/landing-page/statistic-background.png') }}"
                                         alt="statistic"
                                         class="stat-background">
                                    <div class="stat-content">
                                        <div class="stat-image">
                                            <img src="{{ asset('sites/img/landing-page/international-capital.png') }}"
                                                 alt="International Capital">
                                        </div>
                                        <div class="stat-text text-center">
                                            Turkish Market Has Attracted<br/>
                                            The Enormous International Capital
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11 col-xl-10 col-xxl-9">
                        <h2 class="mt-5">Statistics about the properties sold in February 2022</h2>
                        <ul>
                            <li class="mb-3">Real Estate Properties Sales To Foreign Investors Grew By 77.1%, With 7,841
                                Sales Compared To February 2021
                            </li>
                            <li class="mb-3">Iranian investors are the top investors with 1,462 sales, Iraqi citizens
                                were in the second rank with 1,039 sales, Russians were third with 885 closed deals.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="section statistics2-section"
                 style="background-image: url({{ asset('sites/img/landing-page/statistics2-background.jpg') }})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="stat text-center">
                            <img src="{{ asset('sites/img/landing-page/stat1.png') }}" alt="" class="mb-3">
                            <h4>7.841 Units Sold To Foreign<br/>Investors In February</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="stat text-center">
                            <img src="{{ asset('sites/img/landing-page/stat2.png') }}" alt="" class="mb-3">
                            <h4>77.1% Increase In The Number<br/>Sold Units Compared To February 2021</h4>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <div class="stat text-center">
                            <img src="{{ asset('sites/img/landing-page/stat3.png') }}" alt="" class="mb-3">
                            <h4>226.503 Total Sold<br/>Properties In February 2022</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section contact-section section-height-3">
            <div class="container">
                <p class="mb-5">
                    The granting law Turkish citizenship to foreign investors by owning a property with a value of
                    $250,000 will gradually be modified, it is expected that the investment value will be expanded and
                    transformed until then don't miss the opportunity to be concentrated in the best land in the world
                </p>
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-6 text-center">
                        <a href="#" class="btn btn-gradient px-4 px-sm-5 py-2 py-sm-3 fw-bold">
                            Join The Club Of The Elite Today
                        </a>
                    </div>
                </div>
                <h4 class="text-center fw-bold mb-5">
                    USE THE PRIVILEGE OF FREE<br/>CONSULTATIONS AND VIRTUAL TOUR
                </h4>
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center">
                        <div class="card card-rounded">
                            <div class="card-body shadow-lg">
                                <h2 class="mb-5">Send Us An Email</h2>
                                <form action="{{ route('submit.contact') }}" method="POST">
                                    @csrf
                                    <input name="url_link" type="hidden" value="{{ url()->full()}}">
                                    <div class="form-group mb-5">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg {{ $errors->has('name') ? 'error' : '' }}"
                                            name="name"
                                            placeholder="{{ __('messages.your_name') }}" required>
                                        @if ($errors->has('name'))
                                            <div class="error">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <input type="email"
                                               class="form-control form-control-lg {{ $errors->has('email') ? 'error' : '' }}"
                                               name="email"
                                               placeholder="{{ __('messages.your_email') }}" required>
                                        @if ($errors->has('email'))
                                            <div class="error">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <input
                                            type="text"
                                            class="phone-input form-control form-control-lg {{ $errors->has('phone') ? 'error' : '' }}"
                                            name="phone"
                                            placeholder="{{ __('messages.your_phone_number') }}" required>
                                        @if ($errors->has('phone'))
                                            <div class="error">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-5">
                                        <textarea class="form-control form-control-lg" rows="3"
                                                  name="message"
                                                  placeholder="{{ __('messages.your_message') }}"></textarea>
                                    </div>
                                    <div class="form-group pt-4 pt-xs-5">
                                        <button type="submit"
                                                class="btn btn-gradient px-5 py-2">{{ __('messages.request_for_details') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section projects-section section-height-2">
            <div class="container">
                <h2 class="text-uppercase">Recommended<br/>projects</h2>
                <div class="projects">
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">1</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-1-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-1-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-1-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">Starts From</div>
                            <div class="price text-secondary text-center">$500.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <a href="#"><span class="d-block text-light mb-1 mb-sm-2">For More Information</span></a>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta124"
                            >Inquire Now</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Zeytinburnu
                            </div>
                        </div>
                    </div>
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">2</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-2-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-2-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-2-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">Starts From</div>
                            <div class="price text-secondary text-center">$582.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <span class="d-block text-light mb-1 mb-sm-2">For More Information</span>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta127"
                            >Inquire Now</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Sariyer
                            </div>
                        </div>
                    </div>
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">3</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-3-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-3-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-3-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">Starts From</div>
                            <div class="price text-secondary text-center">$479.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <span class="d-block text-light mb-1 mb-sm-2">For More Information</span>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta121"
                            >Inquire Now</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Şişli
                            </div>
                        </div>
                    </div>
                    <div class="project pt-3 pb-4 p-3 p-md-5">
                        <img src="{{ asset('sites/img/landing-page/project-corner.png') }}" alt=""
                             class="project-corner">
                        <div class="project-number">4</div>
                        <div
                            class="row gx-1 gx-lg-2 p-2 p-sm-3 p-md-0 p-lg-3 p-xl-4 p-xxl-5 mb-2 mb-sm-0 mb-md-4 mb-lg-3">
                            <div class="col-7">
                                <img src="{{ asset('sites/img/landing-page/project-4-1.jpg') }}" alt=""
                                     class="project-image h-100 w-100">
                            </div>
                            <div class="col-5">
                                <img src="{{ asset('sites/img/landing-page/project-4-2.jpg') }}" alt=""
                                     class="mb-1 mb-lg-2 project-image w-100">
                                <img src="{{ asset('sites/img/landing-page/project-4-3.jpg') }}" alt=""
                                     class="project-image w-100">
                            </div>
                        </div>
                        <div class="price-container text-center mb-3 mb-lg-4">
                            <div class="starts-from">Starts From</div>
                            <div class="price text-secondary text-center">$184.000</div>
                        </div>
                        <div class="project-footer text-center">
                            <span class="d-block text-light mb-1 mb-sm-2">For More Information</span>
                            <a class="btn btn-gradient px-3 px-sm-4 px-md-5 py-0 py-sm-1 py-md-2"
                               data-bs-toggle="modal" data-bs-target="#inquiry-project" data-bs-container="body"
                               data-bs-trigger="hover focus" data-bs-placement="right" data-bs-content="Right popover"
                               data-id="https://www.turkeyadvisors.com/projects/ta09"
                            >Inquire Now</a>
                            <div class="project-city d-flex align-items-center">
                                <img src="{{ asset('sites/img/landing-page/project-city.png') }}" alt=""
                                     class="me-1 me-sm-2 me-xl-3"> Bomonti
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section footer-section py-5"
                 style="background-image: url({{ asset('sites/img/landing-page/statistics2-background.jpg') }})">
            <div class="container text-center text-lg-left">
                <div class="row justify-content-between d-inline-block d-lg-flex">
                    <div class="col-lg-auto footer-contact align-items-center mb-3 mb-lg-0">
                        <img src="{{ asset('sites/img/landing-page/phone.png') }}" alt="" class="me-2 me-lg-3"> <a
                            href="tel:+905530124846">+90 553 012 48 46</a>
                    </div>
                    <div class="col-lg-auto footer-contact text-light align-items-center mb-3 mb-lg-0">
                        <img src="{{ asset('sites/img/landing-page/email.png') }}" alt="" class="me-2 me-lg-3"> <a
                            href="mailto:info@turkeyadvisors.com">info@turkeyadvisors.com</a>
                    </div>
                    <div class="col-lg-auto footer-contact text-light align-items-center mb-3 mb-lg-0">
                        <img src="{{ asset('sites/img/landing-page/cursor.png') }}" alt="" class="me-2 me-lg-3"> <a
                            href="https://www.turkeyadvisors.com">www.turkeyadvisors.com</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
