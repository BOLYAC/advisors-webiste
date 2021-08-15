@extends('layouts.backend')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">
                <i class="fa fa-gears text-muted mr-5"></i> {{ __('Website settings') }}
            </h2>
            <h3 class="h5 text-muted mb-0">
            </h3>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="block">
                    <ul class="nav flex-column nav-tabs nav-tabs-block">
                        <li class="nav-item"><a class="nav-link active" href="#general"
                                                data-toggle="tab">{{ __('General') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#site-logo" data-toggle="tab">{{__('Site
                            Logo')}}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#footer-seo" data-toggle="tab">{{ __('Footer
                                & SEO') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#social-links" data-toggle="tab">{{ __('Social
                                Links') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#analytics"
                                                data-toggle="tab">{{ __('Analytics') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="block block-rounded block-fx-shadow">
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="general">
                            @include('admin.settings.includes.general')
                        </div>
                        <div class="tab-pane fade" id="site-logo">
                            @include('admin.settings.includes.logo')
                        </div>
                        <div class="tab-pane fade" id="footer-seo">
                            @include('admin.settings.includes.footer_seo')
                        </div>
                        <div class="tab-pane fade" id="social-links">
                            @include('admin.settings.includes.social_links')
                        </div>
                        <div class="tab-pane fade" id="analytics">
                            @include('admin.settings.includes.analytics')
                        </div>
                        <!-- END Contact Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page end content -->
@endsection
