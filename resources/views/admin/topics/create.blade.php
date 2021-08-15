@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Create new page') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Create new page') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('site-pages.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">{{ __('Title') }}</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="title"
                                   placeholder="{{ __('Title for the page') }}" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="js-ckeditor">{{ __('Details') }}</label>
                            <!-- CKEditor Container -->
                            <textarea id="js-ckeditor" name="details">{!! old('details') !!}</textarea>
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
                        <div class="col-6">
                            <a href="{{ url()->previous() }}" class="btn btn-alt-danger">
                                <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-alt-primary pull-right">
                                <i class="fa fa-check mr-5"></i> {{ __('Create page') }}
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
    <!--  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        jQuery(function () {
            Codebase.helpers(['summernote', 'ckeditor', 'simplemde']);
        });
    </script>
@endsection
