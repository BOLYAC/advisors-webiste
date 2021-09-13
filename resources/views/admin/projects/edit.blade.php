@extends('layouts.backend')
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection


@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('projects.index') }}">{{ __('List site projects') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit project') }}</span>
        </nav>

        <form action="{{ route('projects.update',$project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8">
                    <!-- Block Tabs With Options Default Style -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{  __('Estate data') }}</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="form-group col-3 row">
                                    <label for="featured" class="col-12">{{ __('Hot') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="featured"
                                                   name="featured" {{ $project->featured ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-3 row">
                                    <label for="active" class="col-12">{{ __('Active') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="active" name="active"
                                                {{ $project->featured ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-3 row">
                                    <label for="citizen_status" class="col-12">{{ __('Citizenship') }}</label>
                                    <div class="col-12">
                                        <label class="css-control css-control-success css-switch">
                                            <input type="checkbox" class="css-control-input" id="citizen_status"
                                                   name="citizen_status"
                                                {{ $project->citizen_status ? 'checked' : null }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gps_map" class="col-12">{{ __('Gps') }}</label>
                                <div class="col-12">
                                    <input type="text" class="form-control form-control-sm" id="gps_map"
                                           name="gps_map" value="{{ $project->gps_map }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{  __('Translation data') }}</h3>
                            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
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
                        <div class="block-content tab-content">
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
                                                   value="{{  optional($project->translate($locale))->title  }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label
                                                for="js-ckeditor_{{ $locale }}">{{ __('Details') . " " ."(" . $locale . ")" }}</label>
                                            <!-- CKEditor Container -->
                                            <textarea class="editors" id="js-ckeditor_{{ $locale }}"
                                                      name="{{ $locale }}[details]">{!! optional($project->translate($locale))->details !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_title_{{$locale}}">{{ __('Page title') . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_title_{{$locale}}"
                                                   name="{{$locale}}[seo_title]"
                                                   placeholder="{{ __('Seo title') }}"
                                                   value="{{ old( $locale . 'seo_title', optional($project->translate($locale))->seo_title) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_url_slug_{{$locale}}">{{ __('Friendly URL')  . " " ."(" . $locale . ")" }}</label>
                                        <div class="col-12">
                                            <input type="text" class="form-control" id="seo_url_slug_{{$locale}}"
                                                   name="{{$locale}}[seo_url_slug]"
                                                   placeholder="{{ __('Friendly URL') }}"
                                                   value="{{ old($locale . 'seo_url_slug', optional($project->translate('en'))->seo_url_slug) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_description_{{$locale}}">{{ __('Meta Description') . " " ."(" . $locale . ")"  }}</label>
                                        <!-- CKEditor Container -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_description_{{$locale}}"
                                                      name="{{$locale}}[seo_description]">{!! old('en.seo_description', optional($project->translate($locale))->seo_description) !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12"
                                               for="seo_keywords_{{$locale}}">{{ __('Meta Keywords') . " " ."(" . $locale . ")" }}</label>
                                        <!-- CKEditor Container -->
                                        <div class="col-12">
                                            <textarea class="form-control" id="seo_keywords_{{$locale}}"
                                                      name="{{$locale}}[seo_keywords]">{!! old('en.seo_keywords', optional($project->translate($locale))->seo_keywords) !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-content">
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
                                    <div class="row gutters-tiny js-gallery img-fluid-100 js-gallery-enabled">
                                        @foreach ($project->images as $i => $image)
                                            <div class="col-md-3" id="{{ $image->id }}">
                                                <a class="img-link img-link-simple img-thumb img-lightbox"
                                                   href="{{ pageImage($image->full) }}">
                                                    <img class="img-fluid rounded-top"
                                                         src="{{ pageImage($image->full) }}">
                                                </a>
                                                <div class="form-group">
                                                    <input class="form-control form-control-sm" type="number"
                                                           name="row_no_image[{{$image->id}}]"
                                                           value="{{ $image->row_no_image }}">
                                                </div>
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
                                <div class="form-group col-4 row">
                                    <label for="project_size" class="col-12">{{ __('Size min') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_size_min"
                                               value="{{ old('project_size_min' , optional($project)->project_size_min) }}">
                                    </div>
                                </div>
                                <div class="form-group col-5 row">
                                    <label for="project_size" class="col-12">{{ __('Size max') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_size_max"
                                               value="{{ old('project_size_max', optional($project)->project_size_max) }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="project_bedrooms" class="col-12">{{ __('Bedrooms') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_bedrooms"
                                               value="{{ old('project_bedrooms',optional($project)->project_bedrooms) }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="project_bathrooms" class="col-12">{{ __('Bathrooms') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="project_bathrooms"
                                               value="{{ old('project_bathrooms',optional($project)->project_bathrooms) }}">
                                    </div>
                                </div>
                                <div class="form-group col-5 row">
                                    <label for="garage_number" class="col-12">{{ __('Garage number') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="garage_number"
                                               value="{{ old('garage_number',optional($project)->garage_number) }}">
                                    </div>
                                </div>
                                <div class="form-group col-4 row">
                                    <label for="garage_size" class="col-12">{{ __('Garage size') }}</label>
                                    <div class="col-12">
                                        <input class="form-control" type="number" name="garage_size"
                                               value="{{ old('garage_size',optional($project)->garage_size) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">{{  __('Near by') }}</h3>
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
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select class="form-control" name="payment_type" id="payment_type">
                                            <option value="">{{ __('Payment type') }}</option>
                                            <option
                                                value="1" {{ $project->payment_type == '1' ? 'selected' : '' }}>{{  __('Cash') }}</option>
                                            <option
                                                value="2" {{ $project->payment_type == '2' ? 'selected' : '' }}>{{  __('Installment') }}</option>
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
                                        <select class="form-control" name="category_id" id="category_id">
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
        <div class="row">
            <div class="col-8">
                <div class="block block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('Plans') }}</h3>
                        <button type="button" class="btn btn-alt-info" data-toggle="modal"
                                data-target="#modal-normal">{{ __('Add plan') }}
                        </button>
                    </div>
                    <div class="block-content">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-simple">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Size') }}</th>
                                <th>{{ __('Bedrooms') }}</th>
                                <th>{{ __('Bathrooms') }}</th>
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->floors as $floor)
                                <tr>
                                    <td>{{ $floor->id }}</td>
                                    <td class="font-w600">{{ $floor->floor_title }}</td>
                                    <td class="font-w600">{{ $floor->floor_price }}</td>
                                    <td class="font-w600">{{ $floor->floor_size }}</td>
                                    <td class="font-w600">{{ $floor->floor_bedrooms }}</td>
                                    <td class="font-w600">{{ $floor->floor_bathrooms }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-secondary edit"
                                                data-toggle="tooltip"
                                                title="Edit plan">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary delete"
                                                data-toggle="tooltip"
                                                title="Delete plan">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Create modal floor -->
    <div class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">{{ __('New plan') }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('projects.add.floor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="block-content">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <div class="form-group">
                                <label for="floor_title">{{ __('Title') }}</label>
                                <input type="text" name="floor_title"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_price">{{ __('Price') }}</label>
                                <input type="text" name="floor_price"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_size">{{ __('Size') }}</label>
                                <input type="text" name="floor_size"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_bedrooms">{{ __('Bedrooms') }}</label>
                                <input type="text" name="floor_bedrooms"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_bathrooms">{{ __('Bathrooms') }}</label>
                                <input type="text" name="floor_bathrooms"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Plan image') }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="floor_full"
                                               name="floor_full" data-toggle="custom-file-input">
                                        <label class="custom-file-label"
                                               for="floor_full">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary"
                                    data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-check"></i> {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END create modal floor -->
    <!-- edit modal floor -->
    <div class="modal" id="edit_floor" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">{{ __('New plan') }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('projects.update.floor') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="block-content">
                            <input type="hidden" name="floor_id" id="floor_id">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <div class="form-group">
                                <label for="floor_title">{{ __('Title') }}</label>
                                <input type="text" name="floor_title" id="floor_title"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_price">{{ __('Price') }}</label>
                                <input type="text" name="floor_price" id="floor_price"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_size">{{ __('Size') }}</label>
                                <input type="text" name="floor_size" id="floor_size"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_bedrooms">{{ __('Bedrooms') }}</label>
                                <input type="text" name="floor_bedrooms" id="floor_bedrooms"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="floor_bathrooms">{{ __('Bathrooms') }}</label>
                                <input type="text" name="floor_bathrooms" id="floor_bathrooms"
                                       class="form-control form-control-sm">
                            </div>
                            <div class="form-group row">
                                <label class="col-12">{{ __('Plan image') }}</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="floor_full_edit"
                                               name="floor_full" data-toggle="custom-file-input">
                                        <label class="custom-file-label"
                                               for="floor_full_edit">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary"
                                    data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-check"></i> {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END edit modal floor -->
    <!-- Delete modal floor -->
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">{{ __('Delete plan') }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('projects.delete.floor') }}" method="POST">
                        @csrf
                        <div class="block-content">
                            <input type="hidden" name="floor_id" id="floor_id_delete">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary"
                                    data-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-check"></i> {{ __('Delete') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Delete modal floor -->
@endsection

@section('js_after')
    <!--  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    <script>
        $(function () {
            // Init Table Apartments
            let table = $('.js-dataTable-simple').DataTable({
                searching: false,
                paging: false,
            });
            // Edit apartment
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                let data = table.row($tr).data();
                $('#floor_id').val(data[0])
                $('#floor_title').val(data[1]);
                $('#floor_price').val(data[2]);
                $('#floor_size').val(data[3]);
                $('#floor_bedrooms').val(data[4]);
                $('#floor_bathrooms').val(data[5]);
                $('#edit_floor').modal('show');
            })
            // Delete apartment
            table.on('click', '.delete', function () {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                let data = table.row($tr).data();
                $('#floor_id_delete').val(data[0])
                $('#deleteModal').modal('show');
            })
        })
    </script>

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
        @foreach(LaravelLocalization::getSupportedLocales() as $locale => $properties)
        $("#seo_title_{{$locale}}").on('keyup change', function () {
            if ($(this).val() !== "") {
                $.ajax({
                    type: 'POST',
                    url: '{{ route('projects.check_slug') }}',
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
