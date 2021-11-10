<?php

use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\Site\SiteController;
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
    Route::view('/privacy-policy', 'privacyPolicy')->name('privacyPolicy');
    Route::view('/terms-of-use', 'termsOfUse')->name('termsOfUse');
    Route::post(LaravelLocalization::transRoute('routes.contact/submit'), [ContactUsFormController::class, 'ContactUsForm'])->name('submit.contact');
    Route::post(LaravelLocalization::transRoute('routes.newsletter/submit'), [ContactUsFormController::class, 'newsletterSubscribe'])->name('submit.subscribe');
    Route::get(LaravelLocalization::transRoute('routes.blog/{slug}'), [SiteController::class, 'getPost'])->name('post.details');
    Route::get(LaravelLocalization::transRoute('routes.news/{slug}'), [SiteController::class, 'getNews'])->name('news.details');
    Route::get(LaravelLocalization::transRoute('routes.projects/{slug}'), [SiteController::class, 'getProject'])->name('project.detail');
    Route::get(LaravelLocalization::transRoute('routes.properties/{slug}'), [SiteController::class, 'getProperty'])->name('property.detail');
    Route::post(LaravelLocalization::transRoute('routes.search'), [SiteController::class, 'search'])->name('search');
    //Route::get(LaravelLocalization::transRoute('routes.search/{city?}'), [SiteController::class, 'search'])->name('search.city');

    Route::get('/currency-switch/{currency}', [SiteController::class, 'switchCurrency'])->name('switch_currency');

});

// Admin routes
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
require 'admin.php';
