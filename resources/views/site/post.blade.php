@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/articles.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/articles.css') }}">
    @endif
@endsection

@section('javascripts')
    <script src="{{ asset('sites/js/articles.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5" style="background-image: url({{ asset('img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ __('messages.single_post') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li><a href="{{ route('blog') }}">{{ __('messages.articles') }}</a></li>
                        <li class="active">{{ __('messages.single_post') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-2 post">
        <div class="row sidebar d-block d-xl-none">
            <div class="col-12">
                <h3 class="mb-4">{{ __('messages.search_for_something') }}</h3>
                <form action="" method="get" class="search-bar mb-5">
                    <div class="input-group">
                        <div class="input-group-text bg-transparent border-end-0"><i class="fa fa-search"></i></div>
                        <input class="form-control py-2 border-start-0" type="search" id="search-input" placeholder="{{ __('messages.search') }}">
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h2 class="mb-4 text-6 text-lg-7 text-xl-8">{{ __('messages.turkey_advisors_introduce_luxury_properties_in_bursa') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 mb-5 pr-xl-5">
                <div class="row">
                    <div class="col-6 article-date"><i class="fas fa-calendar-alt me-1"></i> 15 Nov 2020</div>
                    <div class="col-6 article-views text-end"><i class="fa fa-eye me-1"></i> 6485 {{ __('messages.views') }}</div>
                    <div class="col-12 mt-3">
                        <div class="post-img mb-5">
                            <img class="w-100" src="{{ asset('sites/img/post.jpg') }}" alt="post"/>
                        </div>
                        <p>
                            Turkey Advisors is going to introduce to its clients brand new luxury properties in the city of Bursa Turkey. In this article we will talk about the city famously known as ‘Green Bursa’ for its amazing nature and what makes it a unique travel and living destination.
                        </p>
                        <p>
                            Bursa was first an ancient Greek settlement, later a major Byzantine city, and eventually the first capital of the Ottoman Empire and it remains a significant city today. The total area of Bursa is 1,035 square kilometres. It is home to around 2 million residents, this large sprawling city in North-western Anatolia is close to the Sea of Marmara, is situated south of Istanbul and is the fourth most populous city in Turkey after Istanbul, Ankara and Izmir.
                        </p>
                        <p>
                            The city lies in the foothills of Mount Uludağ meaning “Great Mountain” which rises 2543 m to the south of the historic center of Bursa which is mostly known for its historical sites dating back to the early Ottoman Empire around and it's beautiful ornately decorated mosques.
                        </p>
                        <p>
                            Bursa is smaller and less crowded than Īstanbul. This makes it more manageable and far easier to navigate. Many of the main attractions are located in the very walkable city center and you can easily get from one end of the city to the other in about a half an hour by public transportation. Yet with a population of more than 2 million, Bursa is large enough to have all the amenities of a modern big city.
                        </p>
                        <p>
                            The people of Bursa are amazing. For the most part, Bursa locals are quite pleasant, hospitable, genuine, warm, and ready to accommodate.
                        </p>
                        <p>
                            Bursa hosts invigorating hot springs which are wonderfully relaxing thermal spa baths found west of the center of Bursa in Çekirge’s.
                        </p>
                        <p>
                            Bursa is commonly referred to as “Yesil Bursa'' meaning Green Bursa as it has many stunning parks, trees, and is surrounded by forests which add to the dramatic beauty of the mountain backdrop.
                        </p>
                        <p>
                            The wonderful and ancient 14th century Ulu Camii which means Great Mosque has an impressive 20 domes and Seljuk style arches, it is Bursa’s most dominant mosque and was built by Sultan Beyazıt, it’s grand in design with two huge minarets and the pulpit has intricate wood carvings and the walls feature beautiful calligraphy.
                        </p>
                        <p>
                            Did you know, the favorite traditional Iskender Kebap originates from Bursa! It is a lamb dish cooked with thyme and served on pide with a savory tomato sauce, browned butter and topped with yoghurt and parsley, and it’s delicious!
                        </p>
                        <p>
                            Today Bursa is a modern city but retains the historical buildings all around it including mosques and mausoleums celebrating the city as it was once the first Ottoman capital. As a city, you would expect it to be vastly built up but with numerous parks and greenery, they make for wonderful areas to escape to. During the summer months you can ride the cable car which takes you to the summit of Mount Uludağ for hiking or to take in the fresh cool air and in the winter months you can ski as it’s Turkey’s premier ski resort, as you can imagine the views from the summit are magnificent.
                        </p>
                        <p>
                            Bursa is an ideal location as it’s close to Istanbul and the recently opened Osmangazi Bridge dramatically cuts the travel time between Istanbul and Bursa from two and half hours to just over an hour making Bursa on everyone’s radar now especially for tourists, city workers and property buyers.
                        </p>
                    </div>
                </div>
                <hr/>
                <div class="row align-items-center">
                    <div class="col-lg-6 tags mb-3 mb-lg-0">
                        <a class="badge badge-primary badge-sm text-secondary me-2">#Turkey</a>
                        <a class="badge badge-primary badge-sm text-secondary me-2">#Istanbul</a>
                        <a class="badge badge-primary badge-sm text-secondary me-2">#Projects_in_istanbul</a>
                        <a class="badge badge-primary badge-sm text-secondary me-2">#Turkey</a>
                        <a class="badge badge-primary badge-sm text-secondary me-2">#Residence_permit</a>
                        <a class="badge badge-primary badge-sm text-secondary me-2">#Living_in_urkey</a>
                    </div>
                    <div class="col-lg-6">
                        <ul class="footer-social-icons social-icons social-icons-icon-light m-0 text-center text-lg-end">
                            <li class="social-icons-facebook"><a href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-instagram"><a href="https://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                            <li class="social-icons-twitter"><a href="https://www.twitter.com/" title="Skype"><i class="fab fa-twitter"></i></a></li>
                            <li class="social-icons-youtube"><a href="https://www.youtube.com/" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            <li class="social-icons-linkedin"><a href="https://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <hr/>
            </div>
            <div class="col-xl-4 sidebar">
                <div class="search d-none d-xl-block">
                    <h3 class="mb-4">{{ __('messages.search_for_something') }}</h3>
                    <form action="" method="get" class="search-bar mb-5">
                        <div class="input-group">
                            <div class="input-group-text bg-transparent border-end-0"><i class="fa fa-search"></i></div>
                            <input class="form-control py-2 border-start-0" type="search" id="search-input" placeholder="{{ __('messages.search') }}">
                        </div>
                    </form>
                </div>
                <h3 class="mb-4">{{ __('messages.special_offers') }}</h3>
                <div class="owl-carousel owl-theme projects mt-3">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="project card">
                            <img class="card-img-top" src="{{ asset('img/project.png') }}" alt="Project">
                            <div class="card-body">
                                <h4 class="card-title mb-4 text-7 text-sm-8 text-lg-7 text-xl-8 font-weight-bold">Project No: TA066</h4>
                                <div class="row features mb-3 gx-3">
                                    <div class="col-auto text-3"><img class="feature-icon me-1" src="{{ asset('sites/img/project/map.svg') }}" alt="map"/> Istanbul</div>
                                    <div class="col-auto text-3"><img class="feature-icon me-1" src="{{ asset('sites/img/project/hand.svg') }}" alt="hand"/> Installment</div>
                                    <div class="col-auto text-3"><img class="feature-icon me-1" src="{{ asset('sites/img/project/hourglass.svg') }}" alt="hourglass"/> Ready</div>
                                </div>
                                <p class="card-text text-4 mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <div class="row align-items-center">
                                    <div class="col-6 price text-primary text-7 text-sm-8 font-weight-semibold">30,000 $</div>
                                    <div class="col-6 more-details">
                                        <a href="/" class="btn btn-primary btn-line w-100 text-4">{{ __('messages.more_details') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <section class="section wwa-section border-0 my-5 px-3 py-4" style="background-image: url({{ asset('img/wwa.jpg') }});">
                    <div class="container container-lg">
                        <div class="row align-items-end justify-content-between">
                            <div class="col-12">
                                <span class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                                <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">Turkey Advisors</h2>
                                <h4 class="font-weight-extra-bold text-secondary line-height-1 text-8">{{ __('messages.some_offers') }}</h4>
                                <a class="btn btn-lg btn-secondary px-4 mt-5 py-3 w-100" href="#">{{ __('messages.get_in_touch') }} <span class="arrow1 is-triangle arrow-bar is-right"></span></a>
                            </div>
                        </div>
                    </div>
                </section>
                <h3 class="mb-4">{{ __('messages.latest_articles') }}</h3>
                <div class="latest-posts articles row">
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col-12 col-lg-6 col-xl-12">
                            <div class="mb-4 article card border-radius-0">
                                <div>
                                    <img class="card-img-top" src="{{ asset('sites/img/post.png') }}" alt="Project">
                                </div>
                                <div class="card-body">
                                    <div class="article-date"><i class="fas fa-calendar-alt me-1"></i> 15 Nov 2020</div>
                                    <div class="article-views"><i class="fa fa-eye me-1"></i> 6485 {{ __('messages.views') }}</div>
                                    <div class="card-title">
                                        <div class="mb-3 text-4 card-subtitle">Istanbul new airport</div>
                                        <h4 class="mb-0 text-5 text-sm-6 text-lg-5 font-weight-bold">Istanbul new airport opening</h4>
                                    </div>
                                    <div class="card-text row align-items-end">
                                        <div class="col-10">
                                            <p class="text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <div class="col-2 read-more text-end">
                                            <a href="#"><span class="arrow2 is-triangle arrow-bar is-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
