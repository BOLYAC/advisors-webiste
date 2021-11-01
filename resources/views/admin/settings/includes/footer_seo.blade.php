<div class="tile">
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Footer &amp; SEO</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="seo_meta_title">SEO Meta Title [ English ]</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter seo meta title for store"
                    id="seo_meta_title"
                    name="en[seo_meta_title]"
                    value="{{ optional($setting->translate('en'))->seo_meta_title ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Footer Copyright Text [ English ]</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter footer copyright text"
                    id="footer_copyright_text"
                    name="en[footer_copyright_text]"
                >{{ optional($setting->translate('en'))->footer_copyright_text ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="seo_meta_description">SEO Meta Description [ English ]</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter seo meta description for store"
                    id="seo_meta_description"
                    name="en[seo_meta_description]"
                >{{ optional($setting->translate('en'))->seo_meta_description ?? '' }}</textarea>
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
