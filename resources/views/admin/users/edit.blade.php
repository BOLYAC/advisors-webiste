@extends('layouts.backend')
@section('css_before')
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('users.index') }}">{{ __('List users') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit user') }} {{ $user->name }}</span>
        </nav>
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('Create user') }}</h3>
                    </div>
                    <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content">
                            <div class="form-group row">
                                <label class="col-12"
                                       for="name">{{ __('Full name')  }} </label>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="name"
                                           name="name"
                                           placeholder="{{ __('Full name') }}"
                                           value="{{ old('name', $user->name) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"
                                       for="title">{{ __('Title')  }} </label>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="title"
                                           name="title"
                                           placeholder="{{ __('Title') }}"
                                           value="{{ old('title', $user->title) }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"
                                       for="details">{{ __('Details')  }} </label>
                                <div class="col-12">
                                    <textarea type="text" class="form-control" id="details"
                                              name="details"
                                              placeholder="{{ __('Details') }}">{!! old('details', $user->details) !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12"
                                       for="details">{{ __('Email')  }} </label>
                                <div class="col-12">
                                    <input type="email" class="form-control" id="email"
                                           name="email"
                                           placeholder="{{ __('Email') }}"
                                           value="{{ old('email', $user->email) }}"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Photo') }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photo_file"
                                               name="photo_file" data-toggle="custom-file-input">
                                        <label class="custom-file-label"
                                               for="photo_file">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="animated fadeIn pb-3 row">
                                <div class="options-container col-4">
                                    <img src="{{ pageImage($user->photo_file) }}" class="img-fluid img-thumbnail"
                                         alt="">
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
                                    <a href="{{ route('users.index') }}" class="btn btn-alt-danger">
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
