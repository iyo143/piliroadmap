<?php

namespace App\Providers;

use App\Models\ArticleCategory;
use App\Models\Banner;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        $viewcategories=ArticleCategory::get();
        View::share('viewcategories', $viewcategories);

        $viewBanner = Banner::latest()->first();
        View::share('viewBanner', $viewBanner);


        Paginator::useBootstrap();
    }
}
