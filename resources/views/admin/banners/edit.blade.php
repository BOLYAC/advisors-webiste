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
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('Create new banner') }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('banners.update', $banner) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-12" for="title-en">{{ __('Title') }} [ English ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="title-en" name="en[title]"
                                   placeholder="{{ __('Title for the page') }}" value="{{ old('en:title', optional($banner->translate('en'))->title) }}">
                        </div>
                    </div>
                    <div class="form-group row" dir="rtl">
                        <label class="col-12" for="title-ar">{{ __('Title') }} [ العربية
                            ]</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="title-ar" name="ar[title]"
                                   placeholder="{{ __('Title for the page') }}" value="{{ old('ar:title', optional($banner->translate('ar'))->title) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="js-ckeditor">{{ __('Details') }} [ English ]</label>
                            <!-- CKEditor Container -->
                            <textarea id="js-ckeditor" name="en[details]">{!! old( 'en:details', optional($banner->translate('en'))->details ) !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="js-ckeditor-ar">{{ __('Details') }} [ العربية ]</label>
                            <!-- CKEditor Container -->
                            <textarea id="js-ckeditor-ar" name="ar[details]">{!! old('ar:details' , optional($banner->translate('ar'))->details) !!}</textarea>
                        </div>
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
                        <label class="col-12">{{ __('Photo') }} [ English ]</label>
                        <div class="col-12">
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" id="file-en"
                                       name="en[file]" data-toggle="custom-file-input"
                                >
                                <label class="custom-file-label"
                                       for="file-en">{{ __('Choose file') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12">{{ __('Photo') }} [ العربية
                            ]</label>
                        <div class="col-12">
                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <input type="file" class="custom-file-input" id="file-ar"
                                       name="ar[file]" data-toggle="custom-file-input">
                                <label class="custom-file-label"
                                       for="file-ar">{{ __('Choose file') }}</label>
                            </div>
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
                                <input type="text" class="form-control" id="link-url" name="link_url" placeholder="Link" value="{{ optional($banner)->link_url}}">
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
                </form>
            </div>
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
