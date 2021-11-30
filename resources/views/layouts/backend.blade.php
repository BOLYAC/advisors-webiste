<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Turkey Advisors | Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('/css/codebase.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/corporate.css') }}"> -->
@yield('css_after')
<!-- Scripts -->
    <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>
<div id="page-container"
     class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-modern main-content-boxed">
    <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="/">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">Tukey</span><span
                                class="font-size-xl text-primary">Advisors</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="javascript:void(0)">
                        <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase"
                               href="javascript:void(0)">J. Smith</a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="link-effect text-dual-primary-dark" data-toggle="layout"
                               data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                <i class="si si-drop"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="javascript:void(0)">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a class="{{ request()->is('/') ? ' active' : '' }}" href="{{ route('admin.dashboard')  }}">
                            <i class="si si-cup"></i><span class="sidebar-mini-hide">{{ __('Dashboard') }}</span>
                        </a>
                    </li>

                    <li class="nav-main-heading">
                        <span class="sidebar-mini-visible">VR</span><span
                            class="sidebar-mini-hidden">{{ __('Site data') }}</span>
                    </li>
                    <li class="{{ request()->is('admin/real-estate/*') ? ' open' : '' }}">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bulb"></i><span
                                class="sidebar-mini-hide">{{ __('Real Estate') }}</span></a>
                        <ul>
                            <li>
                                <a class="{{ request()->is('admin/real-estate/projects') || request()->is('admin/real-estate/projects/*') ? ' active' : '' }}"
                                   href="{{ route('projects.index') }}">{{ __('Projects') }}</a>
                            </li>
                            <li>
                                <a class="{{ request()->is('admin/real-estate/features') || request()->is('admin/real-estate/features/*') ? ' active' : '' }}"
                                   href="{{ route('features.index') }}">{{ __('Facilities') }}</a>
                            </li>
                            <li>
                                <a class="{{ request()->is('admin/real-estate/facilities') || request()->is('admin/real-estate/facilities/*') ? ' active' : '' }}"
                                   href="{{ route('facilities.index') }}">{{ __('Near by') }}</a>
                            </li>
                            <li>
                                <a class="{{ request()->is('admin/real-estate/categories') || request()->is('admin/real-estate/categories/*') ? ' active' : '' }}"
                                   href="{{ route('categories.index') }}">{{ __('Type') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/contacts') ? ' active' : '' }}"
                           href="{{ route('contacts.index')  }}">
                            <i class="si si-envelope-letter"></i><span
                                class="sidebar-mini-hide">{{ __('Contact form') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/site-pages') ? ' active' : '' }}"
                           href="{{ route('site-pages.index')  }}">
                            <i class="si si-docs"></i><span class="sidebar-mini-hide">{{ __('Site pages') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/banners') ? ' active' : '' }}"
                           href="{{ route('banners.index')  }}">
                            <i class="si si-picture"></i><span class="sidebar-mini-hide">{{ __('Slides') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/insta-stories') ? ' active' : '' }}"
                           href="{{ route('insta-stories.index')  }}">
                            <i class="si si-event"></i><span class="sidebar-mini-hide">{{ __('Stories') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/category') ? ' active' : '' }}"
                           href="{{ route('category.index')  }}">
                            <i class="si si-control-start"></i><span
                                class="sidebar-mini-hide">{{ __('Categories') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/posts') ? ' active' : '' }}"
                           href="{{ route('posts.index')  }}">
                            <i class="si si-book-open"></i><span class="sidebar-mini-hide">{{ __('Posts') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/news') ? ' active' : '' }}" href="{{ route('news.index')  }}">
                            <i class="si si-paper-clip"></i><span class="sidebar-mini-hide">{{ __('News') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="{{ request()->is('admin/testimonials') ? ' active' : '' }}"
                           href="{{ route('testimonial.index')  }}">
                            <i class="si si-bubbles"></i><span
                                class="sidebar-mini-hide">{{ __('Testimonial') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="{{ request()->is('admin/faqQuestions') ? ' active' : '' }}"
                           href="{{ route('faqQuestions.index')  }}">
                            <i class="si si-question"></i><span
                                class="sidebar-mini-hide">{{ __('Faq Questions') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/about-page') ? ' active' : '' }}"
                           href="{{ route('aboutPage.index')  }}">
                            <i class="si si-docs"></i><span class="sidebar-mini-hide">{{ __('About Page') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('admin/services-page') ? ' active' : '' }}"
                           href="{{ route('servicesPage.index')  }}">
                            <i class="si si-docs"></i><span class="sidebar-mini-hide">{{ __('Services Page') }}</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">
                        <span class="sidebar-mini-visible">MR</span><span
                            class="sidebar-mini-hidden">{{ __('Settings') }}</span>
                    </li>
                    *
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="si si-location-pin"></i><span
                                class="sidebar-mini-hide">{{ __('Users') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/languages" target="_blank">
                            <i class="si si-location-pin"></i><span
                                class="sidebar-mini-hide">{{ __('Languages') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('settings') }}">
                            <i class="si si-globe"></i><span class="sidebar-mini-hide">{{ __('General') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="content-header-section">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                    <i class="fa fa-navicon"></i>
                </button>
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="content-header-section">
                <!-- User Dropdown -->
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">Turkey Advisors</span>
                        <i class="fa fa-angle-down ml-5"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right min-width-200"
                         aria-labelledby="page-header-user-dropdown">
                        <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">Admin</h5>
                        <a class="dropdown-item" href="{{ route('settings') }}" data-toggle="layout"
                           data-action="side_overlay_toggle">
                            <i class="si si-wrench mr-5"></i> {{ __('Settings') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="si si-logout mr-5"></i> {{ __('Sign Out') }}
                        </a>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-sm clearfix">
            <div class="float-left">
                <a class="font-w600" href="javascript:void(0)" target="_blank">Turkey Advisors</a> &copy; <span
                    class="js-year-copy"></span>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Codebase Core JS -->
<script src="{{ asset('js/codebase.app.js') }}"></script>

<!-- Laravel Scaffolding JS -->
<!-- <script src="{{ asset('js/laravel.app.js') }}"></script> -->

@yield('js_after')
@include('sweetalert::alert')
</body>
</html>
