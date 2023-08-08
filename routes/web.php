<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// clear chache route
Route::get('/clear-cache', function() {
    $exitCode    = Artisan::call('cache:clear');
    $config      = Artisan::call('config:cache');
    $view        = Artisan::call('view:clear');
    $optimize        = Artisan::call('optimize:clear');
    return "Cache is cleared";
 });

 /*****************
* CRON JOB ROUTES *
*****************/
Route::get('cronjob/property/addxml', 'App\Http\Controllers\CronController@addxml')->name('cronjob/property/addxml');
Route::get('cronjob/property/addxmlMainImg', 'App\Http\Controllers\CronController@addxmlMainImg')->name('cronjob/property/addxmlMainImg');
Route::get('cronjob/property/addxmlSubImg', 'App\Http\Controllers\CronController@addxmlSubImg')->name('cronjob/property/addxmlSubImg');
Route::get('store', 'App\Http\Controllers\CronController@storeCache');
 /*******************
 * FRONTEND ROUTES  *
 *******************/

Route::namespace('App\Http\Controllers\Frontend')->group(function(){

    Route::any('/', 'HomeController@home')->name('home');
    Route::any('/arabianRanches_1', 'HomeController@arabianRanches1')->name('arabianRanches_1');
    Route::any('/arabianRanches_11', 'HomeController@arabianRanches2')->name('arabianRanches_2');
    Route::any('/arabianRanches_111', 'HomeController@arabianRanches3')->name('arabianRanches_3');
    Route::any('properties', 'HomeController@properties')->name('properties');
    Route::any('property/{slug}', 'HomeController@singleProperty')->name('singleProperty');
    Route::any('contact-us', 'HomeController@contact')->name('contact-us');
    Route::any('enquireForm', 'ContactController@enquireForm')->name('enquireForm');
    Route::any('subscribeForm', 'ContactController@subscribeForm')->name('subscribeForm');
    Route::any('contactForm', 'ContactController@contactForm')->name('contactForm');
    Route::any('reachoutForm', 'ContactController@contactForm')->name('reachoutForm');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Dashboard', 'prefix' => 'dashboard', 'middleware' => 'auth'], function() {

    Route::get('/settings', [SettingController::class, 'index']);
    Route::resource('offer-types', OfferTypeController::class, ['as' => 'dashboard']);
    Route::resource('developers', DeveloperController::class, ['as' => 'dashboard']);
    Route::resource('agents', AgentController::class, ['as' => 'dashboard']);
    Route::resource('completion-statuses', CompletionStatusController::class, ['as' => 'dashboard']);
    Route::resource('amenities', AmenityController::class, ['as' => 'dashboard']);
    Route::resource('neighbours', NeighbourController::class, ['as' => 'dashboard']);
    Route::resource('subCommunity', SpecificationController::class, ['as' => 'dashboard']);
    Route::resource('features', FeatureController::class, ['as' => 'dashboard']);
    Route::resource('accommodations', AccommodationController::class, ['as' => 'dashboard']);
    Route::resource('communities', CommunityController::class, ['as' => 'dashboard']);
    Route::resource('categories', CategoryController::class, ['as' => 'dashboard']);
    Route::resource('properties', PropertyController::class, ['as' => 'dashboard']);
    Route::resource('teams', TeamController::class, ['as' => 'dashboard']);
    Route::resource('banners', BannerController::class, ['as' => 'dashboard']);
    Route::resource('testimonials', TestimonialController::class, ['as' => 'dashboard']);
    Route::resource('blogs', BlogController::class, ['as' => 'dashboard']);
    Route::resource('latestNews', NewController::class, ['as' => 'dashboard']);
    Route::resource('users', UserController::class, ['as' => 'dashboard']);
    Route::resource('page-tags', PageTagController::class, ['as' => 'dashboard']);
    Route::resource('leads', LeadController::class, ['as' => 'dashboard']);
    Route::get('profileSettings', 'ProfileSettingController@get')->name('dashboard.profileSettings');
    Route::put('profileSettings', 'ProfileSettingController@update')->name('dashboard.profileSettings.update');
    Route::get('bulk-sms', 'WebsiteSettingController@getSmsBulk')->name('dashboard.bulk-sms');
    Route::put('bulk-sms', 'WebsiteSettingController@updateSmsBulk')->name('dashboard.bulk-sms.update');
    Route::get('recaptcha-site-key', 'WebsiteSettingController@getRecaptchaSiteKey')->name('dashboard.recaptcha-site-key');
    Route::put('recaptcha-site-key', 'WebsiteSettingController@updateRecaptchaSiteKey')->name('dashboard.recaptcha-site-key.update');
    Route::get('social-info', 'WebsiteSettingController@getSocialInfo')->name('dashboard.social-info');
    Route::put('social-info', 'WebsiteSettingController@updateSocialInfo')->name('dashboard.social-info.update');
    Route::get('basic-info', 'WebsiteSettingController@getBasicInfo')->name('dashboard.basic-info');
    Route::put('basic-info', 'WebsiteSettingController@updateBasicInfo')->name('dashboard.basic-info.update');
    Route::any('properties/destroySpec/{id}', 'PropertyController@destroySpec')->name('dashboard.properties.destroySpec');
    Route::any('community/destroySpec/{id}', 'CommunityController@destroySpec')->name('dashboard.community.destroySpec');
});



