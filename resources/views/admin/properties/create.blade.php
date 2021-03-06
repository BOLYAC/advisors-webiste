@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('properties.index') }}">{{ __('Properties list') }}</a>
            <span class="breadcrumb-item active">{{ __('Create new property') }}</span>
        </nav>
        <form action="{{ route('properties.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-8">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ __('Create new property') }}</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">{{ __('Title') }} [ English ]</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="example-text-input" name="en[title]"
                                           placeholder="{{ __('Title for the page') }}" value="{{ old('en.title') }}">
                                </div>
                            </div>
                            <div class="form-group row" dir="rtl">
                                <label class="col-12" for="example-text-input">{{ __('Title') }} [ العربية
                                    ]</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="example-text-input" name="ar[title]"
                                           placeholder="{{ __('Title for the page') }}" value="{{ old('ar.title') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="js-ckeditor">{{ __('Details') }} [ English ]</label>
                                    <!-- CKEditor Container -->
                                    <textarea id="js-ckeditor" name="en[details]">{!! old('en.details') !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row" dir="rtl">
                                <div class="col-12">
                                    <label for="js-ckeditor-ar">{{ __('Details') }} [ العربية
                                        ]</label>
                                    <!-- CKEditor Container -->
                                    <textarea id="js-ckeditor-ar"
                                              name="ar[details]">{!! old('ar.details') !!}</textarea>
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
                            <div class="form-group row">
                                <label for="featured" class="col-12">{{ __('Status') }}</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="featured" name="featured"
                                               checked>
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-12">{{ __('City') }}</label>
                                <div class="col-12">
                                    <select class="form-control" name="city" id="city">
                                        <option value="1">Istanbul
                                        </option>
                                        <option value="2">Bodrum
                                        </option>
                                        <option value="3">Antalya
                                        </option>
                                        <option value="4">Sapanca
                                        </option>
                                        <option value="5">Trapzon
                                        </option>
                                        <option value="6">Kıbrıs
                                        </option>
                                        <option value="7">Bursa
                                        </option>
                                        <option value="8">Izmir
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="location" class="col-12">{{ __('Location') }} [ English ]</label>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="en[location]"
                                           value="{{ old('en.location') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="location" class="col-12">{{ __('Location') }} [ العربية ]</label>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="ar[location]"
                                           value="{{ old('ar.location') }}"
                                           dir="rtl"
                                    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-5 row">
                                    <label for="number_bedrooms" class="col-6">{{ __('Bedrooms') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="number_bedrooms"
                                               value="{{ old('number_bedrooms') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="number_bathrooms" class="col-12">{{ __('Bathrooms') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="number_bathrooms"
                                               value="{{ old('number_bathrooms') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="number_floors" class="col-12">{{ __('Floors') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="number_floors"
                                               value="{{ old('number_floors') }}">
                                    </div>
                                </div>
                                <div class="form-group col-5 row">
                                    <label for="square" class="col-12">{{ __('Square (m2)') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="square"
                                               value="{{ old('square') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="price" class="col-12">{{ __('Price') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="price"
                                               value="{{ old('price') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="period" class="col-12">{{ __('Period') }}</label>
                                    <div class="col-12">
                                        <select class="form-control" name="period" id="period">
                                            <option value="1">{{ __('Day') }}</option>
                                            <option value="2">{{ __('Month') }}</option>
                                            <option value="3">{{ __('Year') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{  __('Distance key between facilities') }}</h3>
                            <div class="input-group-addon float-right">
                                <a href="javascript:void(0)" class="btn btn-alt-success addMore">
                                <span class="fa fa-plus" aria-hidden="true">
                                </span> {{ __('Add more info') }}</a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group row fieldGroup">
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
                                        <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="features[]"
                                                   id="feature-{{ $feature->id }}" value="{{ $feature->id }}">
                                            <label class="custom-control-label"
                                                   for="feature-{{ $feature->id }}">{{ $feature->title }}</label>
                                        </div>
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
                                <h3 class="block-title">Save</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                    <div class="col-6 mx-auto">
                                        <a href="{{ route('properties.index') }}" class="btn btn-alt-danger form-control">
                                            <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-alt-primary form-control pull-right">
                                            <i class="fa fa-check mr-5"></i> {{ __('Create') }}
                                        </button>
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
                                            <option value="1">{{  __('Not available') }}</option>
                                            <option value="2">{{  __('Preparing selling') }}</option>
                                            <option value="3">{{  __('Selling') }}</option>
                                            <option value="4">{{  __('Sold') }}</option>
                                            <option value="5">{{  __('Building') }}</option>
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
                                <div class="block-content">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <select class="form-control" name="category_id" id="category">
                                                @foreach ($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{  __('Project') }}</h3>
                            </div>
                            <div class="block-content">
                                <div class="block-content">
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <select class="form-control" name="project_id" id="project">
                                                <option value="0" selected> -- Project -- </option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                        <input class="form-control" type="date" name="finish_date">
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
                                        <input class="form-control" type="date" name="open_sell_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- END Page Content -->
    </div>
@endsection

@section('js_after')
    <!--  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        jQuery(function () {
            Codebase.helpers(['summernote', 'ckeditor', 'simplemde']);
            CKEDITOR.replace('js-ckeditor-ar', {
                contentsLangDirection: 'rtl'
            });
        });

        $(document).ready(function () {
            var data = [];
            @foreach($facilities as $facility)
            data.push({id: '{{ $facility->id }}', text: '{{ $facility->title }}'});
            @endforeach
            //group add limit
            var maxGroup = data.length;

            var i = $('body').find('.fieldGroup').length;

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
        });

    </script>
@endsection
