<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', function () {
            /*$projects = \App\Models\Project::query()->count();
            $properties = \App\Models\Property::query()->count();
            $messages  = \App\Models\Contact::query()->count();
            return view('admin.dashboard.index', compact('projects', 'properties', 'messages'));*/
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        Route::resource('site-pages', 'TopicController', ['parameters' => [
            'site-pages' => 'topic'
        ]]);
        Route::post('site-pages/check_slug', 'TopicController@check_slug')
            ->name('pages.check_slug');
        Route::post('category/check_slug', 'CategoryController@check_slug')
            ->name('category.check_slug');
        Route::post('posts/check_slug', 'PostController@check_slug')
            ->name('posts.check_slug');
        Route::post('news/check_slug', 'ArticleController@check_slug')
            ->name('news.check_slug');
        Route::resource('banners', 'BannerController');
        Route::resource('contacts', 'ContactController');
        Route::resource('category', 'CategoryController');
        Route::resource('posts', 'PostController');
        Route::resource('news', 'ArticleController', ['parameters' => [
            'news' => 'article'
        ]]);
        Route::get('/settings', 'SettingController@index')->name('settings');
        Route::post('/settings', 'SettingController@update')->name('settings.update');

        Route::group(['prefix' => 'real-estate'], function () {
            Route::resource('features', 'FeatureController');
            Route::resource('facilities', 'FacilityController');
            Route::resource('categories', 'SectionController', ['parameters' => [
                'categories' => 'section'
            ]]);
            Route::resource('projects', 'ProjectController');
            Route::post('projects/check_slug', 'ProjectController@check_slug')
                ->name('projects.check_slug');
            Route::post('images/upload', 'ProjectController@upload')
                ->name('projects.images.upload');
            Route::get('images/{id}/delete', 'ProjectController@delete')
                ->name('projects.images.delete');
            Route::resource('properties', 'PropertyController');
            Route::post('properties/check_slug', 'PropertyController@check_slug')
                ->name('properties.check_slug');
            Route::post('projects/add-floor', 'ProjectController@createNewPlan')
                ->name('projects.add.floor');
            Route::post('projects/update-floor', 'ProjectController@updatePlan')
                ->name('projects.update.floor');
        });
    });
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login.post');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');
});
