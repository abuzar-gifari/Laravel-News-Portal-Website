<?php

namespace App\Providers;

use App\Models\TopAdvertisement;
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
        $top_ad_data = TopAdvertisement::where('id',1)->first();
        view()->share('global_top_ad_data',$top_ad_data);
    }
}
