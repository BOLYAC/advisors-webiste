<div class="tile">
    <form action="{{ route('settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title">Site Logo</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-3 mx-auto">
                    @if ( $setting->site_logo !== null)
                        <img src="{{ pageImage( $setting->site_logo ?? '') }}" id="logoImg" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="logoImg" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label for="re-listing-photos">{{ __('Site Logo') }}</label>
                        <div class="custom-file form">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                            <input type="file" class="custom-file-input" id="re-listing-photos"
                                   name="site_logo" onchange="loadFile(event,'logoImg')" data-toggle="custom-file-input" multiple>
                            <label class="custom-file-label" for="re-listing-photos">{{__('Choose
                                files')}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 mx-auto">
                    @if ( $setting->site_favicon ?? '' !== null)
                        <img src="{{ pageImage( $setting->site_favicon ?? '' ) }}" id="faviconImg" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="faviconImg" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label for="re-listing-photos">{{ __('Site Favicon') }}</label>
                        <div class="custom-file form">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                            <input type="file" class="custom-file-input" id="re-listing-photos"
                                   name="site_favicon" onchange="loadFile(event,'faviconImg')" data-toggle="custom-file-input" multiple>
                            <label class="custom-file-label" for="re-listing-photos">{{__('Choose
                                files')}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Submission -->
        <div class="row items-push mt-5">
            <div class="col-lg-7 offset-lg-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-alt-success">
                        <i class="fa fa-check-circle mr-5"></i>
                        {{ __('Update Settings') }}
                    </button>
                </div>
            </div>
        </div>
        <!-- END Form Submission -->
    </form>
</div>
@push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
