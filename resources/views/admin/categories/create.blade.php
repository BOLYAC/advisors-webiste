@extends('layouts.backend')

@section('css_before')

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet"
          href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzonejs/dist/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('category.index') }}">{{ __('List categories') }}</a>
            <span class="breadcrumb-item active">{{ __('Create new category') }}</span>
        </nav>
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                        @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                   id="custom-content-below-{{ $locale }}-tab" data-toggle="pill"
                                   href="#custom-content-below-{{ $locale }}" role="tab"
                                   aria-controls="custom-content-below-{{ $locale }}"
                                   aria-selected="true">{{ $locale }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('Create new category') }}</h3>
                    </div>
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="block-content tab-content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                     id="custom-content-below-{{ $locale }}" role="tabpanel"
                                     aria-labelledby="custom-content-below-{{ $locale }}-tab">
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="title-{{ $locale }}">{{ __('Title') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="title-{{ $locale }}"
                                                   name="{{ $locale }}[title]"
                                                   placeholder="{{ __('Title for the page') }}"
                                                   value="{{ old($locale . 'title') }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <label class="col-12">{{ __('Photo') }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo"
                                               name="photo" data-toggle="custom-file-input">
                                        <label class="custom-file-label"
                                               for="photo">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-12">{{ __('Status') }}</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="status"
                                               name="status" checked>
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <a href="{{ route('category.index') }}" class="btn btn-alt-danger">
                                        <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                    </a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-alt-primary pull-right">
                                        <i class="fa fa-check mr-5"></i> {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Page Content -->
            </div>
        </div>
    </div>
@endsection
