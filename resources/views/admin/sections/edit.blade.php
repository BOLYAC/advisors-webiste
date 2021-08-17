@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">{{ __('List categories') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit category') }}</span>
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
                        <h3 class="block-title">{{ __('Edit new category') }}</h3>
                    </div>
                    <form action="{{ route('categories.update', $section) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content tab-content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                     id="custom-content-below-{{ $locale }}" role="tabpanel"
                                     aria-labelledby="custom-content-below-{{ $locale }}-tab">
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="title_{{$local}}">{{ __('Title') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="title_{{$local}}" name="{{$locale}}[title]"
                                                   placeholder="{{ __('Title for the page') }}"
                                                   value="{{  optional($section->translate($locale))->title  }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <label class="col-12">{{ __('Icon') }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="example-file-input-custom"
                                               name="icon" data-toggle="custom-file-input">
                                        <label class="custom-file-label"
                                               for="example-file-input-custom">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <a href="{{ route('categories.index') }}" class="btn btn-alt-danger">
                                        <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                    </a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-alt-primary pull-right">
                                        <i class="fa fa-check mr-5"></i> {{ __('Save') }}
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
