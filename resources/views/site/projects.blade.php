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

        function loadMoreData(page) {
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function () {
                    $(".ajax-load").show();
                }
            })
                .done(function (data) {
                    if (data.html == "") {
                        $('.ajax-load').html("No more Posts Found!");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
                // Call back function
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert("Server not responding.....");
                });

        }

        //function for Scroll Event
        let page = 1;

        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        $(document).ready(function() {
            $('#citiesMenu').html($('.common_selector').attr('id'))
        });



        $('.common_selector').click(function () {
            console.log($(this).attr('id'))
            $('#citiesMenu').html($(this).attr('id'))
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
                    <form class="row align-items-center" id="form-projects-ajax" role="form" method="get"
                          action="{{ route('projects') }}">
                        @csrf
                        <div class="col-lg-3">
                            <button class="cities-dropdown btn dropdown-toggle" type="button" id="citiesMenu"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('messages.city') }}
                            </button>
                            <div class="cities-dropdown-menu dropdown-menu p-4" aria-labelledby="citiesMenu">
                                <h6>{{ __('messages.city') }}</h6>
                                <div class="row gx-5 radio-panel">
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="1" id="istanbul"
                                                   name="city[]" {{ (is_array(request()->city) and in_array(1, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="istanbul">
                                                {{ __('Istanbul') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="4" id="sapanca"
                                                   name="city[]" {{ (is_array(old('city')) && in_array(4, old('city'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="sapanca">
                                                {{ __('Sapanca') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="6" id="kıbrıs"
                                                   name="city[]" {{ (is_array(old('city')) && in_array(6, old('city'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="kıbrıs">
                                                {{ __('Kıbrıs') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="2" id="bodrum"
                                                   name="city[]" {{ (is_array(old('city')) && in_array(2, old('city'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="bodrum">
                                                {{ __('Bodrum') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="5" id="trapzon"
                                                   name="city[]" {{ (is_array(old('city')) && in_array(5, old('city'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="trapzon">
                                                {{ __('Trapzon') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="7" id="bursa"
                                                   name="city[]" {{ (is_array(old('city')) && in_array(7, old('city'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="bursa">
                                                {{ __('Bursa') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="3" id="antalya"
                                                   name="city[]" {{ (is_array(old('city')) && in_array(3, old('city'))) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="antalya">
                                                {{ __('Antalya') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector city" type="checkbox"
                                                   value="8" id="izmir"
                                                   name="city[]" {{ (is_array(old('city')) && in_array(8, old('city'))) ? ' checked' : '' }}>
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
                                <select name="property_type" id="property-type" class="form-control form-control-lg">
                                    <option value="">{{ __('messages.property_type') }}</option>
                                    @foreach($sections as $section)
                                        <option
                                            value="{{ $section->id }}" {{ request()->property_type == $section->id  ? 'selected' : ''  }}>{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="select-wrapper">
                                <select name="project_bedrooms" id="project_bedrooms"
                                        class="form-control form-control-lg">
                                    <option value="">{{ __('messages.bedrooms') }}</option>
                                    <option value="1" {{ request()->project_bedrooms == 1  ? 'selected' : ''  }}>1+0
                                    </option>
                                    <option value="2" {{ request()->project_bedrooms == 2  ? 'selected' : ''  }}>1+1
                                    </option>
                                    <option value="3" {{ request()->project_bedrooms == 3  ? 'selected' : ''  }}>2+1
                                    </option>
                                    <option value="4" {{ request()->project_bedrooms == 4  ? 'selected' : ''  }}>3+1
                                    </option>
                                    <option value="5" {{ request()->project_bedrooms == 5  ? 'selected' : ''  }}>4+1
                                    </option>
                                    <option
                                        value="6" {{ request()->project_bedrooms == 6  ? 'selected' : ''  }}>{{ __('More') }}</option>
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
                    @include('site.vendor.data')
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col">
                    {{ $projects->appends(request()->input())->links("site/vendor/pagination/custom")}}
                </div>
            </div>
        </div>
    </div>
@endsection
