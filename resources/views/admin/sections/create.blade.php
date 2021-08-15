@extends('layouts.backend')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
            <span class="breadcrumb-item active">{{ __('Create new') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Create new') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">{{ __('Title') }} [ English ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="en[title]"
                                   placeholder="{{ __('Title') }}" value="{{ old('en.title') }}">
                        </div>
                    </div>
                    <div class="form-group row" dir="rtl">
                        <label class="col-12" for="example-text-input">{{ __('Title') }} [ العربية
                            ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="example-text-input" name="ar[title]"
                                   placeholder="{{ __('Title') }}" value="{{ old('ar.title') }}">
                        </div>
                    </div>

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
