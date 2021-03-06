<?php

use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Frontend Routes
Route::namespace('Site')->prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {

    Route::get('/', [SiteController::class, 'landing'])->name('home');

    Route::get(LaravelLocalization::transRoute('routes.projects'), [SiteController::class, 'projectList'])->name('projects');
    Route::get(LaravelLocalization::transRoute('routes.properties'), [SiteController::class, 'propertyList'])->name('properties');
    Route::get(LaravelLocalization::transRoute('routes.blog'), [SiteController::class, 'blog'])->name('blog');
    Route::get(LaravelLocalization::transRoute('routes.articles'), [SiteController::class, 'articles'])->name('articles');
    Route::get(LaravelLocalization::transRoute('routes.news'), [SiteController::class, 'news'])->name('news');
    Route::get(LaravelLocalization::transRoute('routes.about'), [SiteController::class, 'about'])->name('about');
    Route::get(LaravelLocalization::transRoute('routes.contact'), [SiteController::class, 'contact'])->name('contact');
    Route::get(LaravelLocalization::transRoute('routes.works'), [SiteController::class, 'works'])->name('works');
    Route::get(LaravelLocalization::transRoute('routes.citizenship-by-investment'), [SiteController::class, 'citizenShipPage'])->name('citizenShipPage');
    Route::get(LaravelLocalization::transRoute('routes.services'), [SiteController::class, 'services'])->name('services');
    Route::get(LaravelLocalization::transRoute('routes.faqQuestions'), [SiteController::class, 'faqQuestions'])->name('faqQuestion');
    Route::get(LaravelLocalization::transRoute('routes.service'), [SiteController::class, 'service'])->name('service');
    Route::get(LaravelLocalization::transRoute('routes.servicesVirtualTour'), [SiteController::class, 'servicesVirtualTour'])->name('virtual.tour');
    Route::view('/privacy-policy', 'site/privacyPolicy')->name('privacyPolicy');
    Route::view('/terms-of-use', 'site/termsOfUse')->name('termsOfUse');
    Route::post(LaravelLocalization::transRoute('routes.contact/submit'), [ContactUsFormController::class, 'ContactUsForm'])->name('submit.contact');
    Route::post(LaravelLocalization::transRoute('routes.newsletter/submit'), [ContactUsFormController::class, 'newsletterSubscribe'])->name('submit.subscribe');
    Route::get(LaravelLocalization::transRoute('routes.blog/{slug}'), [SiteController::class, 'getPost'])->name('post.details');
    Route::get(LaravelLocalization::transRoute('routes.news/{slug}'), [SiteController::class, 'getNews'])->name('news.details');
    Route::get(LaravelLocalization::transRoute('routes.projects/{slug}'), [SiteController::class, 'getProject'])->name('project.detail');
    Route::get(LaravelLocalization::transRoute('routes.properties/{slug}'), [SiteController::class, 'getProperty'])->name('property.detail');
    Route::post(LaravelLocalization::transRoute('routes.search'), [SiteController::class, 'search'])->name('search');
    Route::post(LaravelLocalization::transRoute('routes.searchFull'), [SiteController::class, 'searchFull'])->name('searchFull');
    //Route::get(LaravelLocalization::transRoute('routes.search/{city?}'), [SiteController::class, 'search'])->name('search.city');

    Route::get('/currency-switch/{currency}', [SiteController::class, 'switchCurrency '])->name('switch_currency');

    Route::get('/story/{id}', [SiteController::class, 'getStories'])->name('story');

    // Facebook login
    Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
    Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
    // Twitter login
    Route::get('auth/twitter', [SocialController::class, 'loginwithTwitter']);
    Route::get('auth/callback/twitter', [SocialController::class, 'cbTwitter']);
    // Google Login
    Route::get('auth/google', [SocialController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [SocialController::class, 'handleGoogleCallback']);
    // Search
    Route::get('searchFull', [SiteController::class, 'searchFull']);
    // Favors
    Route::post('ajaxRequest', [SiteController::class, 'ajaxRequest'])->name('ajaxRequest');

    // After subscription
    /// Contact form and project form
    Route::view('/thank-you-for-submitting-the-form', 'site/thankyou')->name('ContactThankYou');
    /// Newsletter subscription
    Route::view('/thank-you-to-join-newsletter', 'site/thankyou')->name('newsletterThankYou');
    ///  Registration
    Route::view('/thank-you-to-register', 'site/thankyou')->name('registrationThankYou');

    Route::get('/project/fatch/', [DashboardController::class, 'getProject']);
});
Route::view('/citizenship/lpen', 'site/landing-pages/landing-page-en');
Route::view('/citizenship/lpar', 'site/landing-pages/landing-page-ar');
Route::view('/citizenship/lpfa', 'site/landing-pages/landing-page-fa');
Route::view('/landing-page', 'site/landing-pages/landing-page');

Route::get('/landing', function (){

    return 'Hello';
   return view('site.landing-pages.landing-page');
});
// Admin routes
Auth::routes([
    'verify' => false, // Email Verification Routes...
]);
require 'admin.php';
