<footer id="footer">
    <div class="container my-4">
        <div class="row pt-5 pb-4 justify-content-around">
            <div class="col-12 col-sm-6 col-lg-3 mb-5">
                <h4 class="text-font-weight-light text-color-light text-uppercase">Turkey Advisors</h4>
                <p class="mb-3">
                    It has survived not only five centuries, when an unknown printer took a galley of type and scrambled
                    it to make a type specimen book.
                </p>
                <ul class="footer-social-icons social-icons m-0">
                    <li class="social-icons-facebook"><a href="https://www.facebook.com/" target="_blank"
                                                         title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="social-icons-instagram"><a href="https://www.instagram.com/" target="_blank"
                                                          title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    <li class="social-icons-twitter"><a href="https://www.twitter.com/" title="Skype"><i
                                class="fab fa-twitter"></i></a></li>
                    <li class="social-icons-youtube"><a href="https://www.youtube.com/" target="_blank" title="Youtube"><i
                                class="fab fa-youtube"></i></a></li>
                    <li class="social-icons-linkedin"><a href="https://www.linkedin.com/" target="_blank"
                                                         title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5">
                <h4 class="text-font-weight-light text-color-light">{{ __('messages.latest_articles') }}</h4>
                @foreach(\App\Models\Article::all()->take(4) as $article)
                    <p class="mb-1"><a href="{{ route('news.details', $article->seo_url_slug) }}">{{$article->title}}</a>
                    </p>
                @endforeach
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5">
                <h4 class="text-font-weight-light text-color-light">{{ __('messages.useful_links') }}</h4>
                <p class="mb-1"><a href="#">The Quirky Customs Of NYE In Turkey</a></p>
                <p class="mb-1"><a href="#">The Quirky Customs Of NYE In Turkey</a></p>
                <p class="mb-1"><a href="#">The Quirky Customs Of NYE In Turkey</a></p>
                <p class="mb-1"><a href="#">The Quirky Customs Of NYE In Turkey</a></p>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="py-2">
                <div class="row py-2">
                    <div class="col-12 d-flex mb-3 mb-md-0 text-center">
                        <p class="text-4">All Rights Reserved For turkeyadvisors.com © {{ now()->year }} | <a
                                href="{{ route('privacyPolicy') }}">{{ __('messages.privacy_policy') }}</a> | <a
                                href="{{ route('termsOfUse') }}">{{ __('messages.terms_of_use') }}</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
