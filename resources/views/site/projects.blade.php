@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() === 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/projects.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/projects.css') }}">
    @endif
@endsection

@section('javascripts')
    /*
    <script type="text/javascript">
        window.$ = window.jQuery = $;


        $(document).ready(function () {
            function check() {
                var $checkbox = $(this);
                var num = $checkbox.val()
                if ($checkbox.is(':checked')) {
                    if ($(this).val() === 1) {
                        $('#citiesMenu').parent().css({'right': '0px', 'left': ''}).animate({
                            'right': '10px'
                        });
                        $('#citiesMenu').html($(this).attr('id'))
                        $('#areasMenu').hide();
                    } else {
                        $('#citiesMenu').html($(this).attr('id'))
                        if ($(window).width() >= 930) {
                            $('#citiesMenu').parent().css({'right': '', 'left': '0px'}).animate({
                                'left': '200px'
                            });
                        }
                        $('#areasMenu').hide();
                    }
                } else {
                        if($(this).val() !== 1) {
                            $('#areasMenu').show();
                            // $('#citiesMenu').parent().css({'right': '0px', 'left': ''}).animate({
                            //     'right': '10px'
                            // });
                        } else {
                            console.log($(this).val())
                            $('#areasMenu').hide();
                            // if ($(window).width() >= 930) {
                            //     $('#citiesMenu').parent().css({'right': '', 'left': '0px'}).animate({
                            //         'right': '10px'
                            //     });
                            // }
                        }
                }

            }

            $('.common_selector_city').each(check).change(check);

            if ($('.common_selector').is(':checked')) {
                $('#areasMenu').html($('.common_selector').attr('id'))

            } else {
                $('#areasMenu').html('<i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('Area') }}')
            }
        });

        $(document).ready(function () {
            $(".common_selector").change("click", function () {
                $('#areasMenu').html($(this).attr('id'))
                if (this.checked) {
                    $('#areasMenu').html($(this).attr('id'))
                }
                if (!this.checked) {
                    $('#areasMenu').html('<i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('Area') }}')
                }
            });
        });
        {{--$(document).ready(function () {--}}
        {{--    $(".common_selector_city").change("click", function () {--}}
        {{--        $('#citiesMenu').html($(this).attr('id'))--}}
        {{--        if (this.checked) {--}}
        {{--            $('#citiesMenu').html($(this).attr('id'))--}}
        {{--        }--}}
        {{--        if (!this.checked) {--}}
        {{--            $('#citiesMenu').html('<i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('City') }}')--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
        // $('.common_selector').click(function () {
        //     $('#areasMenu').html($(this).attr('id'))
        // }citiesMenu
        {{--$(document).ready(function () {--}}

        {{--    $('.common_selector_city').change(function () {--}}

        {{--        $('#citiesMenu').html($(this).attr('id'))--}}
        {{--        if (this.checked) {--}}

        {{--            if ($(this).val() === '1') {--}}
        {{--                $('#areasMenu').show();--}}
        {{--                $('#citiesMenu').parent().css({'right': '0px', 'left': ''}).animate({--}}
        {{--                    'right': '10px'--}}
        {{--                });--}}
        {{--            } else {--}}
        {{--                $('#areasMenu').hide();--}}
        {{--                if ($(this).val() === '1') {--}}
        {{--                    $('#citiesMenu').parent().css({'right': '', 'left': '0px'}).animate({--}}
        {{--                        'left': '200px'--}}
        {{--                    });--}}
        {{--                }--}}
        {{--            }--}}
        {{--        }--}}
        {{--        if (!this.checked) {--}}
        {{--            $('#citiesMenu').html('<i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('messages.city') }}')--}}
        {{--            $('#areasMenu').hide();--}}
        {{--            if ($(window).width() >= 930) {--}}
        {{--                if ($(this).val() === '1') {--}}
        {{--                    $('#citiesMenu').parent().css({'right': '', 'left': '0px'}).animate({--}}
        {{--                        'left': '200px'--}}
        {{--                    });--}}
        {{--                }--}}
        {{--            }--}}
        {{--            $('#citiesMenu').html('<i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('City') }}')--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
        {{--$(document).ready(function () {--}}
        {{--    $(".common_selector").change("click", function () {--}}
        {{--        $('#areasMenu').html($(this).attr('id'))--}}
        {{--        if (this.checked) {--}}
        {{--        }--}}
        {{--        if (!this.checked) {--}}
        {{--            $('#citiesMenu').html('<i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('Area') }}')--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        {{--$(function () {--}}
        {{--    $(".common-selector-type").change("click", function () {--}}
        {{--        $('#propertiesMenu').html($(this).attr('id'))--}}
        {{--        if (this.checked) {--}}

        {{--        }--}}
        {{--        if (!this.checked) {--}}
        {{--            $('#propertiesMenu').html('{{ __('messages.property_type') }}')--}}
        {{--        }--}}

        {{--    });--}}
        {{--})--}}

        {{--$('input:checkbox[name="city"]').change(--}}
        {{--    function () {--}}
        {{--        if ($(this).is(':checked')) {--}}
        {{--            $('#citiesMenu').html($(this).attr('id'))--}}
        {{--            console.log($(this).attr('id'))--}}
        {{--        } else {--}}
        {{--            $('#citiesMenu').html('{{ __('messages.city') }}')--}}
        {{--        }--}}
        {{--    });--}}

        {{--$('input:checkbox[name="property_type"]').change(--}}
        {{--    function () {--}}
        {{--        if ($(this).is(':checked')) {--}}
        {{--            $('#propertiesMenu').html($(this).attr('id'))--}}
        {{--            console.log($(this).attr('id'))--}}
        {{--        } else {--}}
        {{--            $('#propertiesMenu').html('{{ __('messages.property_type') }}')--}}
        {{--        }--}}
        {{--    });--}}

        {{--$('input:checkbox[name="area"]').change(--}}
        {{--    function () {--}}
        {{--        if ($(this).is(':checked')) {--}}
        {{--            $('#areasMenu').html($(this).attr('id'))--}}
        {{--            console.log($(this).attr('id'))--}}
        {{--        } else {--}}
        {{--            $('#areasMenu').html('{{ __('Area') }}')--}}
        {{--        }--}}
        {{--    });--}}
        {{--$(`input:radio[name="project_bedrooms"]`).change(--}}
        {{--    function () {--}}
        {{--        if ($(this).is(':checked')) {--}}
        {{--            $('#bedroomsMenu').html($(this).attr('id'))--}}
        {{--            console.log($(this).attr('id'))--}}
        {{--        } else {--}}
        {{--            $('#bedroomsMenu').html('{{ __('messages.bedrooms') }}')--}}
        {{--        }--}}
        {{--    });--}}

    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm"
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
    <section class="section search-form-section section-no-background my-0 pt-0" style="padding-top: 0!important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 mb-3">
                    <h3 class="mb-0">{{ __('messages.find_your_dream_home') }}</h3>
                </div>
                <div class="col-xl-9 mb-3">
                    <form class="row align-items-center" id="form-projects-ajax" role="form" method="get"
                          action="{{ route('projects') }}">
                        @csrf

                        <div class="col-md-6 col-lg-1-5">
                            <button class="cities-dropdown dropdown-toggle text-center" type="button" id="citiesMenu"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-map-marker-alt text-secondary me-1"></i> {{ __('messages.city') }}
                            </button>
                            <div class="cities-dropdown-menu dropdown-menu p-4" aria-labelledby="citiesMenu">
                                <h6>{{ __('messages.city') }}</h6>
                                <div class="row gx-5">
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="1" id="istanbul"
                                                   name="city[]" {{ (is_array(request()->city) and in_array(1, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="istanbul">
                                                {{ __('Istanbul') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="4" id="sapanca"
                                                   name="city[]" {{ (is_array(request()->city) && in_array(4, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="sapanca">
                                                {{ __('Sapanca') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="6" id="kıbrıs"
                                                   name="city[]" {{ (is_array(request()->city) && in_array(6, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="kıbrıs">
                                                {{ __('Kıbrıs') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="2" id="bodrum"
                                                   name="city[]" {{ (is_array(request()->city) && in_array(2, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="bodrum">
                                                {{ __('Bodrum') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="5" id="trapzon"
                                                   name="city[]" {{ (is_array(request()->city) && in_array(5, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="trapzon">
                                                {{ __('Trapzon') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="7" id="bursa"
                                                   name="city[]" {{ (is_array(request()->city) && in_array(7, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="bursa">
                                                {{ __('Bursa') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="3" id="antalya"
                                                   name="city[]" {{ (is_array(request()->city) && in_array(3, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="antalya">
                                                {{ __('Antalya') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector_city city" type="checkbox"
                                                   value="8" id="izmir"
                                                   name="city[]" {{ (is_array(request()->city) && in_array(8, request()->city)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="izmir">
                                                {{ __('Izmir') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-1-5 areas-col">
                            <button class="areas-dropdown btn dropdown-toggle text-center" type="button" id="areasMenu"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-map-marker-alt text-secondary me-1"></i> Area
                            </button>
                            <div class="areas-dropdown-menu dropdown-menu p-4" aria-labelledby="areasMenu">
                                <h6>{{ __('Area') }}</h6>
                                <div class="row gx-5">
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="1" id="Arnavutkoy"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(1, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Arnavutkoy">
                                                {{ __('Arnavutkoy') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="2" id="Atasehir"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(2, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Atasehir">
                                                {{ __('Atasehir') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="3" id="Avcilar"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(3, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Avcilar">
                                                {{ __('Avcilar') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="4" id="Bagcilar"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(4, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Bagcilar">
                                                {{ __('Bagcilar') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="5" id="Bagcilar"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(5, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Bahcelievler">
                                                {{ __('Bahcelievler') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="6" id="Bahcesehir"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(6, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Bahcesehir">
                                                {{ __('Bahcesehir') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="7" id="Bakirkoy"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(7, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Bakirkoy">
                                                {{ __('Bakirkoy') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="8" id="Basaksehir"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(8, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Basaksehir">
                                                {{ __('Basaksehir') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="9" id="Bayrampasa"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(9, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Bayrampasa">
                                                {{ __('Bayrampasa') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="10" id="Besiktas"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(10, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Besiktas">
                                                {{ __('Besiktas') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="11" id="Beykoz"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(11, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Beykoz">
                                                {{ __('Beykoz') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="12" id="Beylikduzu"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(12, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Beylikduzu">
                                                {{ __('Beylikduzu') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="13" id="Beyoglu"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(13, request()->area) )? ' checked' : '' }}>
                                            <label class="form-check-label" for="Beyoglu">
                                                {{ __('Beyoglu') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="14" id="Buyukcekmece"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(14, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Buyukcekmece">
                                                {{ __('Buyukcekmece') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="15" id="Catalca"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(15, request()->area) )? ' checked' : '' }}>
                                            <label class="form-check-label" for="Catalca">
                                                {{ __('Catalca') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="16" id="Cekmekoy"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(16, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Cekmekoy">
                                                {{ __('Cekmekoy') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="17" id="Esenyurt"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(17, request()->area))? ' checked' : '' }}>
                                            <label class="form-check-label" for="Esenyurt">
                                                {{ __('Esenyurt') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="18" id="Eyup"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(18, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Eyup">
                                                {{ __('Eyup') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="19" id="Fatih"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(19, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Fatih">
                                                {{ __('Fatih') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="20" id="Gaziosmanpasa"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(20, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Gaziosmanpasa">
                                                {{ __('Gaziosmanpasa') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="21" id="Kadikoy"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(21, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Kadikoy">
                                                {{ __('Kadikoy') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="22" id="Kagithane"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(22, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Kagithane">
                                                {{ __('Kagithane') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="23" id="Kartal"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(23, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Kartal">
                                                {{ __('Kartal') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="24" id="Kucukcekmece"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(24, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Kucukcekmece">
                                                {{ __('Kucukcekmece') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="25" id="Maltepe"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(25, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Maltepe">
                                                {{ __('Maltepe') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="26" id="Pendik"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(26, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Pendik">
                                                {{ __('Pendik') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="27" id="Sancaktepe"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(27, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Sancaktepe">
                                                {{ __('Sancaktepe') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="28" id="Sariyer"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(28, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Sariyer">
                                                {{ __('Sariyer') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="29" id="Silivri"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(29, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Silivri">
                                                {{ __('Silivri') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="30" id="Sisli"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(30, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Sisli">
                                                {{ __('Sisli') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="31" id="Sultangazi"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(31, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Sultangazi">
                                                {{ __('Sultangazi') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="32" id="Tuzla"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(32, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Tuzla">
                                                {{ __('Tuzla') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="33" id="Umraniye"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(33, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Umraniye">
                                                {{ __('Umraniye') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="34" id="Uskudar"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(34, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Uskudar">
                                                {{ __('Uskudar') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input common_selector area" type="checkbox"
                                                   value="35" id="Zeytinburnu"
                                                   name="area[]" {{ (is_array(request()->area) && in_array(35, request()->area)) ? ' checked' : '' }}>
                                            <label class="form-check-label" for="Zeytinburnu">
                                                {{ __('Zeytinburnu') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-1-5">
                            <button class="cities-dropdown dropdown-toggle text-center" type="button"
                                    id="propertiesMenu"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('messages.property_type') }}
                            </button>
                            <div class="cities-dropdown-menu dropdown-menu p-4" aria-labelledby="propertiesMenu"
                                 style="width: 300px;">
                                <h6>{{ __('messages.property_type') }}</h6>
                                <div class="row gx-5">
                                    <div class="col-lg-12">
                                        @foreach($sections as $section)
                                            <div class="form-check mb-3">
                                                <input class="form-check-input common-selector-type"
                                                       type="checkbox"
                                                       value="{{ $section->id }}"
                                                       id="{{ $section->title }}"
                                                       name="property_type[]" {{ (is_array(request()->input('property_type')) and in_array( $section->id , request()->input('property_type'), true) ? ' checked' : '') }}>
                                                <label class="form-check-label" for="{{ $section->title }}">
                                                    {{ $section->title }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-1-5">
                            <button class="cities-dropdown dropdown-toggle text-center" type="button"
                                    id="bedroomsMenu"
                                    data-bs-toggle="dropdown" aria-expanded="false">{{ __('messages.bedrooms') }}
                            </button>
                            <div class="cities-dropdown-menu dropdown-menu p-4" aria-labelledby="bedroomsMenu"
                                 style="width: 300px;">
                                <h6>{{ __('messages.bedrooms') }}</h6>
                                <div class="row gx-5">
                                    <div class="col-lg-12">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   value="1"
                                                   id="project_bedrooms-1"
                                                   name="project_bedrooms" {{ (is_array(request()->input('project_bedrooms')) and in_array(1, request()->input('project_bedrooms'), true) ? ' checked' : '') }}>
                                            <label class="form-check-label" for="project_bedrooms-1">
                                                1+0
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   value="2"
                                                   id="project_bedrooms-2"
                                                   name="project_bedrooms" {{ (is_array(request()->input('project_bedrooms')) and in_array(2, request()->input('project_bedrooms'), true) ? ' checked' : '') }}>
                                            <label class="form-check-label" for="project_bedrooms-2">
                                                1+1
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   value="3"
                                                   id="project_bedrooms-3"
                                                   name="project_bedrooms" {{ (is_array(request()->input('project_bedrooms')) and in_array(3, request()->input('project_bedrooms'), true) ? ' checked' : '') }}>
                                            <label class="form-check-label" for="project_bedrooms-3">
                                                1+2
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   value="4"
                                                   id="project_bedrooms-4"
                                                   name="project_bedrooms" {{ (is_array(request()->input('project_bedrooms')) and in_array(4, request()->input('project_bedrooms'), true) ? ' checked' : '') }}>
                                            <label class="form-check-label" for="project_bedrooms-4">
                                                1+3
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   value="5"
                                                   id="project_bedrooms-5"
                                                   name="project_bedrooms" {{ (is_array(request()->input('project_bedrooms')) and in_array(5, request()->input('project_bedrooms'), true) ? ' checked' : '') }}>
                                            <label class="form-check-label" for="project_bedrooms-5">
                                                1+4
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   value="6"
                                                   id="project_bedrooms-6"
                                                   name="project_bedrooms" {{ (is_array(request()->input('project_bedrooms')) and in_array(6, request()->input('project_bedrooms'), true) ? ' checked' : '') }}>
                                            <label class="form-check-label" for="project_bedrooms-6">
                                                1+5
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   value="7"
                                                   id="project_bedrooms-7"
                                                   name="project_bedrooms" {{ (is_array(request()->input('project_bedrooms')) and in_array(7, request()->input('project_bedrooms'), true) ? ' checked' : '') }}>
                                            <label class="form-check-label" for="project_bedrooms-7">
                                                {{ __('More') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1-5 mt-2 mt-lg-0">
                            <button type="submit" class="btn btn-primary w-100"><i
                                    class="fa fa-search me-2"></i> {{ __('messages.search') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
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
