@extends('layouts.app')
@section('title')
    {{ __('messages.terms_of_use') }} | Turkey Advisors
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('sites/css/privacyPolicy.css') }}">
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5" style="background-image: url({{ asset('img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ __('messages.terms_of_use') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.terms_of_use') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-2">
        <div class="row">
            <div class="col">
                <h2>{{ __('messages.terms_of_use') }}</h2>
                <p>Turkey Advisors is going to introduce to its clients brand new luxury properties in the city of Bursa Turkey. In this article we will talk about the city famously known as ‘Green Bursa’ for its amazing nature and what makes it a unique travel and living destination.</p>
                <p>Bursa was first an ancient Greek settlement, later a major Byzantine city, and eventually the first capital of the Ottoman Empire and it remains a significant city today. The total area of Bursa is 1,035 square kilometres. It is home to around 2 million residents, this large sprawling city in North-western Anatolia is close to the Sea of Marmara, is situated south of Istanbul and is the fourth most populous city in Turkey after Istanbul, Ankara and Izmir.</p>
                <p>The city lies in the foothills of Mount Uludağ meaning “Great Mountain” which rises 2543 m to the south of the historic center of Bursa which is mostly known for its historical sites dating back to the early Ottoman Empire around and it's beautiful ornately decorated mosques.</p>
                <p>Bursa is smaller and less crowded than Īstanbul. This makes it more manageable and far easier to navigate. Many of the main attractions are located in the very walkable city center and you can easily get from one end of the city to the other in about a half an hour by public transportation. Yet with a population of more than 2 million, Bursa is large enough to have all the amenities of a modern big city.</p>
                <p>The people of Bursa are amazing. For the most part, Bursa locals are quite pleasant, hospitable, genuine, warm, and ready to accommodate.</p>
                <p>Bursa hosts invigorating hot springs which are wonderfully relaxing thermal spa baths found west of the center of Bursa in Çekirge’s.</p>
                <p>Bursa is commonly referred to as “Yesil Bursa'' meaning Green Bursa as it has many stunning parks, trees, and is surrounded by forests which add to the dramatic beauty of the mountain backdrop.</p>
                <p>The wonderful and ancient 14th century Ulu Camii which means Great Mosque has an impressive 20 domes and Seljuk style arches, it is Bursa’s most dominant mosque and was built by Sultan Beyazıt, it’s grand in design with two huge minarets and the pulpit has intricate wood carvings and the walls feature beautiful calligraphy. </p>
                <p>Did you know, the favorite traditional Iskender Kebap originates from Bursa! It is a lamb dish cooked with thyme and served on pide with a savory tomato sauce, browned butter and topped with yoghurt and parsley, and it’s delicious! Today Bursa is a modern city but retains the historical buildings all around it including mosques and mausoleums celebrating the city as it was once the first Ottoman capital. As a city, you would expect it to be vastly built up but with numerous parks and greenery, they make for wonderful areas to escape to. During the summer months you can ride the cable car which takes you to the summit of Mount Uludağ for hiking or to take in the fresh cool air and in the winter months you can ski as it’s Turkey’s premier ski resort, as you can imagine the views from the summit are magnificent.</p>
                <p>Bursa is an ideal location as it’s close to Istanbul and the recently opened Osmangazi Bridge dramatically cuts the travel time between Istanbul and Bursa from two and half hours to just over an hour making Bursa on everyone’s radar now especially for tourists, city workers and property buyers.</p>
            </div>
        </div>

    </div>
    <section class="section wwa-section border-0 mt-5 py-4" style="background-image: url({{ asset('img/wwa.jpg') }});">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-sm-6">
                    <span class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">Turkey Advisors</h2>
                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-6">{{ __('messages.contact_us_now') }}</h4>
                </div>
                <div class="col-sm-6 text-start text-lg-end mt-4">
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile" href="#">{{ __('messages.get_in_touch') }} <span class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
