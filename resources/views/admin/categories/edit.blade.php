@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('category.index') }}">{{ __('List site categories') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit category') }}</span>
        </nav>
        <!-- Block Tabs With Options -->
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
                <div class="block">
                    <form action="{{ route('category.update', $category) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="block-content tab-content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                     id="custom-content-below-{{ $locale }}" role="tabpanel"
                                     aria-labelledby="custom-content-below-{{ $locale }}-tab">
                                    <div class="form-group">
                                        <label for="title">{{ __('Title')  . " " ."(" . $locale . ")" }}</label>
                                        <input type="text" class="form-control" id="title"
                                               name="{{$locale}}[title]"
                                               value="{{ old($locale . 'title', $category->translate($locale)->title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_title_{{$locale}}">{{ __('Page title')  . " " ."(" . $locale . ")"  }} </label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_title_{{$locale}}"
                                                   name="{{$locale}}[seo_title]"
                                                   placeholder="{{ __('Seo title') }}"
                                                   value="{{ old($locale . 'seo_title', $category->translate($locale)->seo_title ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_url_slug_{{$locale}}">{{ __('Friendly URL') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_url_slug_{{$locale}}"
                                                   name="{{$locale}}[seo_url_slug]"
                                                   placeholder="{{ __('Friendly URL') }}"
                                                   value="{{ optional($category->translate($locale))->seo_url_slug }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_description_{{$locale}}">{{ __('Meta Description') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_description_{{$locale}}"
                                                      name="{{$locale}}[seo_description]">{!! optional($category->translate($locale))->seo_description !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_keywords_{{$locale}}">{{ __('Meta Keywords') . " " ."(" . $locale . ")" }}</label>
                                        <!-- CKEditor Container -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords_{{$locale}}"
                                                      name="{{$locale}}[seo_keywords]">{!! optional($category->translate($locale))->seo_keywords !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
        </div>
    </div>
@endsection

@section('js_after')
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

        @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
        $("#seo_title_{{$locale}}").on('keyup change', function () {
            if ($(this).val() !== "") {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('category.check_slug') }}',
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
