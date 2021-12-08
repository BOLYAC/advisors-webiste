@extends('layouts.simple')
@section('seo_header')
    {!! SEO::generate() !!}
@endsection
@section('stylesheets')
    @if (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('sites/css/citizenship.rtl.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('sites/css/citizenship.css') }}">
    @endif
@endsection

@section('javascripts')
    <script type="text/javascript">
        window.$ = window.jQuery = $;
    </script>
@endsection

@section('content')
    <section class="page-header page-header-modern page-header-background page-header-background-sm mb-5"
             style="background-image: url({{ asset('sites/img/background.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="mt-3 text-uppercase">{{ __('messages.turkish_citizenship') }}</h1>
                    <div class="divider divider-small divider-small-center">
                        <hr>
                    </div>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> </a></li>
                        <li class="active">{{ __('messages.turkish_citizenship') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-2 border-0 mb-0 pt-5">
        <div class="container">
            <div class="row align-items-center justify-content-between px-5">
                <div class="col-lg-6 mb-5">
                    <img src="{{ asset('sites/img/citizenship.jpg') }}" class="luxury-img img-fluid w-auto-mobile w-100"
                         alt=""/>
                </div>
                <div class="col-lg-6 text-center">
                    <h2 class="font-weight-extra-bold line-height-3 mb-4">Turkish Citizenship by Investment Program</h2>
                    <p class="lead">The Turkish government is granting Turkish citizenship for foreigners, the law gave
                        eligibility to foreigners who are interested in Turkish Citizenship, by investing in <strong>250.000
                            $</strong>,
                        the foreign investors would be eligible to pass it to his family, wife, and children under 18.
                        the law and the procedure of obtaining Turkish citizenship are obtainable within 3 different
                        programs, for more information <a href="#description"
                                                          style="background-color: rgb(255, 255, 255);"><b><u>scroll
                                    down.</u></b></a></p>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-2 border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-6 text-center mb-5">
                    <h2 class="font-weight-extra-bold line-height-4 mb-5">Real Estate Investment Minimum 250.000$</h2>
                </div>
            </div>
            <div class="row justify-content-center gx-5">
                <div class="investment col-md-6 col-lg-4 mb-5 px-5 px-md-4 px-xl-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-number">01</div>
                            <p class="card-text line-height-3">Opening a Turkish Bank Account</p>
                        </div>
                    </div>
                </div>
                <div class="investment col-md-6 col-lg-4 mb-5 px-5 px-md-4 px-xl-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-number">02</div>
                            <p class="card-text line-height-3">Opening a Turkish Bank Account</p>
                        </div>
                    </div>
                </div>
                <div class="investment col-md-6 col-lg-4 mb-5 px-5 px-md-4 px-xl-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-number">03</div>
                            <p class="card-text line-height-3">Finding the Property</p>
                        </div>
                    </div>
                </div>
                <div class="investment col-md-6 col-lg-4 mb-5 px-5 px-md-4 px-xl-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-number">04</div>
                            <p class="card-text line-height-3">Buying the Property</p>
                        </div>
                    </div>
                </div>
                <div class="investment col-md-6 col-lg-4 mb-5 px-5 px-md-4 px-xl-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-number">05</div>
                            <p class="card-text line-height-3">Obtaining the Certificate of Conformity</p>
                        </div>
                    </div>
                </div>
                <div class="investment col-md-6 col-lg-4 mb-5 px-5 px-md-4 px-xl-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-number">06</div>
                            <p class="card-text line-height-3">Application for Turkish Residency</p>
                        </div>
                    </div>
                </div>
                <div class="investment col-md-6 col-lg-4 mb-5 px-5 px-md-4 px-xl-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-number">07</div>
                            <p class="card-text line-height-3">Application For Turkish Citizenship</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-2 border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="font-weight-extra-bold line-height-4 mb-5">Application Types To Obtain Turkish
                        Citizenship By Investment</h2>
                </div>
            </div>
            <div class="row justify-content-center gx-5 gx-lg-4 gx-xl-5">
                <div class="type col-md-6 col-lg-4 col-xxl-3 text-center mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <span class="icon-border mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40.305"><defs></defs><g
                                        transform="translate(0 -0.003)"><path class="a"
                                                                              d="M1.342,40.308H5.383a1.339,1.339,0,0,0,1.342-1.342V37.624h15.2a18.013,18.013,0,0,0,17.74-14.881l.292-1.649a2.529,2.529,0,0,0-2.042-2.932,2.493,2.493,0,0,0-1.59.233V15.419H37a.679.679,0,0,0,.671-.671.739.739,0,0,0-.19-.481L32.081,8.9a.669.669,0,0,0-.948,0l-1.546,1.546V1.312A.679.679,0,0,0,28.916.64H22.19a.679.679,0,0,0-.671.671v7.4H18.791a11.145,11.145,0,0,0-1.2-2.159L19.3,2.391A1.153,1.153,0,0,0,18.674.874,1.167,1.167,0,0,0,17.711.9l-1.269.642L15.64.48A1.165,1.165,0,0,0,14.006.247c-.058.015-.088.058-.131.088L12.853,1.355l-.671-.89A1.18,1.18,0,0,0,10.548.232c-.044.029-.088.073-.131.1l-1.284,1.3-1.94-.554a1.161,1.161,0,0,0-1.444.8,1.145,1.145,0,0,0,.1.875L7.878,6.505c-1.43,1.284-3.166,4.917-3.166,8.214v2.057a4.05,4.05,0,0,0,4.041,4.041H34.562l-1.415,2.845-3.706,1.59a3.344,3.344,0,0,0-3.21-2.407H16.544a18.652,18.652,0,0,0-9.818,2.787V24.187a1.339,1.339,0,0,0-1.342-1.342H1.342A1.317,1.317,0,0,0,0,24.173V38.966A1.339,1.339,0,0,0,1.342,40.308ZM8.856,2.96a1.163,1.163,0,0,0,1.138-.292l1.225-1.225.686.89a1.18,1.18,0,0,0,1.634.233.834.834,0,0,1,.117-.1l1.021-1.021.773,1.021a1.175,1.175,0,0,0,1.459.35l.977-.5L16.369,6.024H14.531L15.392,4.3l-1.2-.6-1.167,2.32H11.861l-.948-1.955L9.7,4.652l.657,1.371H9.147L7.236,2.493Zm6.609,6.419V19.46H8.739a2.687,2.687,0,0,1-2.684-2.684V14.719c0-3.6,2.232-6.959,2.859-7.353h7.616A7.269,7.269,0,0,1,17.3,8.708H16.136A.679.679,0,0,0,15.464,9.379Zm1.342.671h4.712v9.41H16.807Zm14.793.277,3.749,3.749H27.836ZM22.861,1.983h5.383v9.8L25.75,14.281a.669.669,0,0,0,0,.948.649.649,0,0,0,.481.19H26.9V19.46H22.861Zm5.383,13.451H34.97v4.041H33.628v-2.7a.679.679,0,0,0-.671-.671H30.272a.679.679,0,0,0-.671.671V19.46H28.259V15.434Zm4.041,4.027H30.929V17.447h1.342V19.46ZM16.544,24.173h9.687a2.013,2.013,0,1,1,0,4.027H15.464v1.342H26.231a3.337,3.337,0,0,0,3.312-2.9L33.89,24.8a.653.653,0,0,0,.336-.321L36.4,20.132a1.186,1.186,0,0,1,1.59-.525,1.2,1.2,0,0,1,.642,1.269l-.292,1.649A16.654,16.654,0,0,1,21.927,36.282H6.726v-9.06A17.356,17.356,0,0,1,16.544,24.173Zm-15.2,0H5.383V38.966H1.342Z"
                                                                              transform="translate(0 0)"/><path
                                            class="a" d="M1.84,17.95H3.013v1.76H1.84Z"
                                            transform="translate(0.506 8.409)"/><path class="a"
                                                                                      d="M16.59,2.28h.587V3.453H16.59Z"
                                                                                      transform="translate(7.665 0.626)"/><path
                                            class="a" d="M17.98,2.28h.587V3.453H17.98Z"
                                            transform="translate(8.308 0.626)"/><path class="a"
                                                                                      d="M16.59,5.97h.587V7.143H16.59Z"
                                                                                      transform="translate(7.665 2.776)"/><path
                                            class="a" d="M17.98,5.97h.587V7.143H17.98Z"
                                            transform="translate(8.308 2.776)"/><path class="a"
                                                                                      d="M12.19,7.92h.587V9.093H12.19Z"
                                                                                      transform="translate(5.632 3.683)"/><path
                                            class="a" d="M13.57,7.92h.587V9.093H13.57Z"
                                            transform="translate(6.27 3.683)"/><path class="a"
                                                                                     d="M12.19,9.76h.587v1.173H12.19Z"
                                                                                     transform="translate(5.632 4.539)"/><path
                                            class="a" d="M13.57,9.76h.587v1.173H13.57Z"
                                            transform="translate(6.27 4.539)"/><path class="a"
                                                                                     d="M9.856,7.477H9.269V6.89H8.1v.587H7.509a.593.593,0,0,0-.587.587V9.836a.593.593,0,0,0,.587.587h1.76v.587H6.91V11.6a.593.593,0,0,0,.587.587h.587v.587H9.256v-.587h.587a.593.593,0,0,0,.587-.587V9.836a.593.593,0,0,0-.587-.587H8.1v-.6h2.346V8.063A.593.593,0,0,0,9.856,7.477Z"
                                                                                     transform="translate(3.314 3.414)"/></g></svg>
                            </span>
                            <p class="card-text text-4 text-uppercase font-weight-semibold mb-4">Acquire an immovable
                                asset of at least</p>
                            <div class="price">
                                250.000 $
                            </div>
                        </div>
                    </div>
                </div>
                <div class="type col-md-6 col-lg-4 col-xxl-3 text-center mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <span class="icon-border mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40.305"><defs></defs><g
                                        transform="translate(0 -0.003)"><path class="a"
                                                                              d="M1.342,40.308H5.383a1.339,1.339,0,0,0,1.342-1.342V37.624h15.2a18.013,18.013,0,0,0,17.74-14.881l.292-1.649a2.529,2.529,0,0,0-2.042-2.932,2.493,2.493,0,0,0-1.59.233V15.419H37a.679.679,0,0,0,.671-.671.739.739,0,0,0-.19-.481L32.081,8.9a.669.669,0,0,0-.948,0l-1.546,1.546V1.312A.679.679,0,0,0,28.916.64H22.19a.679.679,0,0,0-.671.671v7.4H18.791a11.145,11.145,0,0,0-1.2-2.159L19.3,2.391A1.153,1.153,0,0,0,18.674.874,1.167,1.167,0,0,0,17.711.9l-1.269.642L15.64.48A1.165,1.165,0,0,0,14.006.247c-.058.015-.088.058-.131.088L12.853,1.355l-.671-.89A1.18,1.18,0,0,0,10.548.232c-.044.029-.088.073-.131.1l-1.284,1.3-1.94-.554a1.161,1.161,0,0,0-1.444.8,1.145,1.145,0,0,0,.1.875L7.878,6.505c-1.43,1.284-3.166,4.917-3.166,8.214v2.057a4.05,4.05,0,0,0,4.041,4.041H34.562l-1.415,2.845-3.706,1.59a3.344,3.344,0,0,0-3.21-2.407H16.544a18.652,18.652,0,0,0-9.818,2.787V24.187a1.339,1.339,0,0,0-1.342-1.342H1.342A1.317,1.317,0,0,0,0,24.173V38.966A1.339,1.339,0,0,0,1.342,40.308ZM8.856,2.96a1.163,1.163,0,0,0,1.138-.292l1.225-1.225.686.89a1.18,1.18,0,0,0,1.634.233.834.834,0,0,1,.117-.1l1.021-1.021.773,1.021a1.175,1.175,0,0,0,1.459.35l.977-.5L16.369,6.024H14.531L15.392,4.3l-1.2-.6-1.167,2.32H11.861l-.948-1.955L9.7,4.652l.657,1.371H9.147L7.236,2.493Zm6.609,6.419V19.46H8.739a2.687,2.687,0,0,1-2.684-2.684V14.719c0-3.6,2.232-6.959,2.859-7.353h7.616A7.269,7.269,0,0,1,17.3,8.708H16.136A.679.679,0,0,0,15.464,9.379Zm1.342.671h4.712v9.41H16.807Zm14.793.277,3.749,3.749H27.836ZM22.861,1.983h5.383v9.8L25.75,14.281a.669.669,0,0,0,0,.948.649.649,0,0,0,.481.19H26.9V19.46H22.861Zm5.383,13.451H34.97v4.041H33.628v-2.7a.679.679,0,0,0-.671-.671H30.272a.679.679,0,0,0-.671.671V19.46H28.259V15.434Zm4.041,4.027H30.929V17.447h1.342V19.46ZM16.544,24.173h9.687a2.013,2.013,0,1,1,0,4.027H15.464v1.342H26.231a3.337,3.337,0,0,0,3.312-2.9L33.89,24.8a.653.653,0,0,0,.336-.321L36.4,20.132a1.186,1.186,0,0,1,1.59-.525,1.2,1.2,0,0,1,.642,1.269l-.292,1.649A16.654,16.654,0,0,1,21.927,36.282H6.726v-9.06A17.356,17.356,0,0,1,16.544,24.173Zm-15.2,0H5.383V38.966H1.342Z"
                                                                              transform="translate(0 0)"/><path
                                            class="a" d="M1.84,17.95H3.013v1.76H1.84Z"
                                            transform="translate(0.506 8.409)"/><path class="a"
                                                                                      d="M16.59,2.28h.587V3.453H16.59Z"
                                                                                      transform="translate(7.665 0.626)"/><path
                                            class="a" d="M17.98,2.28h.587V3.453H17.98Z"
                                            transform="translate(8.308 0.626)"/><path class="a"
                                                                                      d="M16.59,5.97h.587V7.143H16.59Z"
                                                                                      transform="translate(7.665 2.776)"/><path
                                            class="a" d="M17.98,5.97h.587V7.143H17.98Z"
                                            transform="translate(8.308 2.776)"/><path class="a"
                                                                                      d="M12.19,7.92h.587V9.093H12.19Z"
                                                                                      transform="translate(5.632 3.683)"/><path
                                            class="a" d="M13.57,7.92h.587V9.093H13.57Z"
                                            transform="translate(6.27 3.683)"/><path class="a"
                                                                                     d="M12.19,9.76h.587v1.173H12.19Z"
                                                                                     transform="translate(5.632 4.539)"/><path
                                            class="a" d="M13.57,9.76h.587v1.173H13.57Z"
                                            transform="translate(6.27 4.539)"/><path class="a"
                                                                                     d="M9.856,7.477H9.269V6.89H8.1v.587H7.509a.593.593,0,0,0-.587.587V9.836a.593.593,0,0,0,.587.587h1.76v.587H6.91V11.6a.593.593,0,0,0,.587.587h.587v.587H9.256v-.587h.587a.593.593,0,0,0,.587-.587V9.836a.593.593,0,0,0-.587-.587H8.1v-.6h2.346V8.063A.593.593,0,0,0,9.856,7.477Z"
                                                                                     transform="translate(3.314 3.414)"/></g></svg>
                            </span>
                            <p class="card-text text-4 text-uppercase font-weight-semibold mb-4">Acquire government
                                bonds of min</p>
                            <div class="price">
                                500.000 $
                            </div>
                        </div>
                    </div>
                </div>
                <div class="type col-md-6 col-lg-4 col-xxl-3 text-center mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <span class="icon-border mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40.305"><defs></defs><g
                                        transform="translate(0 -0.003)"><path class="a"
                                                                              d="M1.342,40.308H5.383a1.339,1.339,0,0,0,1.342-1.342V37.624h15.2a18.013,18.013,0,0,0,17.74-14.881l.292-1.649a2.529,2.529,0,0,0-2.042-2.932,2.493,2.493,0,0,0-1.59.233V15.419H37a.679.679,0,0,0,.671-.671.739.739,0,0,0-.19-.481L32.081,8.9a.669.669,0,0,0-.948,0l-1.546,1.546V1.312A.679.679,0,0,0,28.916.64H22.19a.679.679,0,0,0-.671.671v7.4H18.791a11.145,11.145,0,0,0-1.2-2.159L19.3,2.391A1.153,1.153,0,0,0,18.674.874,1.167,1.167,0,0,0,17.711.9l-1.269.642L15.64.48A1.165,1.165,0,0,0,14.006.247c-.058.015-.088.058-.131.088L12.853,1.355l-.671-.89A1.18,1.18,0,0,0,10.548.232c-.044.029-.088.073-.131.1l-1.284,1.3-1.94-.554a1.161,1.161,0,0,0-1.444.8,1.145,1.145,0,0,0,.1.875L7.878,6.505c-1.43,1.284-3.166,4.917-3.166,8.214v2.057a4.05,4.05,0,0,0,4.041,4.041H34.562l-1.415,2.845-3.706,1.59a3.344,3.344,0,0,0-3.21-2.407H16.544a18.652,18.652,0,0,0-9.818,2.787V24.187a1.339,1.339,0,0,0-1.342-1.342H1.342A1.317,1.317,0,0,0,0,24.173V38.966A1.339,1.339,0,0,0,1.342,40.308ZM8.856,2.96a1.163,1.163,0,0,0,1.138-.292l1.225-1.225.686.89a1.18,1.18,0,0,0,1.634.233.834.834,0,0,1,.117-.1l1.021-1.021.773,1.021a1.175,1.175,0,0,0,1.459.35l.977-.5L16.369,6.024H14.531L15.392,4.3l-1.2-.6-1.167,2.32H11.861l-.948-1.955L9.7,4.652l.657,1.371H9.147L7.236,2.493Zm6.609,6.419V19.46H8.739a2.687,2.687,0,0,1-2.684-2.684V14.719c0-3.6,2.232-6.959,2.859-7.353h7.616A7.269,7.269,0,0,1,17.3,8.708H16.136A.679.679,0,0,0,15.464,9.379Zm1.342.671h4.712v9.41H16.807Zm14.793.277,3.749,3.749H27.836ZM22.861,1.983h5.383v9.8L25.75,14.281a.669.669,0,0,0,0,.948.649.649,0,0,0,.481.19H26.9V19.46H22.861Zm5.383,13.451H34.97v4.041H33.628v-2.7a.679.679,0,0,0-.671-.671H30.272a.679.679,0,0,0-.671.671V19.46H28.259V15.434Zm4.041,4.027H30.929V17.447h1.342V19.46ZM16.544,24.173h9.687a2.013,2.013,0,1,1,0,4.027H15.464v1.342H26.231a3.337,3.337,0,0,0,3.312-2.9L33.89,24.8a.653.653,0,0,0,.336-.321L36.4,20.132a1.186,1.186,0,0,1,1.59-.525,1.2,1.2,0,0,1,.642,1.269l-.292,1.649A16.654,16.654,0,0,1,21.927,36.282H6.726v-9.06A17.356,17.356,0,0,1,16.544,24.173Zm-15.2,0H5.383V38.966H1.342Z"
                                                                              transform="translate(0 0)"/><path
                                            class="a" d="M1.84,17.95H3.013v1.76H1.84Z"
                                            transform="translate(0.506 8.409)"/><path class="a"
                                                                                      d="M16.59,2.28h.587V3.453H16.59Z"
                                                                                      transform="translate(7.665 0.626)"/><path
                                            class="a" d="M17.98,2.28h.587V3.453H17.98Z"
                                            transform="translate(8.308 0.626)"/><path class="a"
                                                                                      d="M16.59,5.97h.587V7.143H16.59Z"
                                                                                      transform="translate(7.665 2.776)"/><path
                                            class="a" d="M17.98,5.97h.587V7.143H17.98Z"
                                            transform="translate(8.308 2.776)"/><path class="a"
                                                                                      d="M12.19,7.92h.587V9.093H12.19Z"
                                                                                      transform="translate(5.632 3.683)"/><path
                                            class="a" d="M13.57,7.92h.587V9.093H13.57Z"
                                            transform="translate(6.27 3.683)"/><path class="a"
                                                                                     d="M12.19,9.76h.587v1.173H12.19Z"
                                                                                     transform="translate(5.632 4.539)"/><path
                                            class="a" d="M13.57,9.76h.587v1.173H13.57Z"
                                            transform="translate(6.27 4.539)"/><path class="a"
                                                                                     d="M9.856,7.477H9.269V6.89H8.1v.587H7.509a.593.593,0,0,0-.587.587V9.836a.593.593,0,0,0,.587.587h1.76v.587H6.91V11.6a.593.593,0,0,0,.587.587h.587v.587H9.256v-.587h.587a.593.593,0,0,0,.587-.587V9.836a.593.593,0,0,0-.587-.587H8.1v-.6h2.346V8.063A.593.593,0,0,0,9.856,7.477Z"
                                                                                     transform="translate(3.314 3.414)"/></g></svg>
                            </span>
                            <p class="card-text text-4 text-uppercase font-weight-semibold mb-4">Deposit in a turkish
                                bank at least</p>
                            <div class="price">
                                500.000 $
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-height-2 border-0 mb-0 pt-5">
        <div class="container container-lg">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-6 text-center mb-4">
                    <h2 class="font-weight-extra-bold line-height-4">Turkish Citizenship by Investment Program:</h2>
                </div>
            </div>
            <section class="section our-vision-section border-0 py-3">
                <div class="container">
                    <div class="row justify-content-between align-items-center" id="description">
                        <div class="col-lg-6 col-xl-5 mb-3">
                            <p style="font-size:1.5em;line-height:1.6em;">
                                In 2017 the Turkish government published the first Turkish citizenship program for
                                foreigners’ draft, the law gave eligibility to foreigners who are interested in Turkish
                                Citizenship to obtain citizenship by investing in 1 million dollars, the foreign
                                investors would be eligible to pass it to his family, wife, and children under 18, but
                                there was no sufficient demanding, therefore the Turkish parliament got the matter of
                                re-studying the law into consideration, therefore the costs’ value adjusted to 500,000 $
                                in the same year, until 2018, the law of Turkish citizenship program for foreigners been
                                fixed and become under processing, and the amount fixed to 250,000 $, Since the 2018 and
                                until today, 77,000 applications been released.
                                The law is offering several different options, by taking into consideration the
                                difference between global investors' aspirations in investment in Turkey.
                                The types of Turkish citizenship applications:
                            </p>
                        </div>
                        <div class="col-lg-6 col-xl-5">
                            <img class="w-100 img-fluid" src="{{ asset('sites/img/citizenship.jpg') }}"
                                 alt="A message from the owners image"/>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ asset('sites/img/ctz1.jpeg') }}"
                         alt="Our mission"/>
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>1- investing with 250,000 $ in real estate assets:</h2>
                    <div class="lead">
                        By buying one or multiple real estates assets in any desirable Turkish City, with
                        <strong>250,000$</strong>, you are eligible to submit your application, by getting the
                        title deed of the
                        property, too (Department of Immigration and Passports?!), with additional legal
                        required papers for your application, and from here on your application will take from 2
                        to 3 months maximum.
                        By clicking on the underlined phrase, the screen scroll down itself to the section of
                        the required legal papers
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center" id="owner-message">
                <div class="col-lg-6 col-xl-5 mb-3">
                    <h2>2- Deposit in a Turkish bank at least 500,000$</h2>
                    <div class="lead">
                        By <strong> depositing 500,000 $ </strong> in any Turkish bank, whether private or
                        governmental Turkish
                        bank, you are eligible to submit your application, by getting the Bank deposit receipt
                        to (Department of Immigration and Passports?!), with additional legal required papers
                        for your application, and from here on your application will take from 2 to 3 months
                        maximum.
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <img class="w-100 img-fluid" src="{{ asset('sites/img/ctz.jpeg') }}"
                         alt="A message from the owners image"/>
                </div>
            </div>
        </div>
    </section>
    <section class="section our-vision-section border-0 py-3">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 order-1 order-lg-0">
                    <img class="w-100 img-fluid" src="{{ asset('sites/img/S08.jpg') }}"
                         alt="Our mission"/>
                </div>
                <div class="col-lg-6 col-xl-5 order-0 order-lg-1 mb-3">
                    <h2>3- establishing a Turkish company and creating 50 job opportunities for Turkish
                        citizens:</h2>
                    <div class="lead">
                        By Establishing a commercial registry in any Turkish City, according to the law, It
                        doesn't matter what the company's specialization is, it can be industrial or commercial,
                        the law doesn't force a foreign investor to have a specific specialization or field of
                        work, what is matter in this section of the law, Is to create 50 job opportunities for
                        50 Turkish citizens
                        By getting both the registration number and the tax, you are eligible to submit your
                        application to (Department of Immigration and Passports?!), with additional legal
                        required papers for your application, and from here on your application will take from 2
                        to 3 months maximum.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-height-2 border-0 mb-0 py-5">
        <div class="container container-lg mb-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-6 text-center mb-5">
                    <h2 class="font-weight-extra-bold line-height-4 mb-5">Required Documents for the program.</h2>
                </div>
            </div>
            <div class="beehive pb-lg-5">
                <div class="center center1">
                    <div class="shape odd">
                        <div class="shape-text">
                            Birth Certificate
                        </div>
                    </div>
                    <div class="shape even secondary">
                        <div class="shape-text">
                            Vital Record that allows all family members as the husband, wife and children, Marriage
                            Certificate, Divorce Certificate
                        </div>
                    </div>
                    <div class="shape odd">
                        <div class="shape-text">
                            Health Insurance
                        </div>
                    </div>
                    <div class="shape even secondary">
                        <div class="shape-text">
                            Passport
                        </div>
                    </div>
                    <div class="shape odd">
                        <div class="shape-text">
                            Power of Attorney
                        </div>
                    </div>
                </div>
                <div class="center center2">
                    <div class="shape odd secondary">
                        <div class="shape-text">
                            Certificate Of Residence
                        </div>
                    </div>
                    <div class="shape even">
                        <div class="shape-text">
                            If the applicant is widowed, Spouse's Death Certificate
                        </div>
                    </div>
                    <div class="shape odd secondary">
                        <div class="shape-text">
                            12 Biometrics Photos taken on white background
                        </div>
                    </div>
                    <div class="shape even">
                        <div class="shape-text">
                            Original and Notarized Turkish translation of these documents
                        </div>
                    </div>
                    <div class="shape odd secondary">
                        <div class="shape-text">
                            Application Forms
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section wwa-section border-0 mt-5 py-4"
             style="background-image: url({{ asset('sites/img/wwa.jpg') }});">
        <div class="container container-lg">
            <div class="row align-items-end justify-content-between">
                <div class="col-sm-6">
                    <span class="d-block font-weight-semibold text-4 mb-1">{{ __('messages.who_we_are') }} !</span>
                    <h2 class="font-weight-extra-bold line-height-1 text-7 mb-5">Turkey Advisors</h2>
                    <h4 class="font-weight-extra-bold text-secondary line-height-1 text-6">{{ __('messages.contact_us_now') }}</h4>
                </div>
                <div class="col-sm-6 text-start text-lg-end mt-4">
                    <a class="btn btn-lg btn-secondary px-4 py-3 w-100-mobile"
                       href="#">{{ __('messages.get_in_touch') }} <span
                            class="arrow1 is-triangle arrow-bar is-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection

