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
    /*
    <script type="text/javascript">
        window.$ = window.jQuery = $;
        // Search form
        /*$('#form-projects-ajax').on('submit', function (e) {
            e.preventDefault();

            function get_filter(class_name) {
                let filter = [];
                $('.' + class_name + ':checked').each(function () {
                    filter.push($(this).val());
                });
                return filter;
            }

            $.ajax({
                url: "{{ route('search') }}",
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                type: "POST",
                data: {
                    property_type: $('[name="property-type"]').val(),
                    project_bedrooms: $('[name="project_bedrooms"]').val(),
                    city: get_filter('city')
                },
                success: function (response) {
                    $('#results').html(response);
                },
                error: function (error) {
                }
            });
        });
    </script>*/
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
                    <form class="row align-items-center" id="form-projects-ajax" role="form" method="post"
                          action="{{ route('search') }}">
                        @csrf
                        <div class="col-lg-3">
                            <button class="cities-dropdown btn dropdown-toggle" type="button" id="citiesMenu"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('messages.city') }}
                            </button>
                            <div class="cities-dropdown-menu dropdown-menu p-4" aria-labelledby="citiesMenu">
                                <h6>{{ __('messages.city') }}</h6>
                                <div class="row gx-5">
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="1" id="istanbul"
                                                   name="city[]">
                                            <label class="form-check-label" for="istanbul">
                                                {{ __('Istanbul') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="4" id="sapanca"
                                                   name="city[]">
                                            <label class="form-check-label" for="sapanca">
                                                {{ __('Sapanca') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="6" id="kıbrıs"
                                                   name="city[]">
                                            <label class="form-check-label" for="kıbrıs">
                                                {{ __('Kıbrıs') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="2" id="bodrum"
                                                   name="city[]">
                                            <label class="form-check-label" for="bodrum">
                                                {{ __('Bodrum') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="5" id="trapzon"
                                                   name="city[]">
                                            <label class="form-check-label" for="trapzon">
                                                {{ __('Trapzon') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="7" id="bursa"
                                                   name="city[]">
                                            <label class="form-check-label" for="bursa">
                                                {{ __('Bursa') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="3" id="antalya"
                                                   name="city[]">
                                            <label class="form-check-label" for="antalya">
                                                {{ __('Antalya') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="8" id="izmir"
                                                   name="city[]">
                                            <label class="form-check-label" for="izmir">
                                                {{ __('Izmir') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="property-type" id="property-type" class="form-control form-control-lg">
                                    <option value="">{{ __('messages.property_type') }}</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="project_bedrooms" id="project_bedrooms"
                                        class="form-control form-control-lg">
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
    <div class="scrolling-pagination">
        <section class="section projects-section my-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xl-10 mb-4">
                        <h2>{{ __('messages.properties_for_sale_in_istanbul_2021') }}</h2>
                        <p class="lead"></p>
                    </div>
                </div>
                <div class="row projects mt-3 gx-3 gx-lg-4 gx-xl-3 gx-xxl-4">
                    @foreach ($projects as $project)
                        <div class="col-lg-6 col-xl-4 mb-4">
                            <div class="project card">
                                <div class="ratio ratio-16x9">
                                    <img class="card-img-top" src="{{ pageImage($project->photo_file) }}"
                                         alt="{{ $project->seo_title }}">
                                </div>
                                <div class="card-body">
                                    <div class="card-infos">
                                        <h4 class="card-title mb-4 text-6 text-sm-7 text-lg-6 text-xl-6 text-xxl-7 font-weight-bold">
                                            {{ __('messages.project_no') }} {{ $project->title }}</h4>
                                        <div class="row features mb-3 gx-2 gx-sm-3 gx-xl-2 gx-xxl-3">
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
                                            class="col-auto col-sm-6 price text-primary text-5 text-sm-6 font-weight-semibold">{{ currencyConvert($project->lowest_price) }}
                                        </div>
                                        <div class="col-auto col-sm-6 more-details">
                                            <a href="{{ route('project.detail', $project->seo_url_slug ?? $project->translate('en')->seo_url_slug ) }}"
                                               class="btn btn-primary btn-line w-100 text-3">{{ __('messages.more_details') }}</a>
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
                    {{ $projects->links("site/vendor/pagination/custom")}}
                </div>
            </div>
        </div>
    </div>
@endsection
