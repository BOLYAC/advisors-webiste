@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('insta-stories.index') }}">{{ __('List site stories') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit story') }}</span>
        </nav>
        <!-- Block Tabs With Options -->
        <div class="row">
            <div class="col-8">
                <div class="block">
                    <form action="{{ route('insta-stories.update', $instaStory) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content">
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
                            <div class="form-group">
                                <label for="name">{{ __('Link')}}</label>
                                <input type="text" class="form-control" id="link_story"
                                       name="link_story"
                                       value="{{ old('link_story', $instaStory->link_story ?? '') }}"
                                       placeholder="{{ __('Enter the link') }}">
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('More Images') }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="photos"
                                               name="photos[]" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label"
                                               for="photos">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>
                            @if ($instaStory->images)
                                <div class="galeri-container">
                                    <div class="row gutters-tiny js-gallery img-fluid-100 js-gallery-enabled">
                                        @foreach ($instaStory->images as $i => $image)
                                            <div class="col-4" id="{{ $image->id }}">
                                                <a class="img-link img-link-simple img-thumb img-lightbox"
                                                   href="{{ pageImage($image->photo_file) }}">
                                                    <img class="img-fluid rounded-top"
                                                         src="{{ pageImage($image->photo_file) }}">
                                                </a>
                                                <div class="form-group">
                                                    <input class="form-control form-control-sm" type="number"
                                                           name="row_no_image[{{$image->id}}]"
                                                           value="{{ $image->row_no }}">
                                                </div>
                                                <div class="checkbox">
                                                    <input id="check-{{ $image->id }}" type="checkbox"
                                                           name="imageDestroy[]"
                                                           value="{{ $image->id }}">
                                                    <label for="check-{{ $image->id }}">{{__('Delete') }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <p>Empty</p>
                            @endif
                            <div class="form-group row">
                                <label class="col-12"
                                       for="row_no">{{ __('Order')}} </label>
                                <div class="col-12">
                                    <input type="number" class="form-control" id="row_no"
                                           name="row_no"
                                           value="{{ old('row_no', $instaStory->row_no ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-12">{{ __('Status') }}</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="status"
                                               name="status" {{ $instaStory->status ? 'checked' : null }}>
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-4 row">
                            <div class="col-6">
                                <a href="{{ route('insta-stories.index') }}" class="btn btn-alt-danger">
                                    <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-alt-primary pull-right">
                                    <i class="fa fa-check mr-5"></i> {{ __('Update Story') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Block Tabs With Options Default Style -->
                <!-- END Page Content -->
            </div>
            <div class="col-4">
                <div class="col-12">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ __('Image') }}</h3>
                        </div>
                        <div class="block-content">
                            <div class="animated fadeIn pb-3">
                                <div class="options-container">
                                    <img class="img-fluid options-item" src="{{ pageImage($instaStory->photo_file) }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
