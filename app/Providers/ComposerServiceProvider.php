<?php

namespace App\Providers;

use App\Province;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //contador de comercios por provincia
        /* view::composer(
            [
                'web.listingCommerce._aside'
            ],
            function ($view) {
                $province = Province::withCount(['commerce'])
                    ->get();

                $view->with([
                    'province' => $province,
                ]);
            }
        ); */
    }
}
