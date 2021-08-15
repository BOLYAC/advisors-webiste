@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('category.index') }}">{{ __('List site categories') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit category') }}</span>
        </nav>
        <!-- Block Tabs With Options -->
        <div class="row">
            <div class="col">
                <h2 class="content-heading">{{ __('Edit category') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Block Tabs With Options Default Style -->
                <div class="block">
                    <ul class="nav nav-tabs nav-tabs-block align-items-center" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#btabswo-static-home">{{__('Page details')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#btabswo-static-profile">{{ __('Seo settings') }}</a>
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
                    <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="btabswo-static-home" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-12" for="title_en">Title [ English ]</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="title" name="en[title]"
                                               placeholder="{{ __('Title for the page') }}"
                                               value="{{ optional($category->translate('en'))->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 text-right" for="title_ar" dir="rtl">Title [ العربية
                                        ]</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="title_ar" name="ar[title]"
                                               dir="rtl"
                                               placeholder="{{ __('Title for the page') }}"
                                               value="{{ optional($category->translate('ar'))->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12">{{ __('Photo') }}</label>
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input type="file" class="photo_file" id="photo"
                                                   name="photo" data-toggle="custom-file-input">
                                            <label class="custom-file-label"
                                                   for="photo">{{ __('Choose photo') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12">{{ __('Icon') }}</label>
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input type="file" class="photo_file" id="icon"
                                                   name="icon" data-toggle="custom-file-input">
                                            <label class="custom-file-label"
                                                   for="icon">{{ __('Choose icon') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-12">{{ __('Status') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="status"
                                                   name="status" {{ $category->status ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
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
                                                       value="{{ optional($category->translate('en'))->seo_title }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_url_slug_en">Friendly URL [ English
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_url_slug_en"
                                                       name="en[seo_url_slug]"
                                                       placeholder="{{ __('Friendly URL') }}"
                                                       value="{{ optional($category->translate('en'))->seo_url_slug }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_description_en">Meta Description [ English
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_description_en"
                                                      name="en[seo_description]">{!! optional($category->translate('en'))->seo_description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_keywords">Meta Keywords [ English
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords"
                                                      name="en[seo_keywords]">{!! optional($category->translate('en'))->seo_keywords !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div
                                            style="margin-top:25px;padding: 15px;border: 1px dashed #ddd;background: #f9f9f9;overflow: hidden;">
                                            <h4 class="h5 mb-5">
                                                <a id="title_in_engines_en"
                                                   href="{{ config('app.url'). '/' . $category->translate('en')->seo_url_slug ?? '' }}"
                                                   target="_blank">{{ $category->translate('en')->seo_title }}</a>
                                            </h4>
                                            <div id="url_in_engines_en"
                                                 class="font-sm text-earth mb-5"> {{ config('app.url'). '/' . $category->translate('en')->seo_url_slug ?? '' }}</div>
                                            <p id="desc_in_engines_en"
                                               class="font-sm text-muted">{!! $category->translate('en')->seo_description ?? '' !!}</p>
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
                                                       value="{{ optional($category->translate('ar'))->seo_title }}">
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_url_slug_ar">Friendly URL [ العربية
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_url_slug_ar"
                                                       name="ar[seo_url_slug]"
                                                       placeholder="{{ __('Friendly URL') }}"
                                                       value="{{ optional($category->translate('ar'))->seo_url_slug }}">
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_description_ar">Meta Description [ العربية
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_description_ar"
                                                      name="ar[seo_description]">{!! optional($category->translate('ar'))->seo_description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_keywords_ar">Meta Keywords [ العربية
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords_ar"
                                                      name="ar[seo_keywords]">{!! optional($category->translate('ar'))->seo_keywords !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right" dir="rtl">
                                        <div
                                            style="margin-top:25px;padding: 15px;border: 1px dashed #ddd;background: #f9f9f9;overflow: hidden;">
                                            <h4 class="h5 mb-5">
                                                <a id="title_in_engines_ar"
                                                   href="{{ config('app.url'). '/' . optional($category->translate('ar'))->seo_url_slug }}"
                                                   target="_blank">{{ optional($category->translate('ar'))->seo_title }}</a>
                                            </h4>
                                            <div id="url_in_engines_ar"
                                                 class="font-sm text-earth mb-5"> {{ config('app.url'). '/' . optional($category->translate('ar'))->seo_url_slug }}</div>
                                            <p id="desc_in_engines_ar"
                                               class="font-sm text-muted">{!! optional($category->translate('ar'))->seo_description !!}</p>
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
                                <a href="{{ route('category.index') }}" class="btn btn-alt-danger">
                                    <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-alt-primary pull-right">
                                    <i class="fa fa-check mr-5"></i> {{ __('Update page') }}
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
                <script>
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
                                url: '{{ route('category.check_slug') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    title: $(this).val()
                                },
                                success: function (data) {
                                    $("#seo_url_slug_en").val(data.slug);
                                }
                            });
                        } else {
                            $("#title_in_engines_en").text("{{ optional($category->translate('en'))->seo_title }}");
                        }
                    });
                    $("#seo_description_en").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#desc_in_engines_en").text($(this).val());
                        } else {
                            $("#desc_in_engines_en").text("{{ optional($category->translate('en'))->seo_description }}");
                        }
                    });
                    $("#seo_url_slug_en").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#url_in_engines_en").text("<?php echo url(''); ?>/" + slugify($(this).val()));
                        } else {
                            $("#url_in_engines_en").text("{{ config('app.url'). '/' . optional($category->translate('en'))->seo_url_slug }}");
                        }
                    });
                    $("#seo_title_ar").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#title_in_engines_ar").text($(this).val());
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('pages.check_slug') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    title: $(this).val()
                                },
                                success: function (data) {
                                    $("#seo_url_slug_ar").val(data.slug);
                                }
                            });
                        } else {
                            $("#title_in_engines_ar").text("{{ optional($category->translate('ar'))->seo_title }}");
                        }
                    });
                    $("#seo_description_ar").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#desc_in_engines_ar").text($(this).val());
                        } else {
                            $("#desc_in_engines_ar").text("{{ optional($category->translate('ar'))->seo_description }}");
                        }
                    });
                    $("#seo_url_slug_ar").on('keyup change', function () {
                        if ($(this).val() !== "") {
                            $("#url_in_engines_ar").text("<?php echo url(''); ?>/" + slugify($(this).val()));
                        } else {
                            $("#url_in_engines_ar").text("{{ config('app.url'). '/' . optional($category->translate('ar'))->seo_url_slug }}");
                        }
                    });
                </script>
@endsection
