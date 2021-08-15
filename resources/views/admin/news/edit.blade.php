@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
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
            <div class="col">
                <h2 class="content-heading">{{ __('Edit article') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Block Tabs With Options Default Style -->
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-block align-items-center" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#btabswo-static-home">{{__('Article details')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#btabswo-static-profile">{{ __('Article settings') }}</a>
                        </li>
                        <li class="nav-item ml-auto">
                            <div class="block-options mr-15">
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                        data-action="fullscreen_toggle"></button>
                                <button type="button" class="btn-block-option" data-toggle="block-option"
                                        data-action="content_toggle"></button>
                            </div>
                        </li>
                    </ul>
                    <form action="{{ route('news.update', $article) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="btabswo-static-home" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-12" for="date">{{ __('Date') }}</label>
                                    <div class="col-12">
                                        <input type="text" class="form-control bg-white" id="date"
                                               name="date" placeholder="Y-m-d"
                                               value="{{ old('date', $article->date ?? '') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12" for="title_en">Title [ English ]</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="title_en" name="en[title]"
                                               placeholder="{{ __('Title for the page') }}"
                                               value="{{  optional($article->translate('en'))->title  }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 text-right" for="title_ar" dir="rtl">Title [ العربية
                                        ]</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="title_ar" name="ar[title]"
                                               dir="rtl"
                                               placeholder="{{ __('Title for the page') }}"
                                               value="{{ optional($article->translate('ar'))->title }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="js-ckeditor">Details [ English ]</label>
                                        <!-- CKEditor Container -->
                                        <textarea class="editors" id="js-ckeditor"
                                                  name="en[details]">{!! optional($article->translate('en'))->details !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="js-ckeditor-ar">Details [ العربية ]</label>
                                        <!-- CKEditor Container -->
                                        <textarea id="js-ckeditor-ar"
                                                  name="ar[details]">{!! optional($article->translate('ar'))->details !!}</textarea>
                                    </div>
                                </div>
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
                            <div class="tab-pane" id="btabswo-static-profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_title_en">Page title [ English
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_title_en"
                                                       name="en[seo_title]"
                                                       placeholder="{{ __('Seo title') }}"
                                                       value="{{ optional($article->translate('en'))->seo_title }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_url_slug_en">Friendly URL [ English
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_url_slug_en"
                                                       name="en[seo_url_slug]"
                                                       placeholder="{{ __('Friendly URL') }}"
                                                       value="{{ optional($article->translate('en'))->seo_url_slug }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_description_en">Meta Description [ English
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_description_en"
                                                      name="en[seo_description]">{!!  optional($article->translate('en'))->seo_description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_keywords">Meta Keywords [ English
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords"
                                                      name="en[seo_keywords]">{!! optional($article->translate('en'))->seo_keywords !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div
                                            style="margin-top:25px;padding: 15px;border: 1px dashed #ddd;background: #f9f9f9;overflow: hidden;">
                                            <h4 class="h5 mb-5">
                                                <a id="title_in_engines_en"
                                                   href="{{ config('app.url'). '/' . $article->translate('en')->seo_url_slug ?? '' }}"
                                                   target="_blank">{{ $article->translate('en')->seo_title }}</a>
                                            </h4>
                                            <div id="url_in_engines_en"
                                                 class="font-sm text-earth mb-5"> {{ config('app.url'). '/' . $article->translate('en')->seo_url_slug ?? '' }}</div>
                                            <p id="desc_in_engines_en"
                                               class="font-sm text-muted">{!! $article->translate('en')->seo_description ?? '' !!}</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="mt-3">
                                                <i class="fa fa-info"></i>
                                                <small>{{ __('Mange your page title, meta description, keywords and unique friendly URL. This help you to manage how this topic shows up on search engines.') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_title_ar">Page title [ العربية
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_title_ar"
                                                       name="ar[seo_title]"
                                                       data-slug="#lang-en"
                                                       placeholder="{{ __('Seo title') }}"
                                                       value="{{ optional($article->translate('ar'))->seo_title }}">
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_url_slug_ar">Friendly URL [ العربية
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_url_slug_ar"
                                                       name="ar[seo_url_slug]"
                                                       placeholder="{{ __('Friendly URL') }}"
                                                       value="{{ optional($article->translate('ar'))->seo_url_slug }}">
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_description_ar">Meta Description [ العربية
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_description_ar"
                                                      name="ar[seo_description]">{!! optional($article->translate('ar'))->seo_description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_keywords_ar">Meta Keywords [ العربية
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords_ar"
                                                      name="ar[seo_keywords]">{!! optional($article->translate('ar'))->seo_keywords !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right" dir="rtl">
                                        <div
                                            style="margin-top:25px;padding: 15px;border: 1px dashed #ddd;background: #f9f9f9;overflow: hidden;">
                                            <h4 class="h5 mb-5">
                                                <a id="title_in_engines_ar"
                                                   href="{{ config('app.url'). '/' . optional($article->translate('ar'))->seo_url_slug }}"
                                                   target="_blank">{{ optional($article->translate('ar'))->seo_title }}</a>
                                            </h4>
                                            <div id="url_in_engines_ar"
                                                 class="font-sm text-earth mb-5"> {{ config('app.url'). '/' . optional($article->translate('ar'))->seo_url_slug }}</div>
                                            <p id="desc_in_engines_ar"
                                               class="font-sm text-muted">{!! optional($article->translate('ar'))->seo_description !!}</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="mt-3">
                                                <i class="fa fa-info"></i>
                                                <small>{{ __('Mange your page title, meta description, keywords and unique friendly URL. This help you to manage how this topic shows up on search engines.') }}</small>
                                            </div>
                                        </div>
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
        @endsection

        @section('js_after')
            <!--  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
                <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
                <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
                <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
                <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
                <script>
                    jQuery(function () {
                        Codebase.helpers(['ckeditor', 'flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
                    });
                    CKEDITOR.replace('js-ckeditor-ar', {
                        contentsLangDirection: 'rtl'
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
                    $("#seo_title_en").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#title_in_engines_en").text($(this).val());
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('news.check_slug') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    title: $(this).val()
                                },
                                success: function (data) {
                                    $("#seo_url_slug_en").val(data.slug);
                                }
                            });
                        } else {
                            $("#title_in_engines_en").text("{{ optional($article->translate('en'))->seo_title }}");
                        }

                    });
                    $("#seo_description_en").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#desc_in_engines_en").text($(this).val());
                        } else {
                            $("#desc_in_engines_en").text("{{ optional($article->translate('en'))->seo_description }}");
                        }
                    });
                    $("#seo_url_slug_en").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#url_in_engines_en").text("<?php echo url(''); ?>/news/" + slugify($(this).val()));
                        } else {
                            $("#url_in_engines_en").text("{{ config('app.url'). '/news/' . optional($article->translate('en'))->seo_url_slug }}");
                        }
                    });
                    $("#seo_title_ar").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#title_in_engines_ar").text($(this).val());
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('posts.check_slug') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    title: $(this).val()
                                },
                                success: function (data) {
                                    $("#seo_url_slug_ar").val(data.slug);
                                }
                            });
                        } else {
                            $("#title_in_engines_ar").text("{{ optional($article->translate('ar'))->seo_title }}");
                        }
                    });
                    $("#seo_description_ar").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#desc_in_engines_ar").text($(this).val());
                        } else {
                            $("#desc_in_engines_ar").text("{{ optional($article->translate('ar'))->seo_description }}");
                        }
                    });
                    $("#seo_url_slug_ar").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#url_in_engines_ar").text("<?php echo url(''); ?>/news/" + slugify($(this).val()));
                        } else {
                            $("#url_in_engines_ar").text("{{ config('app.url'). '/news/' . optional($article->translate('ar'))->seo_url_slug }}");
                        }
                    });
                </script>
@endsection
