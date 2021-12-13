@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('Services page') }}</span>
        </nav>
        <div class="row">
            <div class="col-7">
                <!-- Block Tabs With Options Default Style -->
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
            </div>
        </div>
        <form action="{{ route('servicesPage.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="block">
                        <div class="block-content tab-content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                     id="custom-content-below-{{ $locale }}" role="tabpanel"
                                     aria-labelledby="custom-content-below-{{ $locale }}-tab">
                                    <div class="form-group">
                                        <label
                                            for="first_title">{{ __('first title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="first_title"
                                               name="{{$locale}}[first_title]"
                                               value="{{ old($locale . 'first_title', $servicesPage->translate($locale)->first_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>{{ __('first details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[first_details]">{!! optional($servicesPage->translate($locale))->first_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="second_title">{{ __('Second title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="second_title"
                                               name="{{$locale}}[second_title]"
                                               value="{{ old($locale . 'second_title', $servicesPage->translate($locale)->second_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}">{{ __('Second details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[second_details]">{!! optional($servicesPage->translate($locale))->second_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="third_title">{{ __('Third title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="third_title"
                                               name="{{$locale}}[third_title]"
                                               value="{{ old($locale . 'third_title', $servicesPage->translate($locale)->third_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}">{{ __('Third details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[third_details]">{!! optional($servicesPage->translate($locale))->third_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="fourth_title">{{ __('Title fourth')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="fourth_title"
                                               name="{{$locale}}[fourth_title]"
                                               value="{{ old($locale . 'fourth_title', $servicesPage->translate($locale)->fourth_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}">{{ __('Fourth details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[fourth_details]">{!! optional($servicesPage->translate($locale))->fourth_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="fifth_title">{{ __('Fifth title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="fifth_title"
                                               name="{{$locale}}[fifth_title]"
                                               value="{{ old($locale . 'fifth_title', $servicesPage->translate($locale)->fifth_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}">{{ __('Fifth details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[fifth_details]">{!! optional($servicesPage->translate($locale))->fifth_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="sixth_title">{{ __('Sixth title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="sixth_title"
                                               name="{{$locale}}[sixth_title]"
                                               value="{{ old($locale . 'sixth_title', $servicesPage->translate($locale)->sixth_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}">{{ __('Sixth details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[sixth_details]">{!! optional($servicesPage->translate($locale))->sixth_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="seventh_title">{{ __('Seventh title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="seventh_title"
                                               name="{{$locale}}[seventh_title]"
                                               value="{{ old($locale . 'seventh_title', $servicesPage->translate($locale)->seventh_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}">{{ __('Seventh details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[seventh_details]">{!! optional($servicesPage->translate($locale))->seventh_details !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="form-group col-6 row">
                                    <label for="status" class="col-12">{{ __('Status') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="status"
                                                   name="status" {{ $servicesPage->status ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-4 row">
                            <div class="col-6">
                                <a href="{{ route('site-pages.index') }}" class="btn btn-alt-danger">
                                    <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-alt-primary pull-right">
                                    <i class="fa fa-check mr-5"></i> {{ __('Update page') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="block">
                        <div class="block-content">
                            <div class="form-group row">
                                <label class="col-12">{{ __('First image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                               id="file-first_image"
                                               name="first_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="first_image">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $servicesPage->first_image ?? '' !== null)
                                        <img src="{{ pageImage( $servicesPage->first_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Second image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="second_image"
                                               name="second_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="second_image">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $servicesPage->second_image ?? '' !== null)
                                        <img src="{{ pageImage( $servicesPage->second_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Third image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="third_image"
                                               name="third_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="third_image">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $servicesPage->third_image ?? '' !== null)
                                        <img src="{{ pageImage( $servicesPage->third_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Fourth image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fourth_image"
                                               name="fourth_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="fourth_image">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $servicesPage->fourth_image ?? '' !== null)
                                        <img src="{{ pageImage( $servicesPage->fourth_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Fifth image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fifth_image"
                                               name="fifth_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="fifth_image">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $servicesPage->fifth_image ?? '' !== null)
                                        <img src="{{ pageImage( $servicesPage->fifth_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Sixth image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="sixth_image"
                                               name="sixth_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="sixth_image">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $servicesPage->sixth_image ?? '' !== null)
                                        <img src="{{ pageImage( $servicesPage->sixth_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Sixth image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="seventh_image"
                                               name="seventh_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="seventh_image">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $servicesPage->seventh_image ?? '' !== null)
                                        <img src="{{ pageImage( $servicesPage->seventh_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Block Tabs With Options Default Style -->
        </form>
    </div>
    <!-- END Block Tabs With Options Default Style -->
    <!-- END Page Content -->
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/plugins/simplemde/simplemde.min.js') }}"></script>
    <script>
        jQuery(function () {
            Codebase.helpers(['summernote', 'ckeditor', 'simplemde']);
        });
    </script>
@endsection
