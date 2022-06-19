<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\SidebarAdvertisement;
use App\Models\TopAdvertisement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        // For Working Paginate Functionality,
        Paginator::useBootstrap();

        $top_ad_data = TopAdvertisement::where('id',1)->first();
        $sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location','Top')->get();
        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location','Bottom')->get();

        $categories = Category::with('rSubCategory')->where('show_on_menu','Show')->get();

        $page_data = Page::where('id',1)->first();
        
        view()->share('global_top_ad_data',$top_ad_data);
        view()->share('global_sidebar_top_ad',$sidebar_top_ad);
        view()->share('global_sidebar_bottom_ad',$sidebar_bottom_ad);
        view()->share('global_categories',$categories);
        view()->share('global_page_data',$page_data);
    }
}
