<div class="tile">
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Analytics</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="google_analytics">Google Analytics Code</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter google analytics code"
                    id="google_analytics"
                    name="google_analytics"
                >{!! $setting->google_analytics ?? '' !!}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="facebook_pixels">Facebook Pixel Code</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter facebook pixel code"
                    id="facebook_pixels"
                    name="facebook_pixels"
                >{{ $setting->facebook_pixels ?? '' }}</textarea>
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
