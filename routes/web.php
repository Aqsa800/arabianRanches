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

 /*******************
 * FRONTEND ROUTES  *
 *******************/

Route::namespace('App\Http\Controllers\Frontend')->group(function(){

    Route::any('/', 'HomeController@home')->name('home');
    Route::any('/arabianRanches_1', 'HomeController@arabianRanches1')->name('arabianRanches_1');
    Route::any('/arabianRanches_11', 'HomeController@arabianRanches2')->name('arabianRanches_2');
    Route::any('/arabianRanches_111', 'HomeController@arabianRanches3')->name('arabianRanches_3');
    Route::any('properties', 'HomeController@properties')->name('properties');
    Route::any('contact-us', 'HomeController@contact')->name('contact-us');
    Route::any('enquireForm', 'ContactController@enquireForm')->name('enquireForm');
    Route::any('subscribeForm', 'ContactController@subscribeForm')->name('subscribeForm');
    Route::any('contactForm', 'ContactController@contactForm')->name('contactForm');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Dashboard', 'prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::resource('roles', RoleController::class, ['as' => 'dashboard']);
    Route::resource('tags', TagController::class, ['as' => 'dashboard']);
    Route::resource('offer-types', OfferTypeController::class, ['as' => 'dashboard']);
    Route::resource('developers', DeveloperController::class, ['as' => 'dashboard']);
    Route::resource('defaultStats', DefaultStatController::class, ['as' => 'dashboard']);

    Route::get('developer/{developer}/details', 'DeveloperController@details')->name('dashboard.developer.details');
    Route::get('developer/{developer}/details/create', 'DeveloperController@createDetail')->name('dashboard.developer.details.create');
    Route::post('developer/{developer}/details', 'DeveloperController@storeDetail')->name('dashboard.developer.details.store');
    Route::get('developer/{developer}/details/{detail}/edit', 'DeveloperController@editDetail')->name('dashboard.developer.details.edit');
    Route::put('developer/{developer}/details/{detail}', 'DeveloperController@updateDetail')->name('dashboard.developer.details.update');
    Route::delete('developer/{developer}/details/{detail}', 'DeveloperController@destroyDetail')->name('dashboard.developer.details.destroy');


    Route::resource('agents', AgentController::class, ['as' => 'dashboard']);
    Route::resource('completion-statuses', CompletionStatusController::class, ['as' => 'dashboard']);
    Route::resource('amenities', AmenityController::class, ['as' => 'dashboard']);
    Route::resource('neighbours', NeighbourController::class, ['as' => 'dashboard']);
    Route::resource('subCommunities', SubCommunityController::class, ['as' => 'dashboard']);
    Route::resource('features', FeatureController::class, ['as' => 'dashboard']);
    Route::resource('accommodations', AccommodationController::class, ['as' => 'dashboard']);
    Route::resource('communities', CommunityController::class, ['as' => 'dashboard']);
    Route::get('communities/{community}/media/{media}', 'CommunityController@mediaDestroy')->name('dashboard.communities.media.delete');
    Route::get('communities/{community}/medias', 'CommunityController@mediasDestroy')->name('dashboard.communities.medias.delete');

    Route::post('community/subcommunities', 'CommunityController@subCommunities')->name('dashboard.community.subcommunities');

    Route::get('communities/{community}/stats', 'CommunityStatController@index')->name('dashboard.communities.stats');
    Route::get('communities/{community}/stats/create', 'CommunityStatController@create')->name('dashboard.communities.stats.create');
    Route::post('communities/{community}/stats', 'CommunityStatController@store')->name('dashboard.communities.stats.store');
    Route::get('communities/{community}/stats/{stat}/edit', 'CommunityStatController@edit')->name('dashboard.communities.stats.edit');
    Route::put('communities/{community}/stats/{stat}', 'CommunityStatController@update')->name('dashboard.communities.stats.update');
    Route::delete('communities/{community}/stats/{stat}', 'CommunityStatController@destroy')->name('dashboard.communities.stats.destroy');


    Route::get('communities/{community}/stats/{stat}/statData', 'CommunityStatController@values')->name('dashboard.communities.stats.statData');
    Route::get('communities/{community}/stats/{stat}/statData/create', 'CommunityStatController@createValue')->name('dashboard.communities.stats.statData.create');
    Route::post('communities/{community}/stats/{stat}/statData', 'CommunityStatController@storeValue')->name('dashboard.communities.stats.statData.store');
    Route::get('communities/{community}/stats/{stat}/statData/{statData}/edit', 'CommunityStatController@editValue')->name('dashboard.communities.stats.statData.edit');
    Route::put('communities/{community}/stats/{stat}/statData/{statData}', 'CommunityStatController@updateValue')->name('dashboard.communities.stats.statData.update');
    Route::delete('communities/{community}/stats/{stat}/statData/{statData}', 'CommunityStatController@destroyValue')->name('dashboard.communities.stats.statData.destroy');

    Route::resource('floorPlans', FloorPlanController::class, ['as' => 'dashboard']);
    Route::get('floorPlans/{floorPlan}/subFloor/{subFloorPlan}', 'FloorPlanController@destroySubFloor')->name('dashboard.floorPlans.subFloor.destroy');
    Route::resource('categories', CategoryController::class, ['as' => 'dashboard']);
    Route::resource('awards', AwardController::class, ['as' => 'dashboard']);
    Route::get('awards/{award}/media/{media}', 'AwardController@mediaDestroy')->name('dashboard.awards.media.delete');
    Route::get('awards/{award}/medias', 'AwardController@mediasDestroy')->name('dashboard.awards.medias.delete');

    Route::resource('properties', PropertyController::class, ['as' => 'dashboard']);
    Route::get('properties/{property}/media/{media}', 'PropertyController@mediaDestroy')->name('dashboard.properties.media.delete');
    Route::get('properties/{property}/medias', 'PropertyController@mediasDestroy')->name('dashboard.properties.medias.delete');

    Route::resource('projects', ProjectController::class, ['as' => 'dashboard']);
    Route::get('projects/{project}/media/{media}', 'ProjectController@mediaDestroy')->name('dashboard.projects.media.delete');
    Route::get('projects/{project}/interiorMediasDestroy', 'ProjectController@interiorMediasDestroy')->name('dashboard.projects.interiorMediasDestroy');
    Route::get('projects/{project}/exteriorMediasDestroy', 'ProjectController@exteriorMediasDestroy')->name('dashboard.projects.exteriorMediasDestroy');

    Route::resource('partners', PartnerController::class, ['as' => 'dashboard']);


    Route::post('home/contents', 'PageContentController@homeContentStore')->name('dashboard.homePage.contents.store');
    Route::post('about/contents', 'PageContentController@aboutContentStore')->name('dashboard.aboutPage.contents.store');
    Route::post('ceo/contents', 'PageContentController@ceoContentStore')->name('dashboard.ceoPage.contents.store');

    Route::post('about/gallery', 'PageContentController@aboutGalleryStore')->name('dashboard.about.gallery.store');
    Route::get('about/gallery/{gallery}', 'PageContentController@aboutGalleryDestroy')->name('dashboard.about.gallery.destroy');


    Route::get('{page}/contents/create','PageContentController@create')->name('dashboard.contents.create');
    Route::post('contents', 'PageContentController@store')->name('dashboard.contents.store');
    Route::get('{page}/contents/{content}/edit','PageContentController@edit')->name('dashboard.contents.edit');
    Route::put('{page}/contents/{content}','PageContentController@update')->name('dashboard.contents.update');
    Route::delete('{page}/contents/{content}','PageContentController@destroy')->name('dashboard.contents.destroy');


    Route::get('{page}/faqs/create','FaqController@create')->name('dashboard.faqs.create');
    Route::post('faqs', 'FaqController@store')->name('dashboard.faqs.store');
    Route::get('{page}/faqs/{faq}/edit','FaqController@edit')->name('dashboard.faqs.edit');
    Route::put('{page}/faqs/{faq}','FaqController@update')->name('dashboard.faqs.update');
    Route::delete('{page}/faqs/{faq}','FaqController@destroy')->name('dashboard.faqs.destroy');

    Route::resource('dynamicPages', DynamicPageController::class, ['as' => 'dashboard']);
    Route::get('pageContents/home-page', 'PageContentController@homePage')->name('dashboard.pageContents.home-page');
    Route::get('pageContents/about-page', 'PageContentController@aboutPage')->name('dashboard.pageContents.about-page');
    Route::get('pageContents/properties-page', 'PageContentController@propertiesPage')->name('dashboard.pageContents.properties-page');
    Route::get('pageContents/rent-page', 'PageContentController@rentPage')->name('dashboard.pageContents.rent-page');
    Route::get('pageContents/resale-page', 'PageContentController@resalePage')->name('dashboard.pageContents.resale-page');
    Route::get('pageContents/offPlan-page', 'PageContentController@offPlanPage')->name('dashboard.pageContents.offPlan-page');
    Route::get('pageContents/developers-page', 'PageContentController@developersPage')->name('dashboard.pageContents.developers-page');
    Route::get('pageContents/communities-page', 'PageContentController@communitiesPage')->name('dashboard.pageContents.communities-page');
    Route::get('pageContents/privacyPolicy-page', 'PageContentController@privacyPolicyPage')->name('dashboard.pageContents.privacyPolicy-page');
    Route::get('pageContents/termCondition-page', 'PageContentController@termConditionPage')->name('dashboard.pageContents.termCondition-page');
    Route::get('pageContents/buyerGuide-page', 'PageContentController@buyerGuidePage')->name('dashboard.pageContents.buyerGuide-page');
    Route::get('pageContents/sellerGuide-page', 'PageContentController@sellerGuidePage')->name('dashboard.pageContents.sellerGuide-page');
    Route::get('pageContents/whyInvest-page', 'PageContentController@whyInvestPage')->name('dashboard.pageContents.whyInvest-page');
    Route::get('pageContents/aboutDubai-page', 'PageContentController@aboutDubaiPage')->name('dashboard.pageContents.aboutDubai-page');
    Route::get('pageContents/factFigure-page', 'PageContentController@factFigurePage')->name('dashboard.pageContents.factFigure-page');
    Route::get('pageContents/faqs-page', 'PageContentController@faqsPage')->name('dashboard.pageContents.faqs-page');
    Route::get('pageContents/relocatingToDubai-page', 'PageContentController@relocatingToDubaiPage')->name('dashboard.pageContents.relocatingToDubai-page');

    Route::get('projects/{project}/stats', 'ProjectStatController@index')->name('dashboard.projects.stats');
    Route::get('projects/{project}/stats/create', 'ProjectStatController@create')->name('dashboard.projects.stats.create');
    Route::post('projects/{project}/stats', 'ProjectStatController@store')->name('dashboard.projects.stats.store');
    Route::get('projects/{project}/stats/{stat}/edit', 'ProjectStatController@edit')->name('dashboard.projects.stats.edit');
    Route::put('projects/{project}/stats/{stat}', 'ProjectStatController@update')->name('dashboard.projects.stats.update');
    Route::delete('projects/{project}/stats/{stat}', 'ProjectStatController@destroy')->name('dashboard.projects.stats.destroy');


    Route::get('projects/{project}/stats/{stat}/statData', 'ProjectStatController@values')->name('dashboard.projects.stats.statData');
    Route::get('projects/{project}/stats/{stat}/statData/create', 'ProjectStatController@createValue')->name('dashboard.projects.stats.statData.create');
    Route::post('projects/{project}/stats/{stat}/statData', 'ProjectStatController@storeValue')->name('dashboard.projects.stats.statData.store');
    Route::get('projects/{project}/stats/{stat}/statData/{statData}/edit', 'ProjectStatController@editValue')->name('dashboard.projects.stats.statData.edit');
    Route::put('projects/{project}/stats/{stat}/statData/{statData}', 'ProjectStatController@updateValue')->name('dashboard.projects.stats.statData.update');
    Route::delete('projects/{project}/stats/{stat}/statData/{statData}', 'ProjectStatController@destroyValue')->name('dashboard.projects.stats.statData.destroy');


    Route::get('projects/{project}/subprojects', 'SubProjectController@index')->name('dashboard.projects.subProjects');
    Route::get('projects/{project}/subprojects/create', 'SubProjectController@create')->name('dashboard.projects.subProjects.create');
    Route::post('projects/{project}/subprojects', 'SubProjectController@store')->name('dashboard.projects.subProjects.store');
    Route::get('projects/{project}/subprojects/{subProject}/edit', 'SubProjectController@edit')->name('dashboard.projects.subProjects.edit');
    Route::put('projects/{project}/subprojects/{subProject}', 'SubProjectController@update')->name('dashboard.projects.subProjects.update');
    Route::delete('projects/{project}/subprojects/{subProject}', 'SubProjectController@destroy')->name('dashboard.projects.subProjects.destroy');

    Route::get('projects/{project}/paymentPlans', 'ProjectController@payments')->name('dashboard.project.paymentPlans');
    Route::get('projects/{project}/paymentPlans/create', 'ProjectController@createPayment')->name('dashboard.project.paymentPlans.create');
    Route::post('projects/{project}/paymentPlans', 'ProjectController@storePayment')->name('dashboard.project.paymentPlans.store');
    Route::get('projects/{project}/paymentPlans/{payment}/edit', 'ProjectController@editPayment')->name('dashboard.project.paymentPlans.edit');
    Route::put('projects/{project}/paymentPlans/{payment}', 'ProjectController@updatePayment')->name('dashboard.project.paymentPlans.update');
    Route::delete('projects/{project}/paymentPlans/{payment}', 'ProjectController@destroyPayment')->name('dashboard.project.paymentPlans.destroy');



    Route::get('projects/{project}/subprojects/{subProject}/bedrooms', 'ProjectBedroomController@index')->name('dashboard.projects.subProjects.bedrooms');
    Route::get('projects/{project}/subprojects/{subProject}/bedrooms/create', 'ProjectBedroomController@create')->name('dashboard.projects.subProjects.bedrooms.create');
    Route::post('projects/{project}/subprojects{subProject}/bedrooms', 'ProjectBedroomController@store')->name('dashboard.projects.subProjects.bedrooms.store');
    Route::get('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}/edit', 'ProjectBedroomController@edit')->name('dashboard.projects.subProjects.bedrooms.edit');
    Route::put('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}', 'ProjectBedroomController@update')->name('dashboard.projects.subProjects.bedrooms.update');
    Route::delete('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}', 'ProjectBedroomController@destroy')->name('dashboard.projects.subProjects.bedrooms.destroy');


    Route::get('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}/specifications', 'ProjectBedroomController@specifications')->name('dashboard.projects.subProjects.bedrooms.specifications');
    Route::get('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}/specifications/create', 'ProjectBedroomController@createSpecification')->name('dashboard.projects.subProjects.bedrooms.specifications.create');
    Route::post('projects/{project}/subprojects{subProject}/bedrooms/{bedroom}/specifications', 'ProjectBedroomController@storeSpecification')->name('dashboard.projects.subProjects.bedrooms.specifications.store');
    Route::get('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}/specifications/{specification}/edit', 'ProjectBedroomController@editSpecification')->name('dashboard.projects.subProjects.bedrooms.specifications.edit');
    Route::put('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}/specifications/{specification}', 'ProjectBedroomController@updateSpecification')->name('dashboard.projects.subProjects.bedrooms.specifications.update');
    Route::delete('projects/{project}/subprojects/{subProject}/bedrooms/{bedroom}/specifications/{specification}', 'ProjectBedroomController@destroySpecification')->name('dashboard.projects.subProjects.bedrooms.specifications.destroy');

    Route::get('careers/allApplicants', 'CareerController@allApplicants')->name('dashboard.careers.allApplicants');
    Route::get('careers/applicants/{applicant}', 'CareerController@singleApplicant')->name('dashboard.careers.singleApplicant');
    Route::delete('careers/applicants/{applicant}', 'CareerController@deleteApplicant')->name('dashboard.careers.applicant.destroy');


    Route::resource('careers', CareerController::class, ['as' => 'dashboard']);
    Route::get('careers/{career}/applicants', 'CareerController@applicants')->name('dashboard.careers.applicants');
    Route::get('careers/{career}/applicants/{applicant}', 'CareerController@singleCareerApplicant')->name('dashboard.careers.applicant');



    Route::resource('banners', BannerController::class, ['as' => 'dashboard']);
    Route::resource('cronJobs', cronJobMainController::class, ['as' => 'dashboard']);
    Route::resource('counters', CounterController::class, ['as' => 'dashboard']);
    Route::resource('testimonials', TestimonialController::class, ['as' => 'dashboard']);
    Route::resource('languages', LanguageController::class, ['as' => 'dashboard']);
    Route::resource('services', ServiceController::class, ['as' => 'dashboard']);
    Route::resource('articles', ArticleController::class, ['as' => 'dashboard']);
    Route::resource('video-gallery', VideoGalleryController::class, ['as' => 'dashboard']);
    Route::resource('users', UserController::class, ['as' => 'dashboard']);

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
    Route::resource('page-tags', PageTagController::class, ['as' => 'dashboard']);
});

Route::namespace('App\Http\Controllers\Frontend')->group(function(){
    Route::get('{slug}', 'HomeController@dynamicPage')->name('dynamicPage');
});
