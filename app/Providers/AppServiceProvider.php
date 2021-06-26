<?php

namespace App\Providers;

use App\Blog;
use App\Commerce;
use App\Province;
use Illuminate\Support\Facades\View;
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
        //comercios random y listado en el aside
        view::composer(
            [
                'web.listingCommerce._aside',
                'web.recipe._asideRecipe',
                'web.blog._asideRight'
            ],
            function ($view) {
                $sponsors = Commerce::with(['user', 'province'])
                    ->where('type', '!=', 'FREE')
                    ->inRandomOrder()
                    ->take(2)
                    ->get();


                $randCommerces = Commerce::with(['user'])
                    ->where('about', '!=', NULL)
                    ->inRandomOrder()
                    ->take(2)
                    ->get();

                $view->with([
                    'randCommerces' => $randCommerces,
                    'sponsors' => $sponsors,
                ]);
            }
        );

        view::composer('web.blog._asideLeft', function ($view) {
            $mostRead = Blog::orderBy('view', 'DESC')
                ->take(4)
                ->get();

            $view->with('mostRead', $mostRead);
        });
    }
}
