@extends('layouts.backend')

@section('css_before')

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet"
          href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/dropzonejs/dist/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('testimonial.index') }}">{{ __('List Faq Questions') }}</a>
            <span class="breadcrumb-item active">{{ __('Create new Faq Questions') }}</span>
        </nav>
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
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ __('Create new Faq Questions') }}</h3>
                    </div>
                    <form action="{{ route('faqQuestions.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                    <div class="form-group">
                                        <label for="js-ckeditor">{{ __('Details')  . " " ."(" . $locale . ")" }}</label>
                                        <textarea class="form-control" name="{{ $locale }}[details]" id="js-ckeditor"
                                                  cols="30"
                                                  rows="3">{{ old($locale . 'details') }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row">
                                <label for="status" class="col-12">{{ __('Status') }}</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="status"
                                               name="status" checked>
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <a href="{{ route('faqQuestions.index') }}" class="btn btn-alt-danger">
                                        <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                    </a>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-alt-primary pull-right">
                                        <i class="fa fa-check mr-5"></i> {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Page Content -->
            </div>
        </div>
    </div>
@endsection
@section('js_after')
    <!--  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> -->
    <script src="{{ asset('js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        jQuery(function () {
            CKEDITOR.replace('js-ckeditor', {
                removeButtons: 'Source,Save,Templates,NewPage,ExportPdf,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,HiddenField,ImageButton,Button,Select,Textarea,TextField,Radio,Checkbox,Form,Subscript,Superscript,RemoveFormat,CopyFormatting,CreateDiv,Blockquote,Language,BidiRtl,BidiLtr,Link,Unlink,Anchor,Image,Flash,HorizontalRule,Table,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About'
            });
            CKEDITOR.replace('js-ckeditor-ar', {
                removeButtons: 'Source,Save,Templates,NewPage,ExportPdf,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,HiddenField,ImageButton,Button,Select,Textarea,TextField,Radio,Checkbox,Form,Subscript,Superscript,RemoveFormat,CopyFormatting,CreateDiv,Blockquote,Language,BidiRtl,BidiLtr,Link,Unlink,Anchor,Image,Flash,HorizontalRule,Table,Smiley,SpecialChar,PageBreak,Iframe,Maximize,ShowBlocks,About',
                contentsLangDirection: 'rtl'
            });
        });
    </script>
@endsection
