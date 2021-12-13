<div class="js-cookie-consent cookie-consent privacy-banner" style="border-top: 2px solid #002f5b; display: none;">
    <div>
        <p>
            {!! trans('cookieConsent::texts.message') !!}
            <a class="banner-accept" style="background: #e7c451" href="javascript:void(0)" >{{ trans('cookieConsent::texts.agree') }}</a>
            <a class="banner-learn" href="{{ route('termsOfUse') }}">{!! trans('cookieConsent::texts.learn_more') !!}</a>
        </p>
    </div>
</div>
