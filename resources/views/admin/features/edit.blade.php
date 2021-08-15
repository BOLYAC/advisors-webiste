@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('features.index') }}">{{ __('List features') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit feature') }}</span>
        </nav>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Edit new feature') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('features.update', $feature) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-12" for="title-en">{{ __('Title') }} [ English ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="title-en" name="en[title]"
                                   placeholder="{{ __('Title for the page') }}" value="{{ old('en:title', optional($feature->translate('en'))->title) }}">
                        </div>
                    </div>
                    <div class="form-group row" dir="rtl">
                        <label class="col-12" for="title-ar">{{ __('Title') }} [ العربية
                            ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="title-ar" name="ar[title]"
                                   placeholder="{{ __('Title for the page') }}" value="{{ old('ar:title', optional($feature->translate('ar'))->title) }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-12">{{ __('Photo') }} [ English ]</label>
                        <div class="col-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="icon"
                                       name="icon" data-toggle="custom-file-input"
                                >
                                <label class="custom-file-label"
                                       for="icon">{{ __('Choose file') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <a href="{{ route('features.index') }}" class="btn btn-alt-danger">
                                <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-alt-primary pull-right">
                                <i class="fa fa-check mr-5"></i> {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Page Content -->
    </div>
@endsection
