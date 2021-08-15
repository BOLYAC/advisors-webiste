@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('projects.index') }}">{{ __('List site projects') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit project') }}</span>
        </nav>
        <!-- Block Tabs With Options -->
        <div class="row">
            <div class="col">
                <h2 class="content-heading">{{ __('Edit project') }}</h2>
            </div>
        </div>
        <form action="{{ route('projects.update',$project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8">
                    <!-- Block Tabs With Options Default Style -->
                    <div class="block">
                        <ul class="nav nav-tabs nav-tabs-block align-items-center" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#btabswo-static-home">{{__('project details')}}</a>
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
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="btabswo-static-home" role="tabpanel">
                                <div class="form-group row">
                                    <label class="col-12" for="title_en">Title [ English ]</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="title" name="en[title]"
                                               placeholder="{{ __('Title for the page') }}"
                                               value="{{ old('en.title', optional($project->translate('en'))->title) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 text-right" for="title_ar" dir="rtl">Title [ العربية
                                        ]</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="title_ar" name="ar[title]"
                                               dir="rtl"
                                               placeholder="{{ __('Title for the page') }}"
                                               value="{{ old('ar.title', optional($project->translate('ar'))->title) }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="js-ckeditor">Details [ English ]</label>
                                        <!-- CKEditor Container -->
                                        <textarea class="editors" id="js-ckeditor"
                                                  name="en[details]">{!! old('en.details', optional($project->translate('en'))->details) !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="js-ckeditor-ar">Details [ العربية ]</label>
                                        <!-- CKEditor Container -->
                                        <textarea id="js-ckeditor-ar"
                                                  name="ar[details]">{!! old('ar.details', optional($project->translate('ar'))->details) !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="featured" class="col-12">{{ __('Active') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="featured"
                                                   name="featured" {{ $project->featured ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12">{{ __('Photo') }}</label>
                                    <div class="col-12">
                                        <div class="custom-file">
                                            <input type="file" class="form-control-file" id="photo_file"
                                                   name="photo_file" data-toggle="custom-file-input">
                                            <label class="custom-file-label"
                                                   for="photo_file">{{ __('Choose file') }}</label>
                                        </div>
                                    </div>
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
                                @if ($project->images)
                                    <div class="galeri-container">
                                        <div class="row galeri">
                                            @foreach ($project->images as $i => $image)
                                                <div class="col-md-3" id="{{ $image->id }}">
                                                    <a href="{{ pageImage($image->full) }}" data-fancybox="galeri">
                                                        <img class="img-fluid" src="{{ pageImage($image->full) }}"
                                                             class="one-img">
                                                    </a>
                                                    <div class="checkbox">
                                                        <input id="check-{{ $i }}" type="checkbox" name="imageDestroy[]"
                                                               value="{{ $image->id }}">
                                                        <label for="check-{{ $i }}">{{__('Delete') }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <p>Empty</p>
                                @endif
                                <div class="form-group row">
                                    <label for="city" class="col-12">{{ __('City') }}</label>
                                    <div class="col-12">
                                        <select class="form-control" name="city" id="city">
                                            <option value="1" {{ $project->city == '1' ? 'selected' : '' }}>Istanbul
                                            </option>
                                            <option value="2" {{ $project->city == '2' ? 'selected' : '' }}>Bodrum
                                            </option>
                                            <option value="3" {{ $project->city == '3' ? 'selected' : '' }}>Antalya
                                            </option>
                                            <option value="4" {{ $project->city == '4' ? 'selected' : '' }}>Sapanca
                                            </option>
                                            <option value="5" {{ $project->city == '5' ? 'selected' : '' }}>Trapzon
                                            </option>
                                            <option value="6" {{ $project->city == '6' ? 'selected' : '' }}>Kıbrıs
                                            </option>
                                            <option value="7" {{ $project->city == '7' ? 'selected' : '' }}>Bursa
                                            </option>
                                            <option value="8" {{ $project->city == '8' ? 'selected' : '' }}>Izmir
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="location" class="col-12">{{ __('Location') }} [ English ]</label>
                                    <div class="col-12">
                                        <input class="form-control" type="text" name="en[location]"
                                               value="{{ old('en.location', optional($project->translate('en'))->location) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="location" class="col-12">{{ __('Location') }} [ العربية ]</label>
                                    <div class="col-12">
                                        <input class="form-control" type="text" name="ar[location]"
                                               value="{{ old('ar.location', optional($project->translate('ar'))->location) }}"
                                               dir="rtl"
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-5 row">
                                        <label for="blocks_number" class="col-6">{{ __('Number blocks') }}</label>
                                        <div class="col-12">
                                            <input class="form-control" type="number" name="blocks_number"
                                                   value="{{ old('blocks_number', optional($project)->blocks_number) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-4 row">
                                        <label for="floors_number" class="col-12">{{ __('Number floors') }}</label>
                                        <div class="col-12">
                                            <input class="form-control" type="number" name="floors_number"
                                                   value="{{ old('floors_number', optional($project)->floors_number) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-4 row">
                                        <label for="flats_number" class="col-12">{{ __('Number flats') }}</label>
                                        <div class="col-12">
                                            <input class="form-control" type="number" name="flats_number"
                                                   value="{{ old('flats_number', optional($project)->flats_number) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-5 row">
                                        <label for="flats_number" class="col-12">{{ __('Lowest price') }}</label>
                                        <div class="col-12">
                                            <input class="form-control" type="number" name="lowest_price"
                                                   value="{{ old('lowest_price', optional($project)->lowest_price) }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-4 row">
                                        <label for="highest_price" class="col-12">{{ __('Max price') }}</label>
                                        <div class="col-12">
                                            <input class="form-control" type="number" name="highest_price"
                                                   value="{{ old('highest_price' , optional($project)->highest_price) }}">
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
                                                       value="{{ old('en.seo_title', optional($project->translate('en'))->seo_title) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_url_slug_en">Friendly URL [ English
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_url_slug_en"
                                                       name="en[seo_url_slug]"
                                                       placeholder="{{ __('Friendly URL') }}"
                                                       value="{{ old('en.seo_url_slug', optional($project->translate('en'))->seo_url_slug) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_description_en">Meta Description [ English
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_description_en"
                                                      name="en[seo_description]">{!! old('en.seo_description', optional($project->translate('en'))->seo_description) !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12" for="seo_keywords">Meta Keywords [ English
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords"
                                                      name="en[seo_keywords]">{!! old('en.seo_keywords', optional($project->translate('en'))->seo_keywords) !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div
                                            style="margin-top:25px;padding: 15px;border: 1px dashed #ddd;background: #f9f9f9;overflow: hidden;">
                                            <h4 class="h5 mb-5">
                                                <a id="title_in_engines_en"
                                                   href="{{ config('app.url'). '/' . $project->translate('en')->seo_url_slug ?? '' }}"
                                                   target="_blank">{{ $project->translate('en')->seo_title }}</a>
                                            </h4>
                                            <div id="url_in_engines_en"
                                                 class="font-sm text-earth mb-5"> {{ config('app.url'). '/' . $project->translate('en')->seo_url_slug ?? '' }}</div>
                                            <p id="desc_in_engines_en"
                                               class="font-sm text-muted">{!! old('en.seo_description', $project->translate('en')->seo_description ?? '' )!!}</p>
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
                                                       value="{{ old('ar.seo_title', optional($project->translate('ar'))->seo_title) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_url_slug_ar">Friendly URL [ العربية
                                                ]</label>
                                            <div class="col-12">
                                                <input type="text" class="form-control" id="seo_url_slug_ar"
                                                       name="ar[seo_url_slug]"
                                                       placeholder="{{ __('Friendly URL') }}"
                                                       value="{{ old('ar.seo_url_slug', optional($project->translate('ar'))->seo_url_slug) }}">
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_description_ar">Meta Description [ العربية
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_description_ar"
                                                      name="ar[seo_description]">{!! old('ar.seo_description', optional($project->translate('ar'))->seo_description ) !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row " dir="rtl">
                                            <label class="col-12" for="seo_keywords_ar">Meta Keywords [ العربية
                                                ]</label>
                                            <!-- CKEditor Container -->
                                            <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords_ar"
                                                      name="ar[seo_keywords]">{!! old('ar.seo_keywords', optional($project->translate('ar'))->seo_keywords ) !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right" dir="rtl">
                                        <div
                                            style="margin-top:25px;padding: 15px;border: 1px dashed #ddd;background: #f9f9f9;overflow: hidden;">
                                            <h4 class="h5 mb-5">
                                                <a id="title_in_engines_ar"
                                                   href="{{ config('app.url'). '/' . optional($project->translate('ar'))->seo_url_slug }}"
                                                   target="_blank">{{ old('ar.seo_title',  optional($project->translate('ar'))->seo_title) }}</a>
                                            </h4>
                                            <div id="url_in_engines_ar"
                                                 class="font-sm text-earth mb-5"> {{ config('app.url'). '/' . optional($project->translate('ar'))->seo_url_slug }}</div>
                                            <p id="desc_in_engines_ar"
                                               class="font-sm text-muted">{!! old('ar.seo_description',  optional($project->translate('ar'))->seo_description )!!}</p>
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
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{  __('Distance key between facilities') }}</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12">
                                    <table>
                                        @foreach($facilities as $facility)
                                            <tr>
                                                <td>
                                                    <div
                                                        class="custom-control custom-checkbox custom-control-inline mb-5">
                                                        <input data-id="{{ $facility->id }}"
                                                               class="custom-control-input facility-enable"
                                                               type="checkbox"
                                                               id="facility-{{ $facility->id }}"
                                                            {{ $facility->value ? 'checked' : null }}
                                                        >
                                                        <label class="custom-control-label"
                                                               for="facility-{{ $facility->id }}">{{ $facility->title }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" data-id="{{ $facility->id }}"
                                                           name="facilities[{{ $facility->id }}]"
                                                           class="form-control facility-distance"
                                                           placeholder="{{ __('Distance') }}"
                                                           value="{{ $facility->value ?? null }}"
                                                        {{ $facility->value ? null : 'disabled' }}
                                                    >
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{  __('Features') }}</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12">
                                    @foreach ($features as $feature)
                                        @if($project->features->contains($feature))
                                            <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                                <input class="custom-control-input" type="checkbox" name="features[]"
                                                       id="feature-{{ $feature->id }}" value="{{ $feature->id }}"
                                                       checked>
                                                <label class="custom-control-label"
                                                       for="feature-{{ $feature->id }}">{{ $feature->title }}</label>
                                            </div>
                                        @else
                                            <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                                <input class="custom-control-input" type="checkbox" name="features[]"
                                                       id="feature-{{ $feature->id }}" value="{{ $feature->id }}"
                                                       >
                                                <label class="custom-control-label"
                                                       for="feature-{{ $feature->id }}">{{ $feature->title }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="col-12">
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{ __('Save') }}</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-6 mx-auto">
                                        <a href="{{ route('projects.index') }}" class="btn btn-alt-danger form-control">
                                            <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-alt-primary form-control pull-right">
                                            <i class="fa fa-check mr-5"></i> {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{ __('Image') }}</h3>
                            </div>
                            <div class="block-content">
                                <div class="animated fadeIn pb-3">
                                    <div class="options-container">
                                        <img class="img-fluid options-item" src="{{ pageImage($project->photo_file) }}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="block">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{  __('Status') }}</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select class="form-control" name="status" id="status">
                                            <option
                                                value="1" {{ $project->status == '1' ? 'selected' : '' }}>{{  __('Not available') }}</option>
                                            <option
                                                value="2" {{ $project->status == '2' ? 'selected' : '' }}>{{  __('Preparing selling') }}</option>
                                            <option
                                                value="3" {{ $project->status == '3' ? 'selected' : '' }}>{{  __('Selling') }}</option>
                                            <option
                                                value="4" {{ $project->status == '4' ? 'selected' : '' }}>{{  __('Sold') }}</option>
                                            <option
                                                value="5" {{ $project->status == '5' ? 'selected' : '' }}>{{  __('Building') }}</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{  __('Category') }}</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select class="form-control" name="category" id="category">
                                            @foreach ($sections as $section)
                                                <option
                                                    value="{{ $section->id }}" {{ $project->category_id == $section->id ? 'selected' : '' }}>
                                                    {{ $section->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{ __('Finish date') }}</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" type="date" name="finish_date"
                                               value="{{ old('finish_date', optional($project->finish_date)->format('Y-m-d')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{ __('Open sell date') }}</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" type="date" name="open_sell_date"
                                               value="{{ old('open_sell_date', optional($project->open_sell_date)->format('Y-m-d')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js_after')
    <!--  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <!-- Page JS Code -->

    <script>
        jQuery(function () {
            Codebase.helpers(['ckeditor',]);
        });
        CKEDITOR.replace('js-ckeditor-ar', {
            contentsLangDirection: 'rtl'
        });

        $(document).ready(function () {
            $('.facility-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.facility-distance[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.facility-distance[data-id="' + id + '"]').val('null')
            })

            // Dynamic Fields
            let data = [];
            @foreach($facilities as $facility)
            data.push({id: '{{ $facility->id }}', text: '{{ $facility->title }}'});
            @endforeach
            //group add limit
            let maxGroup = data.length;

            let i = $('body').find('.fieldGroup').length;

            //add more fields group
            $(".addMore").click(function () {
                if ($('body').find('.fieldGroup').length <= maxGroup) {
                    ++i;
                    var fieldHTML = `
                    <div class="form-group fieldGroup">
                        <div class="form-group fieldGroupCopy">
                            <div class="row">
                                <div class="col-md-5">
                                  <select class="form-control" name="facilities[${i}][facility_id]" id="facility">
                                    @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}">{{ $facility->title }}</option>
                                    @endforeach
                    </select>
                    </div>
                    <div class="col-md-5">
                        <input type="text" id="bar_value" name="facilities[${i}][distance]" class="form-control"
                                           placeholder="{{ __('Distance (Km)') }}"/>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group-addon">
                                        <a href="javascript:void(0)" class="btn btn-alt-danger remove"><span
                                                class="glyphicon glyphicon glyphicon-remove"
                                                aria-hidden="true"></span> <i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                } else {
                    alert('Maximum ' + maxGroup + ' groups are allowed.');
                }
            });

            //remove fields group
            $("body").on("click", ".remove", function () {
                $(this).parents(".fieldGroup").remove();
            });
        })


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
                    url: '{{ route('projects.check_slug') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: $(this).val()
                    },
                    success: function (data) {
                        $("#seo_url_slug_en").val(data.slug);
                    }
                });
            } else {
                $("#title_in_engines_en").text("{{ optional($project->translate('en'))->seo_title }}");
            }

        });
        $("#seo_description_en").on('keyup change', function () {
            if ($(this).val() !== "") {
                $("#desc_in_engines_en").text($(this).val());
            } else {
                $("#desc_in_engines_en").text("{{ optional($project->translate('en'))->seo_description }}");
            }
        });
        $("#seo_url_slug_en").on('keyup change', function () {
            if ($(this).val() !== "") {
                $("#url_in_engines_en").text("<?php echo url(''); ?>/" + slugify($(this).val()));
            } else {
                $("#url_in_engines_en").text("{{ config('app.url'). '/' . optional($project->translate('en'))->seo_url_slug }}");
            }
        });
        $("#seo_title_ar").on('keyup change', function () {
            if ($(this).val() !== "") {
                $("#title_in_engines_ar").text($(this).val());
                $.ajax({
                    type: 'POST',
                    url: '{{ route('projects.check_slug') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: $(this).val()
                    },
                    success: function (data) {
                        $("#seo_url_slug_ar").val(data.slug);
                    }
                });
            } else {
                $("#title_in_engines_ar").text("{{ optional($project->translate('ar'))->seo_title }}");
            }
        });
        $("#seo_description_ar").on('keyup change', function () {
            if ($(this).val() !== "") {
                $("#desc_in_engines_ar").text($(this).val());
            } else {
                $("#desc_in_engines_ar").text("{{ optional($project->translate('ar'))->seo_description }}");
            }
        });
        $("#seo_url_slug_ar").on('keyup change', function () {
            if ($(this).val() !== "") {
                $("#url_in_engines_ar").text("<?php echo url(''); ?>/" + slugify($(this).val()));
            } else {
                $("#url_in_engines_ar").text("{{ config('app.url'). '/' . optional($project->translate('ar'))->seo_url_slug }}");
            }
        });
    </script>
@endsection
