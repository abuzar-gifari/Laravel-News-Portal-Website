<?php

namespace App\Providers;

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
        view()->share('global_top_ad_data',$top_ad_data);
        view()->share('global_sidebar_top_ad',$sidebar_top_ad);
        view()->share('global_sidebar_bottom_ad',$sidebar_bottom_ad);
    }
}
