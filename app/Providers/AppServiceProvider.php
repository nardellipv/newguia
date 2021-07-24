<?php

namespace App\Providers;

use App\Blog;
use App\Commerce;
use App\Message;
use App\Product;
use App\Province;
use Illuminate\Support\Facades\Auth;
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

        view::composer(
            [
                'adminSite.parts._asideMenu',
                'adminSite.index',
            ],
            function ($view) {
                $commerce = Commerce::where('user_id', userConnect()->id)
                    ->first();

                $view->with('commerce', $commerce);
            }
        );

        //        contador mensajes sin leer
        view::composer(
            [
                'adminSite.parts._asideMenu',
                'adminSite.index',
            ],
            function ($view) {
                if (userConnect()->type == 'OWNER') {
                    $commerce = Commerce::where('user_id', auth()->user()->id)
                        ->first();

                    $countMessage = Message::where('commerce_id', $commerce->id)
                        ->where('read', 'NO')
                        ->count();

                    $countProducts = Product::where('commerce_id', $commerce->id)
                        ->count();

                    $view->with([
                        'countMessage' => $countMessage,
                        'countProducts' => $countProducts,
                    ]);
                }
            }
        );
    }
}
