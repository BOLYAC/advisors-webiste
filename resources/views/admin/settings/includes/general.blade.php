<div class="tile">
    <form action="{{ route('settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">General Settings</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Site Name [ English ]</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site name"
                    id="site_name"
                    name="en[site_name]"
                    value="{{ optional($setting->translate('en'))->site_name ?? '' }}"
                />
            </div>
            <div class="form-group" dir="rtl">
                <label class="control-label" for="site_name">Site Name  [ العربية ]</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site name"
                    id="site_name"
                    name="ar[site_name]"
                    value="{{ optional($setting->translate('ar'))->site_name ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="site_title">Site Title [ English ]</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site title"
                    id="site_title"
                    name="en[site_title]"
                    value="{{ optional($setting->translate('en'))->site_title ?? '' }}"
                />
            </div>
            <div class="form-group" dir="rtl">
                <label class="control-label" for="site_title">Site Title [ العربية ]</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter site title"
                    id="site_title"
                    name="ar[site_title]"
                    value="{{ optional($setting->translate('ar'))->site_title ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Address [ English ]</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter footer copyright text"
                    id="site_address"
                    name="en[site_address]"
                >{{ optional($setting->translate('en'))->site_address ?? '' }}</textarea>
            </div>
            <div class="form-group" dir="rtl">
                <label class="control-label" for="footer_copyright_text">Address [ العربية ]</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Enter footer copyright text"
                    id="site_address"
                    name="ar[site_address]"
                >{{ optional($setting->translate('ar'))->site_address ?? '' }}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">Default Email Address</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Enter store default email address"
                    id="default_email_address"
                    name="default_email_address"
                    value="{{ $setting->default_email_address ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="phone_number">Phone number</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter phone number"
                    id="phone_number"
                    name="phone_number"
                    value="{{ $setting->phone_number ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="phone_number_2">Phone number 2</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter second phone number"
                    id="phone_number_2"
                    name="phone_number_2"
                    value="{{ $setting->phone_number_2 ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code">Currency Code</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store currency code"
                    id="currency_code"
                    name="currency_code"
                    value="{{ $setting->currency_code ?? '' }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_symbol">Currency Symbol</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter store currency symbol"
                    id="currency_symbol"
                    name="currency_symbol"
                    value="{{ $setting->currency_symbol ?? '' }}"
                />
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
