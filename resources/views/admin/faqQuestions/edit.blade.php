@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('testimonial.index') }}">{{ __('List site Faq Questions') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit Faq Questions') }}</span>
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
                <div class="block">
                    <form action="{{ route('faqQuestions.update', $faqQuestion) }}" method="post"
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
                                               value="{{ old($locale . 'title', $faqQuestion->translate($locale)->title ?? '') }}"
                                               placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="js-ckeditor">{{ __('Details')  . " " ."(" . $locale . ")" }}</label>
                                        <textarea class="form-control" name="{{$locale}}[details]" id="js-ckeditor"
                                                  cols="30"
                                                  rows="3">{{ old($locale . 'details', $faqQuestion->translate($locale)->details ?? '') }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <label class="col-12"
                                       for="row_no">{{ __('Order')}} </label>
                                <div class="col-12">
                                    <input type="number" class="form-control" id="row_no"
                                           name="row_no"
                                           value="{{ old('row_no', $faqQuestion->row_no ?? '') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-12">{{ __('Status') }}</label>
                                <div class="col-12">
                                    <label class="css-control css-control-success css-switch">
                                        <input type="checkbox" class="css-control-input" id="status"
                                               name="status" {{ $faqQuestion->status ? 'checked' : null }}>
                                        <span class="css-control-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-4 row">
                            <div class="col-6">
                                <a href="{{ route('faqQuestions.index') }}" class="btn btn-alt-danger">
                                    <i class="fa fa-arrow-left mr-5"></i> {{ __('Cancel') }}
                                </a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-alt-primary pull-right">
                                    <i class="fa fa-check mr-5"></i> {{ __('Update Faq Questions') }}
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
