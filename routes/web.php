<?php

use App\Http\Controllers\CMS\AdminController;
use App\Http\Controllers\CMS\SettingController;
use App\Http\Controllers\HomeGalleryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomeResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomePageController::class, 'index']);
Route::get('/about-us', [HomePageController::class, 'aboutUs'])->name('about');
Route::get('/cdu-student', [HomePageController::class, 'cduStudents'])->name('cdu.student');
Route::get('/cdu-student/{slug}', [HomePageController::class, 'postShow'])->name('cdu.student.detail');

Route::get('/it-event', [HomePageController::class, 'event'])->name('event');
Route::get('/it-event/{slug}', [HomePageController::class, 'postShow'])->name('event.detail');

Route::get('/gallery', [HomeGalleryController::class, 'index'])->name('gallery');
Route::get('/resources', [HomeResourceController::class, 'index'])->name('resource');
Route::get('/industry', function () {
    return view('front-end.coming_soon');
})->name('industry');
Route::get('secondary-school', [HomePageController::class, 'secondarySchool'])->name('secondary-school');
Route::get('secondary-school/{slug}', [HomePageController::class, 'postShow'])->name('secondary-school.detail');

Route::get('higher-education-institues', [HomePageController::class, 'higherEducation'])->name('higher-education');
Route::get('higher-education-institues/{slug}', [HomePageController::class, 'postShow'])->name('higher-education.detail');

Route::get('industry', [HomePageController::class, 'getIndustry'])->name('industry');
Route::get('industry/{slug}', [HomePageController::class, 'postShow'])->name('industry.detail');

/**
 * CMS Routes
 */
Auth::routes(['register' => false]);

Route::prefix('cms')
    ->middleware(['auth'])
    ->namespace('CMS')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('cms.index');
        Route::get('/login', [AdminController::class, 'login'])->name('cms.login')->withoutMiddleware('auth');

        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('cms.settings');
        Route::post('/settings/{settings}', [SettingController::class, 'store'])->name('cms.settings.store');

        Route::post('resources/storeResourceItem', 'ResourceController@storeResource')
            ->name('cms.resources.storeResourceItem');
        Route::get('resources/{topic}/item/{resourceId}', 'ResourceController@deleteResource')
            ->name('cms.resources.deleteItem');

        Route::as('cms.')->group(function () {
            Route::resource('sponsors', 'SponsorController')->except('show');
            Route::resource('galleries', 'GalleryController')->except('show');
            Route::resource('photos', 'PhotoController')->except('show');
            Route::resource('resources', 'ResourceController');
            Route::resource('teams', 'TeamController')->except('show');
            Route::resource('testimonials', 'TestimonialController')->except('show');
            Route::resource('introduction', 'IntroductionController')->except('show');
            Route::resource('specific-event', 'SpecificEventController')->except('show');
            Route::resource('page', 'PageController')->except('show');
            Route::resource('facts', 'FactController')->except('show');
            Route::resource('account', 'AccountController')->except('show, edit, destroy, store');
            Route::resource('users', 'UserController')->except('show');

            Route::get('posts/{postType}', 'PostController@list')->name('post.category');
            Route::get('posts/{postType}/create', 'PostController@create')->name('post.create');
            Route::post('posts/{postType}', 'PostController@store')->name('post.store');
            Route::get('posts/{postType}/{postId}/edit', 'PostController@edit')->name('post.edit');
            Route::put('posts/{postType}/{postId}', 'PostController@update')->name('post.update');
            Route::delete('posts/{postType}/{postId}', 'PostController@destroy')->name('post.destroy');
        });
    });
