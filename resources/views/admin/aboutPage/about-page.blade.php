@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{asset('js/plugins/simplemde/simplemde.min.css')}}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="breadcrumb-item active">{{ __('About page') }}</span>
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
        <form action="{{ route('aboutPage.update') }}" method="post" enctype="multipart/form-data">
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
                                            for="about_us_title">{{ __('About us title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="about_us_title"
                                               name="{{$locale}}[about_us_title]"
                                               value="{{ old($locale . 'about_us_title', $aboutPage->translate($locale)->about_us_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>{{ __('About us details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[about_us_details]">{!! optional($aboutPage->translate($locale))->about_us_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="a_message_from_the_owners_tile">{{ __('A message from the owners tile')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="a_message_from_the_owners_tile"
                                               name="{{$locale}}[a_message_from_the_owners_tile]"
                                               value="{{ old($locale . 'a_message_from_the_owners_tile', $aboutPage->translate($locale)->a_message_from_the_owners_tile ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>{{ __('a message from the owners details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[a_message_from_the_owners_details]">{!! optional($aboutPage->translate($locale))->a_message_from_the_owners_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="our_mission_title">{{ __('Our mission title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="our_mission_title"
                                               name="{{$locale}}[our_mission_title]"
                                               value="{{ old($locale . 'our_mission_title', $aboutPage->translate($locale)->our_mission_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>{{ __('Our mission details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[our_mission_details]">{!! optional($aboutPage->translate($locale))->our_mission_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="our_vision_title">{{ __('Our vision title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="our_vision_title"
                                               name="{{$locale}}[our_vision_title]"
                                               value="{{ old($locale . 'our_vision_title', $aboutPage->translate($locale)->our_vision_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>{{ __('Our vision details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[our_vision_details]">{!! optional($aboutPage->translate($locale))->our_vision_details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="team_title">{{ __('Team title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="team_title"
                                               name="{{$locale}}[team_title]"
                                               value="{{ old($locale . 'team_title', $aboutPage->translate($locale)->team_title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label>{{ __('Team details') . " " ."(" . $locale . ")" }} </label>
                                            <textarea class="form-control js-summernote"
                                                      name="{{$locale}}[team_details]">{!! optional($aboutPage->translate($locale))->team_details !!}</textarea>
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
                                                   name="status" {{ $aboutPage->status ? 'checked' : null }}>
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
                                <label class="col-12">{{ __('About us image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file-about_us_image"
                                               name="about_us_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="file-photo">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $aboutPage->about_us_image ?? '' !== null)
                                        <img src="{{ pageImage( $aboutPage->about_us_image ?? '' ) }}" id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">{{ __('A message from the owners image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input"
                                               id="file-a_message_from_the_owners_image"
                                               name="a_message_from_the_owners_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="file-photo">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $aboutPage->a_message_from_the_owners_image ?? '' !== null)
                                        <img src="{{ pageImage( $aboutPage->a_message_from_the_owners_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Our mission image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file-our_mission_image"
                                               name="our_mission_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="file-photo">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $aboutPage->a_message_from_the_owners_image ?? '' !== null)
                                        <img src="{{ pageImage( $aboutPage->a_message_from_the_owners_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Our vision image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file-our_vision_image"
                                               name="our_vision_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="file-photo">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $aboutPage->our_vision_image ?? '' !== null)
                                        <img src="{{ pageImage( $aboutPage->our_vision_image ?? '' ) }}"
                                             id="faviconImg"
                                             style="width: 80px; height: auto;">
                                    @else
                                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image"
                                             id="faviconImg" style="width: 80px; height: auto;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Team image')  }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file-team_image"
                                               name="team_image" data-toggle="custom-file-input"
                                        >
                                        <label class="custom-file-label"
                                               for="file-photo">{{ __('Choose file') }}</label>
                                    </div>
                                    <div class="text-danger float-right font-w700 mt-1"></div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    @if ( $aboutPage->team_image ?? '' !== null)
                                        <img src="{{ pageImage( $aboutPage->team_image ?? '' ) }}"
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
