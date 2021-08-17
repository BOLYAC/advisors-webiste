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
            <a class="breadcrumb-item" href="{{ route('news.index') }}">{{ __('List news') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit article') }}</span>
        </nav>
        <!-- Block Tabs With Options -->

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
                <!-- Block Tabs With Options Default Style -->
                <div class="block">
                    <form action="{{ route('news.update', $article) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content tab-content">
                            <div class="form-group row">
                                <label class="col-12" for="date">{{ __('Date') }}</label>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-white" id="date"
                                           name="date" placeholder="Y-m-d"
                                           value="{{ old('date', $article->date ?? '') }}">
                                </div>
                            </div>
                            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                     id="custom-content-below-{{ $locale }}" role="tabpanel"
                                     aria-labelledby="custom-content-below-{{ $locale }}-tab">
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="title_{{ $locale }}">{{ __('Title') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="title_{{ $locale }}"
                                                   name="{{ $locale }}[title]"
                                                   placeholder="{{ __('Title for the page') }}"
                                                   value="{{  optional($article->translate($locale))->title  }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{ $locale }}">{{ __('Details') . " " ."(" . $locale . ")" }}</label>
                                            <!-- CKEditor Container -->
                                            <textarea class="editors" id="js-ckeditor_{{ $locale }}"
                                                      name="{{ $locale }}[details]">{!! optional($article->translate($locale))->details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_title_{{ $locale }}">{{ __('Page title') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_title_{{ $locale }}"
                                                   name="{{ $locale }}[seo_title]"
                                                   placeholder="{{ __('Seo title') }}"
                                                   value="{{ optional($article->translate($locale))->seo_title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_url_slug_{{ $locale }}">{{ __('Friendly URL') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_url_slug_{{ $locale }}"
                                                   name="{{ $locale }}[seo_url_slug]"
                                                   placeholder="{{ __('Friendly URL') }}"
                                                   value="{{ optional($article->translate($locale))->seo_url_slug }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_description_en">{{ __('Meta Description') . " " ."(" . $locale . ")" }}</label>
                                        <!-- CKEditor Container -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_description_{{$locale}}"
                                                      name="{{ $locale }}[seo_description]">{!!  optional($article->translate($locale))->seo_description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_keywords_{{ $locale }}">{{ __('Meta Keywords') . " " ."(" . $locale . ")" }}</label>
                                        <!-- CKEditor Container -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords_{{ $locale }}"
                                                      name="{{ $locale }}[seo_keywords]">{!! optional($article->translate($locale))->seo_keywords !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <label for="status" class="col-12">{{ __('Status') }}</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="status"
                                               name="status" {{ $article->status ? 'checked' : null }}>
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
                        </div>
                        <div class="form-group p-4 row">
                            <div class="col-6">
                                <a href="{{ route('news.index') }}" class="btn btn-alt-danger">
                                    <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-alt-primary pull-right">
                                    <i class="fa fa-check mr-5"></i> {{ __('Update') }}
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

@section('js_after')
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script>
        jQuery(function () {
            Codebase.helpers([
                'ckeditor', 'flatpickr', 'datepicker'
            ]);
            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
            CKEDITOR.replace('js-ckeditor_{{ $locale }}');
            @endforeach
        });

        $("#date").flatpickr();

        // Js Slug
        function slugify(string) {
            return string
                .toString()
                .trim()
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^\w\-]+/g, "")
                .replace(/\-\-+/g, "-")
                .replace(/^-+/, "")
                .replace(/-+$/, "");
        }

        // Fields on change
        @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
        $("#seo_title_{{$locale}}").on('keyup change', function () {
            if ($(this).val() !== "") {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('news.check_slug') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: $(this).val()
                    },
                    success: function (data) {
                        $("#seo_url_slug_{{$locale}}").val(data.slug);
                    }
                });
            }
        });
        @endforeach
    </script>
@endsection
