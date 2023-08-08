<?php

namespace App\Providers;

use App\Models\Banners;
use App\Models\PageTag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\WebsiteSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pagemeta = null;
        $banner = null;
        $footer_logo = null;
        Paginator::useBootstrap();
        if (Schema::hasTable('website_settings')) {
            if(WebsiteSetting::where('key', 'logo')->exists()){
                View::share('logo', WebsiteSetting::getLogo());
            }
            if(WebsiteSetting::where('key', 'favicon')->exists()){
                View::share('favicon', WebsiteSetting::getFavicon());
            }
            if(WebsiteSetting::where('key', 'footer_logo')->exists()){
                $footer_logo = WebsiteSetting::getFooterLogo();
            }
            if(WebsiteSetting::where('key', 'website_name')->exists()){
                View::share('name', WebsiteSetting::getSetting('website_name')? WebsiteSetting::getSetting('website_name') : '');
            }
            if(WebsiteSetting::where('key', 'website_url')->exists()){
                View::share('website_url', WebsiteSetting::getSetting('website_url')? WebsiteSetting::getSetting('website_url') : '');
            }
            if(WebsiteSetting::where('key', 'slogan')->exists()){
                View::share('slogan', WebsiteSetting::getSetting('slogan')? WebsiteSetting::getSetting('slogan') : '');
            }
            if(WebsiteSetting::where('key', 'website_keyword')->exists()){
                View::share('website_keyword', WebsiteSetting::getSetting('website_keyword')? WebsiteSetting::getSetting('website_keyword') : '');
            }
            if(WebsiteSetting::where('key', 'website_description')->exists()){
                View::share('website_description', WebsiteSetting::getSetting('website_description')? WebsiteSetting::getSetting('website_description') : '');
            }
            if(WebsiteSetting::where('key', 'contact_number')->exists()){
                View::share('contact_number', WebsiteSetting::getSetting('contact_number')? WebsiteSetting::getSetting('contact_number') : '');
            }
            if(WebsiteSetting::where('key', 'email')->exists()){
                View::share('email', WebsiteSetting::getSetting('email')? WebsiteSetting::getSetting('email') : '');
            }
            if(WebsiteSetting::where('key', 'address')->exists()){
                View::share('address', WebsiteSetting::getSetting('address')? WebsiteSetting::getSetting('address') : '');
            }
            if(WebsiteSetting::where('key', 'facebook')->exists()){
                View::share('facebook', WebsiteSetting::getSetting('facebook')? WebsiteSetting::getSetting('facebook') : '');
            }
            if(WebsiteSetting::where('key', 'instagram')->exists()){
                View::share('instagram', WebsiteSetting::getSetting('instagram')? WebsiteSetting::getSetting('instagram') : '');
            }
            if(WebsiteSetting::where('key', 'whatsapp')->exists()){
                View::share('whatsapp', WebsiteSetting::getSetting('whatsapp')? WebsiteSetting::getSetting('whatsapp') : '');
            }
            if(WebsiteSetting::where('key', 'linkedin')->exists()){
                View::share('linkedin', WebsiteSetting::getSetting('linkedin')? WebsiteSetting::getSetting('linkedin') : '');
            }
            if(WebsiteSetting::where('key', 'twitter')->exists()){
                View::share('twitter', WebsiteSetting::getSetting('twitter')? WebsiteSetting::getSetting('twitter') : '');
            }
            if(WebsiteSetting::where('key', 'youtube')->exists()){
                View::share('youtube', WebsiteSetting::getSetting('youtube')? WebsiteSetting::getSetting('youtube') : '');
            }
        }
        if (Schema::hasTable('page_tags')) {
            if(PageTag::where('page_url',url()->current())->exists()){
               $pagemeta =  PageTag::where('page_url',url()->current())->first();
                View::share('pagemeta', $pagemeta);

            }
        }
        if (Schema::hasTable('banners')) {

            if(Banners::where('page_url',url()->current())->exists()){
               $banner =  Banners::where('page_url',url()->current())->first();

                View::share('banner', $banner);

            }
        }
        View::share('banner', $banner);
        View::share('pagemeta', $pagemeta);
        View::share([
            
            'footer_logo' => $footer_logo,
        ]);

    }
}
