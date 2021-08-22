@extends('layouts.simple')
@section('title')
    {{ __('messages.project_no') }} {{ $project->title }} | Turkey Advisors
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/project.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/project.css') }}">
    @endif
@endsection

@section('javascripts')
    <script src="{{ asset('sites/js/project.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5"
             style="background-image: url({{ asset('img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ __('messages.project_no') }} {{ $project->title }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li><a href="{{ route('projects') }}">{{ __('messages.projects') }}</a></li>
                        <li class="active">{{ __('messages.project_no') }} {{ $project->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="single-project">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <a class="badge badge-secondary badge-md px-3 me-1">{{ __('messages.featured') }}</a>
                    <a class="badge badge-primary badge-md px-3 me-3">{{ __('messages.sold') }}</a>
                    <span class="d-inline-block article-date me-3"><i
                            class="fas fa-calendar-alt me-1 text-secondary"></i> {{ \Carbon\Carbon::parse($project->finish_date)->format('d M Y')}}</span>
                    <span class="d-inline-block article-views"><i
                            class="fa fa-eye me-1 text-secondary"></i> {{ $project->visits }} {{ __('messages.views') }}</span>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <a class="d-inline-block email me-3"><i
                            class="fas fa-envelope-open-text me-1 text-secondary"></i> {{ __('messages.email') }}</a>
                    <a class="d-inline-block share me-3"><i
                            class="fas fa-share-alt me-1 text-secondary"></i> {{ __('messages.share') }}</a>
                    <a class="d-inline-block print"><i
                            class="fa fa-print text-secondary"></i> {{ __('messages.print') }}</a>
                </div>
            </div>
            <hr class="bg-color-grey-scale-8"/>
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-auto">
                    <h2 class="mb-4">{{ __('messages.project_no') }} {{ $project->title }}</h2>
                    <div class="features">
                        <span class="d-inline-block me-4 pr-1 text-4"><img class="feature-icon me-1"
                                                                           src="{{ asset('sites/img/project/map.svg') }}"
                                                                           alt="map"/>
                            @switch($project->city)
                                @case(1)
                                {{  __('Istanbul') }}
                                @break
                                @case(2)
                                {{  __('Bodrum') }}
                                @break
                                @case(3)
                                {{  __('Antalya') }}
                                @break
                                @case(4)
                                {{  __('Sapanca') }}
                                @break
                                @case(5)
                                {{  __('Trapzon') }}
                                @break
                                @case(6)
                                {{  __('Kıbrıs') }}
                                @break
                                @case(7)
                                {{  __('Bursa') }}
                                @break
                                @case(8)
                                {{  __('Izmir') }}
                                @break

                            @endswitch
                        </span>
                        <span class="d-inline-block me-4 pr-1 text-4"><img class="feature-icon me-1"
                                                                           src="{{ asset('sites/img/project/hand.svg') }}"
                                                                           alt="hand"/> Installment</span>
                        <span class="d-inline-block me-4 pr-1 text-4"><img class="feature-icon me-1"
                                                                           src="{{ asset('sites/img/project/hourglass.svg') }}"
                                                                           alt="hourglass"/>
                            @switch($project->status)
                                @case(1)
                                {{  __('Not available') }}
                                @break
                                @case(2)
                                {{  __('Preparing selling') }}
                                @break
                                @case(3)
                                {{  __('Selling') }}
                                @break
                                @case(4)
                                {{  __('Sold') }}
                                @break
                                @case(5)
                                {{  __('Building') }}
                                @break
                            @endswitch

                        </span>
                    </div>
                </div>
                <div class="col-sm-auto text-lg-end text-10 font-weight-semibold line-height-2 mt-4 mt-lg-0">
                    {{ $project->lowest_price ?? '' }} &#36;
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme gallery mt-5">
            @foreach($project->images as $img)
                <div class="image-container">
                    <img src="{{ pageImage($img->full) }}" alt="image2"/>
                    <div class="buttons">
                        <a class="btn btn-secondary me-1"><img src="{{ asset('sites/img/project/360-degrees.svg') }}"
                                                               alt="360-degrees"/></a>
                        <a class="btn btn-secondary popup-image" href="{{ asset('sites/img/project/image2.png') }}"><img
                                src="{{ asset('sites/img/project/fullscreen.svg') }}" alt="fullscreen"/></a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-xl-8 mb-5 pr-xl-5">
                    <ul class="nav nav-tabs align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#overview" type="button"
                               role="tab" aria-controls="overview"
                               aria-selected="true">{{ __('messages.overview') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#map-view" type="button" role="tab"
                               aria-controls="overview" aria-selected="true">{{ __('messages.map_view') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="ms-0 ms-sm-1 btn btn-lg btn-primary" href="" data-toggle="tab"><i
                                    class="fas fa-cloud-download-alt text-secondary"></i> <span
                                    class="text-1">{{ __('Brochure') }}</span></a>
                        </li>
                    </ul>
                    <div class="tab-content px-0">
                        <div id="overview" class="tab-pane active">
                            <div class="project-description">
                                <h2 class="mt-3 mb-4">{{ __('messages.project_no') }} {{ $project->title }}</h2>
                                <p class="lead line-height-6">{!! $project->details !!}</p>
                            </div>
                            <hr class="bg-color-grey-scale-10 my-4"/>
                            <div class="project-details">
                                <h3 class="my-5 text-8">{{ __('messages.project_details') }}</h3>
                                <div class="featured-box featured-box-primary featured-box-effect-1">
                                    <div class="box-content box-content-border-0 p-5">
                                        <div class="row justify-content-around">
                                            <div class="col-md-6 col-lg-5">
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.property_id') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->title }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.price') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->lowest_price ?? '' }} &#36;
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.property_size') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->project_size_min }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.bedrooms') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{  $project->project_bedrooms }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.bathrooms') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->project_bathrooms }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-5">
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.garage') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->garage_number }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.garage_size') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->garage_size }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.year_built') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->finish_date->format('Y') }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.property_type') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        {{ $project->category->title }}
                                                    </div>
                                                </div>
                                                <div class="row mb-3 align-items-center">
                                                    <div class="col-6 text-primary text-end">
                                                        {{ __('messages.property_status') }}:
                                                    </div>
                                                    <div class="col-6 text-end text-secondary">
                                                        @switch($project->status)
                                                            @case(1)
                                                            {{  __('Not available') }}
                                                            @break
                                                            @case(2)
                                                            {{  __('Preparing selling') }}
                                                            @break
                                                            @case(3)
                                                            {{  __('Selling') }}
                                                            @break
                                                            @case(4)
                                                            {{  __('Sold') }}
                                                            @break
                                                            @case(5)
                                                            {{  __('Building') }}
                                                            @break
                                                        @endswitch
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-color-grey-scale-10 my-4"/>
                            <div class="project-features">
                                <h2 class="my-5 text-8">{{ __('messages.project_features') }}</h2>
                                <div class="row">
                                    @foreach($project->features->chunk(3) as $row)
                                        <div class="col-4" data-aos="fade-right" data-aos-duration="2000">
                                            @foreach($row as $value)
                                                <div class="feature text-5 mb-5">
                                                    <i class="far fa-check-square text-secondary me-3"></i> {{ $value->title }}
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="bg-color-grey-scale-10 mt-0 mb-4"/>
                        <div class="project-nearby">
                            <h2 class="my-5 text-8"><img src="{{ asset('sites/img/project/nearby.svg') }}" class="me-1"
                                                         alt="nearBy"/> {{ __('messages.whats_nearby') }}</h2>
                            <div class="row">
                                @foreach($project->facilities->chunk(3) as $row)
                                    <div class="col-lg-4">
                                        <ul class="list list-icons">
                                            @foreach($row as $facility)
                                                <li><i class="fas fa-circle"></i> {{ $facility->title }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <hr class="bg-color-grey-scale-10 mt-4 mb-4"/>
                        <div class="project-plans">
                            <h2 class="my-5 text-8">{{ __('messages.floor_plans') }}</h2>
                            <div class="accordion" id="plans">
                                @foreach($project->floors as $i => $floor)
                                    <div class="card card-default">
                                        <div id="heading{{$i}}" class="card-header">
                                            <div class="card-title mb-0">
                                                <a class="accordion-toggle" data-bs-toggle="collapse"
                                                   data-bs-target="#plan{{$i}}" aria-expanded="true"
                                                   aria-controls="plan{{$i}}">
                                                    <div class="row justify-content-between">
                                                        <h4 class="col-lg-auto my-1">{{ __('messages.first_floor') }}</h4>
                                                        <div class="col-lg-auto my-1 floor-properties text-lg-end">
                                                            <div class="d-inline-block">
                                                            <span
                                                                class="text-primary me-1">{{ __('messages.price') }}:</span>
                                                                <span
                                                                    class="text-secondary me-3">${{ $floor->floor_price }}</span>
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <span class="text-primary me-1">{{ __('messages.property_size') }}:</span>
                                                                <span class="text-secondary me-3">{{ $floor->floor_size }} Sq Ft</span>
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <span class="text-primary me-1">{{ __('messages.bedrooms') }}:</span>
                                                                <span
                                                                    class="text-secondary me-3">{{ $floor->floor_bedrooms }}</span>
                                                            </div>
                                                            <div class="d-inline-block">
                                                                <span class="text-primary me-1">{{ __('messages.bathrooms') }}:</span>
                                                                <span
                                                                    class="text-secondary me-3">{{ $floor->floor_bathrooms }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="plan{{$i}}" class="accordion-collapse collapse show"
                                             aria-labelledby="heading{{$i}}" data-bs-parent="#plans">
                                            <div class="card-body">
                                                <img src="{{ pageImage($floor->floor_full) }}" alt="plan"
                                                     class="w-100"/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div id="map-view" class="tab-pane">
                        <h2 class="mt-3 mb-4">{{ __('messages.map_view') }}</h2>
                    </div>
                </div>
                <div class="col-xl-4 sidebar">
                    <div class="contact">
                        <div class="contact-on-whatsapp">
                            <a href="https://wa.me/00905527440617"
                               class="btn btn-lg btn-secondary w-100 font-weight-semibold py-3">{{ __('messages.contact_us_on_whatsapp') }}
                                <i class="ms-3 fab fa-whatsapp text-5"></i></a>
                        </div>
                    </div>
                    <div class="featured-box featured-box-primary featured-box-effect-1 mt-5">
                        <div class="box-content box-content-border-0 p-5">
                            <h2 class="text-uppercase">{{ __('messages.send_us_an_email') }}</h2>
                            <form action="{{ route('submit.contact') }}" method="POST">
                                @csrf
                                <input name="item_id" type="hidden" value="{{ $project->title }}">
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
                                <div class="form-group mb-5">
                                    <input
                                        type="text"
                                        class="form-control form-control-lg {{ $errors->has('phone') ? 'error' : '' }}"
                                        name="phone"
                                        placeholder="{{ __('messages.your_phone_number') }}" required>
                                    @if ($errors->has('phone'))
                                        <div class="error">
                                            {{ $errors->first('phone') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group mb-5">
                                    <textarea
                                        name="message"
                                        class="form-control form-control-lg" rows="3"
                                              placeholder="{{ __('messages.your_message') }}"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary text-secondary w-100 btn-lg px-5">{{ __('messages.request_for_details') }}
                                        <span class="arrow2 is-triangle arrow-bar is-right"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <section class="section wwa-section border-0 my-5 px-3 py-4"
                             style="background-image: url({{ asset('img/wwa.jpg') }});">
                        <div class="container container-lg">
                            <div class="row align-items-end justify-content-between">
                                <div class="col-12">
                                <span
                                    class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">Turkey Advisors</h2>
                                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-8">{{ __('messages.some_offers') }}</h4>
                                    <a class="btn btn-lg btn-secondary px-4 mt-5 py-3 w-100"
                                       href="#">{{ __('messages.get_in_touch') }} <span
                                            class="arrow1 is-triangle arrow-bar is-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <section class="section projects-section my-0 section-height-2">
                <div class="row">
                    <div class="col-12">
                        <h3 class="mb-5 text-8">{{ __('messages.similar_properties') }}</h3>
                        <div class="owl-carousel owl-theme projects mt-3">
                            @foreach($popProjects as $project)
                                <div class="project card">
                                    <img class="card-img-top" src="{{ pageImage($project->photo_file) }}" alt="Project">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4 text-8 font-weight-bold">{{ __('messages.project_no') }} {{ $project->title }}</h4>
                                        <div class="row features mb-3 gx-3">
                                            <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                              src="{{ asset('sites/img/project/map.svg') }}"
                                                                              alt="map"/>
                                                @switch($project->city)
                                                    @case(1)
                                                    {{  __('Istanbul') }}
                                                    @break
                                                    @case(2)
                                                    {{  __('Bodrum') }}
                                                    @break
                                                    @case(3)
                                                    {{  __('Antalya') }}
                                                    @break
                                                    @case(4)
                                                    {{  __('Sapanca') }}
                                                    @break
                                                    @case(5)
                                                    {{  __('Trapzon') }}
                                                    @break
                                                    @case(6)
                                                    {{  __('Kıbrıs') }}
                                                    @break
                                                    @case(7)
                                                    {{  __('Bursa') }}
                                                    @break
                                                    @case(8)
                                                    {{  __('Izmir') }}
                                                    @break

                                                @endswitch
                                            </div>
                                            <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                              src="{{ asset('sites/img/project/hand.svg') }}"
                                                                              alt="hand"/> Installment
                                            </div>
                                            <div class="col-auto text-3"><img class="feature-icon me-1"
                                                                              src="{{ asset('sites/img/project/hourglass.svg') }}"
                                                                              alt="hourglass"/>
                                                @switch($project->status)
                                                    @case(1)
                                                    {{  __('Not available') }}
                                                    @break
                                                    @case(2)
                                                    {{  __('Preparing selling') }}
                                                    @break
                                                    @case(3)
                                                    {{  __('Selling') }}
                                                    @break
                                                    @case(4)
                                                    {{  __('Sold') }}
                                                    @break
                                                    @case(5)
                                                    {{  __('Building') }}
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>
                                        <p class="card-text text-4 mb-5">{!! \Str::limit($project->details , 150, $end='...') !!}</p>
                                        <div class="row align-items-center">
                                            <div
                                                class="col-6 price text-primary text-8 font-weight-semibold">{{ $project->lowest_price ?? '' }}
                                                $
                                            </div>
                                            <div class="col-6 more-details">
                                                <a href="{{ route('project.detail', $project->seo_url_slug) }}"
                                                   class="btn btn-primary btn-line w-100 text-4">{{ __('messages.more_details') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
