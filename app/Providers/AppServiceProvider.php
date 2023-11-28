<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Menu;
use App\Page;
use App\Setting;
use App\Product;
use App\GlobalSetting;
use App\Product_cat;

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
        //
        view()->composer('*', function ($view) {
            //Page
            $pages = Page::where('status', 'active')->get();
            //Blog
            $menu_blog = Menu::where([
                ['status', 'active'],
                ['postcat_id', '<>', 0]
            ])->first();
            // Menu
            $menus = Menu::where([
                ['status', 'active']
            ])->get();
            //Product-cat
            $cat1 = Product_cat::where([
                ['status', 'active'],
                ['parent_id', 0]
            ])->get();
            $min_price = Product::min('price');
            $max_price = Product::max('price');
            $min_price_range = $min_price - 200000;
            $max_price_range = $max_price + 10000000;
            //settings
            $phone_contact = Setting::where('config_key', 'phone_contact')->first()->config_value;
            $facebook_link = Setting::where('config_key', 'facebook_link')->first()->config_value;
            //Global Setting
            $scriptHead = GlobalSetting::where('id', 1)->first()->header;

            $scriptFooter = GlobalSetting::where('id', 1)->first()->footer;

            $scriptBodyTop = GlobalSetting::where('id', 1)->first()->bodyTop;
            $scriptBodyBottom = GlobalSetting::where('id', 1)->first()->bodyBottom;

            $view->with('menu_blog', $menu_blog)->with('phone_contact', $phone_contact)->with('facebook_link', $facebook_link)->with('pages', $pages)->with('menus', $menus)->with('cat1', $cat1)->with('min_price', $min_price)->with('max_price', $max_price)->with('min_price_range', $min_price_range)->with('max_price_range', $max_price_range)->with('scriptHead', $scriptHead)->with('scriptFooter', $scriptFooter)->with('scriptBodyTop', $scriptBodyTop)->with('scriptBodyBottom', $scriptBodyBottom);
        });
    }
}
