@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/dropzonejs/dist/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/flatpickr/flatpickr.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('posts.index') }}">{{ __('List posts') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit post') }}</span>
        </nav>
        <div class="row">
            <div class="col-8 mx-auto">
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
                <!-- Block Tabs With Options Default Style -->
                <div class="block">
                    <form action="{{ route('posts.update',$post) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content tab-content">
                            <div class="form-group row">
                                <label class="col-12" for="date">{{ __('Date') }}</label>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-white" id="date"
                                           name="date" placeholder="Y-m-d" value="{{ $post->date ?? '' }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="js-select2">Categories</label>
                                <div class="col-12">
                                    <select class="js-select2 form-control" name="categories[]" id="js-select2"
                                            multiple>
                                        @foreach($categories as $category)
                                            @if($post->categories->contains($category))
                                                <option value="{{ $category->id }}"
                                                        selected>{{ $category->title }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                     id="custom-content-below-{{ $locale }}" role="tabpanel"
                                     aria-labelledby="custom-content-below-{{ $locale }}-tab">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="title"
                                               name="{{$locale}}[title]"
                                               value="{{ old($locale . 'title', $post->translate($locale)->title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}">{{ __('Details') . " " ."(" . $locale . ")" }} </label>
                                            <!-- CKEditor Container -->
                                            <textarea class="editors" id="js-ckeditor_{{$locale}}"
                                                      name="{{$locale}}[details]">{!! optional($post->translate($locale))->details !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_title_{{$locale}}">{{ __('Page title') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_title_{{$locale}}"
                                                   name="{{$locale}}[seo_title]"
                                                   placeholder="{{ __('Seo title') }}"
                                                   value="{{ optional($post->translate($locale))->seo_title }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_url_slug_{{$locale}}">{{ __('Friendly URL') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_url_slug_{{$locale}}"
                                                   name="{{$locale}}[seo_url_slug]"
                                                   placeholder="{{ __('Friendly URL') }}"
                                                   value="{{ optional($post->translate($locale))->seo_url_slug }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_description_{{$locale}}">{{ __('Meta Description') . " " ."(" . $locale . ")" }}</label>
                                        <!-- CKEditor Container -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_description_{{$locale}}"
                                                      name="{{$locale}}[seo_description]">
                                                {!!  optional($post->translate($locale))->seo_description !!}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_keywords_{{$locale}}">{{ __('Meta Keywords') . " " ."(" . $locale . ")" }}</label>
                                        <!-- CKEditor Container -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords_{{$locale}}"
                                                      name="{{$locale}}[seo_keywords]">{!! optional($post->translate($locale))->seo_keywords !!}</textarea>
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
                                                   name="status" {{ $post->status ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-6 row">
                                    <label for="citizen_status" class="col-12">{{ __('Citizenship') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="citizen_status"
                                                   name="citizen_status" {{ $post->citizen_status ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
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
                    </form>
                </div>
            </div>
            <!-- END Block Tabs With Options Default Style -->
            <!-- END Page Content -->
        </div>
    </div>
@endsection

@section('js_after')
    <!--  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
    <script src="{{ asset('js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dropzonejs/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script>
        jQuery(function () {
            Codebase.helpers([
                'ckeditor', 'flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs'
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
                    url: '{{ route('pages.check_slug') }}',
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
