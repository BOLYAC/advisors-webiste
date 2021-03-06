@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('projects.index') }}">{{ __('Projects list') }}</a>
            <span class="breadcrumb-item active">{{ __('Create new project') }}</span>
        </nav>
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
        <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-8">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{ __('Create new project') }}</h3>
                        </div>
                        <div class="block-content tab-content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
                                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}"
                                     id="custom-content-below-{{ $locale }}" role="tabpanel"
                                     aria-labelledby="custom-content-below-{{ $locale }}-tab">
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="example-text-input-{{$locale}}">{{ __('Title') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="example-text-input-{{$locale}}"
                                                   name="{{$locale}}[title]"
                                                   placeholder="{{ __('Title') }}"
                                                   value="{{ old($locale  . 'title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{$locale}}'">{{ __('Details') . " " ."(" . $locale . ")" }}</label>
                                            <!-- CKEditor Container -->
                                            <textarea id="js-ckeditor_{{$locale}}"
                                                      name="en[details]">{!! old($locale . 'details') !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

                            <div class="row">
                                <div class="form-group col-4 row">
                                    <label for="featured" class="col-12">{{ __('Hot') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="featured"
                                                   name="featured"
                                                   checked>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="active" class="col-12">{{ __('Active') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="active" name="active"
                                                   checked>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="citizen_status" class="col-12">{{ __('Citizenship') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="citizen_status" name="citizen_status"
                                                   checked>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
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
                                        <option value="6">K??br??s
                                        </option>
                                        <option value="7">Bursa
                                        </option>
                                        <option value="8">Izmir
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4 row">
                                    <label for="blocks_number" class="col-12">{{ __('Number blocks') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="blocks_number"
                                               value="{{ old('blocks_number') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="floors_number" class="col-12">{{ __('Number floors') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="floors_number"
                                               value="{{ old('floors_number') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="flats_number" class="col-12">{{ __('Number flats') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="flats_number"
                                               value="{{ old('flats_number') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="flats_number" class="col-12">{{ __('Lowest price') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="lowest_price"
                                               value="{{ old('lowest_price') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="highest_price" class="col-12">{{ __('Max price') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="highest_price"
                                               value="{{ old('highest_price') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="project_size" class="col-12">{{ __('Size min') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_size_min"
                                               value="{{ old('project_size') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="project_size" class="col-12">{{ __('Size max') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_size_max"
                                               value="{{ old('project_size') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="project_bedrooms" class="col-12">{{ __('Bedrooms') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_bedrooms"
                                               value="{{ old('project_bedrooms') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="project_bathrooms" class="col-12">{{ __('Bathrooms') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_bathrooms"
                                               value="{{ old('project_bathrooms') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="garage_number" class="col-12">{{ __('Garage number') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="garage_number"
                                               value="{{ old('garage_number') }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="garage_size" class="col-12">{{ __('Garage size') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="garage_size"
                                               value="{{ old('garage_size') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{  __('Near by') }}</h3>
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
                                        <a href="{{ route('projects.index') }}" class="btn btn-alt-danger form-control">
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
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select class="form-control" name="payment_type" id="payment_type">
                                            <option value="">{{ __('Payment type') }}</option>
                                            <option value="1">{{  __('Cash') }}</option>
                                            <option value="2">{{  __('Installment') }}</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="block block-bordered">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">{{  __('Type') }}</h3>
                            </div>
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
            Codebase.helpers([
                'ckeditor', 'flatpickr', 'datepicker'
            ]);
            @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
            CKEDITOR.replace('js-ckeditor_{{ $locale }}');
            @endforeach
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
