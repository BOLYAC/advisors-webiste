<footer id="footer">
    <div class="container my-4">
        <div class="row pt-5 pb-4 justify-content-around">
            <div class="col-12 col-sm-6 col-lg-3 mb-5">
                <h4 class="text-font-weight-light text-color-light text-uppercase">{{ config('settings.site_title') }}</h4>
                <p class="mb-3">
                    {{ config('settings.footer_copyright_text') }}
                </p>
                <ul class="footer-social-icons social-icons m-0">
                    <li class="social-icons-facebook"><a href="{{ config('settings.social_facebook') }}" target="_blank"
                                                         title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="social-icons-instagram"><a href="{{ config('settings.social_instagram') }}" target="_blank"
                                                          title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    <li class="social-icons-twitter"><a href="{{ config('settings.social_twitter') }}" title="Skype"><i
                                class="fab fa-twitter"></i></a></li>
                    <li class="social-icons-youtube"><a href="https://www.youtube.com/" target="_blank" title="Youtube"><i
                                class="fab fa-youtube"></i></a></li>
                    <li class="social-icons-linkedin"><a href="{{ config('settings.social_linkedin') }}" target="_blank"
                                                         title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5">
                <h4 class="text-font-weight-light text-color-light">{{ __('messages.latest_articles') }}</h4>
                @foreach(\App\Models\Article::all()->take(4) as $article)
                    <p class="mb-1"><a
                            href="{{ route('news.details', $article->seo_url_slug) }}">{{$article->title}}</a>
                    </p>
                @endforeach
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5">
                <h4 class="text-font-weight-light text-color-light">{{ __('messages.useful_links') }}</h4>
                <p class="mb-1"><a href="{{ route('about') }}">{{ __('messages.about_us') }}</a></p>
                <p class="mb-1"><a href="{{ route('contact') }}">{{ __('messages.our_offices') }}</a></p>
                <p class="mb-1"><a href="{{ route('contact') }}">{{ __('messages.contact_us') }}</a></p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="py-2">
                <div class="row py-2">
                    <div class="col-12 d-flex mb-3 mb-md-0 text-center">
                        <p class="text-4">{{ __('All Rights Reserved For turkeyadvisors.com ©') }} {{ now()->year }} |
                            <a
                                href="{{ route('privacyPolicy') }}">{{ __('messages.privacy_policy') }}</a> | <a
                                href="{{ route('termsOfUse') }}">{{ __('messages.terms_of_use') }}</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
