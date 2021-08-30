@extends('layouts.simple')
@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/projects.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/projects.css') }}">
    @endif
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5"
             style="background-image: url({{ asset('sites/img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ __('messages.our_projects') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.our_projects') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section search-form-section section-no-background my-0 pt-0">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-4 mb-3">
                    <h3 class="mb-0">{{ __('messages.find_your_dream_home') }}</h3>
                </div>
                <div class="col-xl-8">
                    <form action="{{ route('search') }}" method="post" class="row align-items-center">
                        @csrf
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="city" class="form-control form-control-lg">
                                    <option>{{ __('messages.city') }}</option>
                                    <option value="1">{{ __('Istanbul') }}</option>
                                    <option value="2">{{ __('Bodrum') }}</option>
                                    <option value="3">{{ __('Antalya') }}</option>
                                    <option value="4">{{ __('Sapanca') }}</option>
                                    <option value="5">{{ __('Trapzon') }}</option>
                                    <option value="6">{{ __('Kıbrıs') }}</option>
                                    <option value="7">{{ __('Bursa') }}</option>
                                    <option value="8">{{ __('Izmir') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="property-type" class="form-control form-control-lg">
                                    <option>{{ __('messages.property_type') }}</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="project_bedrooms" class="form-control form-control-lg">
                                    <option value="">{{ __('messages.bedrooms') }}</option>
                                    <option value="1">1+0</option>
                                    <option value="2">1+1</option>
                                    <option value="3">2+1</option>
                                    <option value="4">3+1</option>
                                    <option value="5">4+1</option>
                                    <option value="6">{{ __('More') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 mt-2 mt-lg-0">
                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3"><i
                                    class="fa fa-search me-2"></i> {{ __('messages.search') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="section projects-section my-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-10 mb-4">
                    <h2>{{ __('messages.properties_for_sale_in_istanbul_2021') }}</h2>
                    <p class="lead">{!! $topic->details !!}</p>
                </div>
            </div>
            <div class="row projects mt-3">
                @foreach ($projects as $project)
                    <div class="col-lg-6 col-xl-4 mb-4">
                        <div class="project card">
                            <div class="ratio ratio-16x9">
                                <img class="card-img-top" src="{{ pageImage($project->photo_file) }}"
                                     alt="{{ $project->seo_title }}">
                            </div>
                            <div class="card-body">
                                <div class="card-infos">
                                    <h4 class="card-title mb-4 text-7 text-sm-8 text-lg-7 text-xl-8 font-weight-bold">
                                        {{ __('messages.project_no') }} {{ $project->title }}</h4>
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
                                                                          alt="hand"/> {{ $project->payment_type === 1 ? 'Cash' : 'Installment' }}
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
                                    <p class="card-text text-4 mb-5">{!! \Str::limit($project->details , 100, $end='...') !!}</p>
                                </div>
                                <div class="row align-items-center justify-content-between">
                                    <div
                                        class="col-auto col-sm-6 price text-primary text-6 text-sm-7 font-weight-semibold">{{ currencyConvert($project->lowest_price) }}
                                    </div>
                                    <div class="col-auto col-sm-6 more-details">
                                        <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug ) }}"
                                           class="btn btn-primary btn-line w-100 text-4">{{ __('messages.more_details') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
