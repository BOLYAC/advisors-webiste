@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('news.index') }}">{{ __('News') }}</a>
            <span class="breadcrumb-item active">{{ __('Create new') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Create new') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12" for="date">{{ __('Date') }}</label>
                        <div class="col-12">
                            <input type="text" class="form-control bg-white" id="date"
                                   name="date" placeholder="Y-m-d" value="{{ old('date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">{{ __('Title') }} [ English ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="en[title]"
                                   placeholder="{{ __('Title for the post') }}" value="{{ old('en.title') }}">
                        </div>
                    </div>
                    <div class="form-group row" dir="rtl">
                        <label class="col-12" for="example-text-input">{{ __('Title') }} [ العربية
                            ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="ar[title]"
                                   placeholder="{{ __('Title for the post') }}" value="{{ old('ar.title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="js-ckeditor">{{ __('Details') }} [ English ]</label>
                            <!-- CKEditor Container -->
                            <textarea id="js-ckeditor" name="en[details]">{!! old('en.details') !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="js-ckeditor-ar">{{ __('Details') }} [ العربية
                                ]</label>
                            <!-- CKEditor Container -->
                            <textarea id="js-ckeditor-ar" name="ar[details]">{!! old('ar.details') !!}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-12">{{ __('Photo') }}</label>
                        <div class="col-12">
                            <div class="custom-file">
                                <input type="file" class="photo_file" id="example-file-input-custom"
                                       name="photo_file" data-toggle="custom-file-input">
                                <label class="custom-file-label"
                                       for="example-file-input-custom">{{ __('Choose file') }}</label>
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
                            <a href="{{ route('posts.index') }}" class="btn btn-alt-danger">
                                <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-alt-primary pull-right">
                                <i class="fa fa-check mr-5"></i> {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection

@section('js_after')
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script>
        jQuery(function () {
            Codebase.helpers([
                'ckeditor', 'flatpickr', 'datepicker'
            ]);
        });
        CKEDITOR.replace('js-ckeditor-ar', {
            contentsLangDirection: 'rtl'
        });

        $("#date").flatpickr();
    </script>
@endsection
