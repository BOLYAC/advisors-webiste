@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <nav class="breadcrumb bg-white push">
            <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
            <a class="breadcrumb-item" href="{{ route('banners.index') }}">{{ __('List banner') }}</a>
            <span class="breadcrumb-item active">{{ __('Edit Banner') }}</span>
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
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Create new banner') }}</h3>
            </div>
            <form action="{{ route('banners.update', $banner) }}" method="post" enctype="multipart/form-data">
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
                                       value="{{ old($locale . 'title', $banner->translate($locale)->title ?? '') }}"
                                       placeholder="{{ __('Enter the title')  . " " ."(" . $locale . ")" }}">
                            </div>
                            <div class="form-group">
                                <label
                                    for="js-ckeditor">{{ __('Details')  . " " ."(" . $locale . ")" }}</label>
                                <textarea class="form-control" name="{{$locale}}[details]" id="js-ckeditor"
                                          cols="30"
                                          rows="3">{{ old($locale . 'details', $banner->translate($locale)->details ?? '') }}</textarea>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group row">
                        <label class="col-12">{{ __('Photo')  }}</label>
                        <div class="col-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file-photo"
                                       name="video_link" data-toggle="custom-file-input"
                                >
                                <label class="custom-file-label"
                                       for="file-photo">{{ __('Choose file') }}</label>
                            </div>
                            <div class="text-danger float-right font-w700 mt-1">Size: 1920*120</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slide_position">{{ __('Order') }}</label>
                        <input class="form-control" type="number" name="row_no" id="slide_position"
                               value="{{ $banner->row_no }}"
                               placeholder="{{ __('Order') }}">
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-12">{{ __('Active') }}</label>
                        <div class="col-12">
                            <label class="css-control css-control-success css-switch">
                                <input type="checkbox" class="css-control-input" id="status"
                                       name="status" {{ $banner->status ? 'checked' : null }}>
                                <span class="css-control-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="link-url">{{ __('Banner url') }}</label>
                        <div class="col-lg-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ config('app.url') }}
                                                        </span>
                                </div>
                                <input type="text" class="form-control" id="link-url" name="link_url" placeholder="Link"
                                       value="{{ optional($banner)->link_url}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <a href="{{ url()->previous() }}" class="btn btn-alt-danger">
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
