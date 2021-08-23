@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('testimonial.index') }}">{{ __('List site testimonials') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit testimonials') }}</span>
        </nav>
        <!-- Block Tabs With Options -->
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="block">
                    <form action="{{ route('testimonial.update', $testimonial) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content">
                            <div class="form-group">
                                <label for="name">{{ __('Name')}}</label>
                                <input type="text" class="form-control" id="name"
                                       name="name"
                                       value="{{ old('name', $testimonial->name ?? '') }}"
                                       placeholder="{{ __('Enter the name') }}">
                            </div>
                            <div class="form-group row">
                                <label class="col-12"
                                       for="title">{{ __('Title')}} </label>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="title"
                                           name="title"
                                           placeholder="{{ __('Title') }}"
                                           value="{{ old('title', $testimonial->title ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"
                                       for="details">{{ __('Details')  }}</label>
                                <div class="col-12">
                                            <textarea class="form-control" id="details"
                                                      name="details">{!! optional($testimonial)->details !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"
                                       for="row_no">{{ __('Order')}} </label>
                                <div class="col-12">
                                    <input type="number" class="form-control" id="row_no"
                                           name="row_no"
                                           value="{{ old('row_no', $testimonial->row_no ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo_file" class="col-12">{{ __('Photo') }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="photo_file"
                                               name="photo_file" data-toggle="custom-file-input">
                                        <label class="custom-file-label"
                                               for="photo_file">{{ __('Choose photo') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-12">{{ __('Status') }}</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="status"
                                               name="status" {{ $testimonial->status ? 'checked' : null }}>
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-4 row">
                            <div class="col-6">
                                <a href="{{ route('testimonial.index') }}" class="btn btn-alt-danger">
                                    <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-alt-primary pull-right">
                                    <i class="fa fa-check mr-5"></i> {{ __('Update testimonials') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Block Tabs With Options Default Style -->
                <!-- END Page Content -->
            </div>
        </div>
    </div>
@endsection
