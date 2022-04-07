@extends('layouts.simple')
@section('title')
    {{ __('messages.about_us') }} | Turkey Advisors
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/landingPage2.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/landingPage2.css') }}">
    @endif
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
    <script src="{{ asset('sites/js/landing-page2.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <div class="landing-page" style="background-image: url({{ asset('sites/img/landing-page2/background.png') }}">
        <div class="container">
            <div class="row landing-page-header py-4 py-sm-5 mb-4 justify-content-between align-items-center">
                <div class="col">
                    <img src="{{ asset('sites/img/landing-page2/logo.png') }}" alt="">
                </div>
                <div class="col text-end text-2 text-md-3">
                    <div class="mb-1 mb-md-2">
                        <a href="#" class="btn btn-secondary btn-rounded px-4 py-1 text-3">Call Us Now</a>
                    </div>
                    <div>
                        <a href="#" class="text-primary text-4 font-weight-semibold">+90 552 744 06 17</a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between gx-4 gx-xl-0 gx-xxl-4">
                <div class="col-lg-7">
                    <div class="thumb-gallery">
                        <img src="{{ asset('sites/img/landing-page2/passport.png') }}" alt="" class="passport">
                        <div
                            class="owl-carousel owl-theme manual thumb-gallery-detail nav-style-1 mb-2 mb-sm-3 box-shadow-4"
                            id="thumbGalleryDetail">
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-1">
                                    <span class="thumbnail-price px-3 py-2 text-5 text-sm-6 text-xl-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-2">
                                    <span class="thumbnail-price px-3 py-2 text-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-3">
                                    <span class="thumbnail-price px-3 py-2 text-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-4">
                                    <span class="thumbnail-price px-3 py-2 text-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-5">
                                    <span class="thumbnail-price px-3 py-2 text-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-6">
                                    <span class="thumbnail-price px-3 py-2 text-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-7">
                                    <span class="thumbnail-price px-3 py-2 text-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="img-thumbnail img-thumbnail-no-borders d-block ratio ratio-16x9" data-hash="project-8">
                                    <span class="thumbnail-price px-3 py-2 text-7 font-weight-bold">
                                        <span>250.000$</span>
                                    </span>
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1.jpg') }}"
                                         class="img-fluid">
                                </span>
                            </div>
                        </div>
                        <div class="row gx-2 gx-sm-3" id="thumbGalleryThumbs">
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-1">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-2">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-3">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-4">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-5">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-6">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-7">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                            <div class="col-3 mb-2 mb-sm-3">
                                <a class="img-thumbnail img-thumbnail-no-borders d-block cur-pointer ratio ratio-16x9" href="#project-8">
                                    <img alt="Project Image" src="{{ asset('sites/img/landing-page2/project1-sm.jpg') }}"
                                         class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="row text-7 text-sm-10 justify-content-center">
                            <div class="col-1-5 text-center">
                                <div class="badge badge-secondary btn-rounded">0+1</div>
                            </div>
                            <div class="col-1-5 text-center">
                                <div class="badge badge-secondary btn-rounded">1+1</div>
                            </div>
                            <div class="col-1-5 text-center">
                                <div class="badge badge-secondary btn-rounded">2+1</div>
                            </div>
                            <div class="col-1-5 text-center">
                                <div class="badge badge-secondary btn-rounded">3+1</div>
                            </div>
                            <div class="col-1-5 text-center">
                                <div class="badge badge-secondary btn-rounded">4+1</div>
                            </div>
                        </div>
                    </div>
                    <div class="my-5 text-center">
                        <a href="#" class="btn btn-outline-primary btn-rounded px-4 text-5 py-1 font-weight-bold">For
                            more informations</a>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4 mb-5">
                    <div class="text-3 line-height-4 font-weight-semibold">
                        <p>Modern construction, with the most luxurious sea view over the istanbulian peninsula, offers
                            you the luxurious elitism and premium sense of finishing within the design created by
                            fendi.</p>
                        <p>The project is an opportunity to be in the heart of central istanbul in the european section,
                            which relies on its surroundings, considered a mix of developed commercial and residential
                            infrastructure and also the peninsula's ancient historical part of the city.</p>
                        <p>And for those concerned about obtaining turkish citizenship by investment in turkey, the
                            t-000 project will offer you not only a paradise to live in, but also global accessibility,
                            for you and your family.</p>
                    </div>
                    <div class="card mt-5 border-radius-2 border-primary">
                        <div class="card-body text-xl-3 text-xxl-4">
                            <h3 class="text-center text-5 text-sm-6">Your New Home Awaits</h3>
                            <form action="">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="name" class="mb-1">Enter Your Name*</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                               placeholder="Name">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label for="mail" class="mb-1">Enter Your Mail*</label>
                                        <input id="mail" name="mail" type="email" class="form-control"
                                               placeholder="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label for="phone" class="mb-1">Enter Your Phone</label>
                                        <input id="phone" name="phone" type="text" class="form-control"
                                               placeholder="Phone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <label for="message" class="mb-1">Enter Your Message*</label>
                                        <textarea id="message" name="message" type="text" class="form-control"
                                                  placeholder="Message" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit"
                                                class="btn btn-outline-primary btn-rounded px-4 text-3 py-1 font-weight-semibold">
                                            Inquire Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
