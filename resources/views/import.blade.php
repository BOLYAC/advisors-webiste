<div class="container">
    <form action="{{ route('import.file') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-12">{{ __('Photo') }}</label>
            <div class="col-12">
                <div class="custom-file">
                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                    <input type="file" class="custom-file-input" id="file-en"
                           name="video_link" data-toggle="custom-file-input">
                    <label class="custom-file-label"
                           for="file-photo">{{ __('Choose file') }}</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-alt-primary pull-right">
            <i class="fa fa-check mr-5"></i> {{ __('Create') }}
        </button>
    </form>
</div>
