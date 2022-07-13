<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use Illuminate\Pagination\Paginator;
use App\Interfaces\BlogRepositoryInterface;
use App\Repositories\BlogRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);


        view()->composer('*', function ($view)
        {
    
        $top_trend= \App\Models\Blog::where('top_trending','yes')->orderBy('id','DESC')->take(10)->get();
        $bottom_trends = \App\Models\Blog::where('bottom_trending','yes')->orderBy('id','DESC')->take(5)->get();
        $setting=\App\Models\Setting::findOrFail(1);

        $socialShare = \Share::page(
            'https://www.nicesnippets.com/blog/laravel-custom-foreign-key-name-example',
            'Laravel Custom Foreign Key Name Example',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        
        $view->with(compact('setting','top_trend','bottom_trends','socialShare'));
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

    }
}
