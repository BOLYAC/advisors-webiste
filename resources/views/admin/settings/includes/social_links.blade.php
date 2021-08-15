<div class="tile">
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Social Links</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="social_facebook">Facebook Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter facebook profile link"
                    id="social_facebook"
                    name="social_facebook"
                    value="{{ $setting->social_facebook ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_messenger">Facebook Messenger</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter facebook profile link"
                    id="social_messenger"
                    name="social_messenger"
                    value="{{ $setting->social_messenger ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_twitter">Twitter Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter twitter profile link"
                    id="social_twitter"
                    name="social_twitter"
                    value="{{ $setting->social_twitter ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_instagram">Instagram Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter instagram profile link"
                    id="social_instagram"
                    name="social_instagram"
                    value="{{ $setting->social_instagram ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_linkedin">LinkedIn Profile</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter linkedin profile link"
                    id="social_linkedin"
                    name="social_linkedin"
                    value="{{ $setting->social_linkedin ?? '' }}"
                />
            </div>
        </div>
        <!-- Form Submission -->
        <div class="row items-push mt-5 pt-5">
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
