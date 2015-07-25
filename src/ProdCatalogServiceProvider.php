<?php

namespace Kleshchs\ProdCatalog;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ProdCatalogServiceProvider extends ServiceProvider {


    /**
     * ServiceProvider bootstrapping
     */
    public function boot()
    {

        // publish migrations
        $this->publishes([
            realpath(__DIR__.'/migrations') => $this->app->databasePath().'/migrations',
        ]);

        // load views
        if(is_dir(base_path() . '/resources/views/packages/kleshch-s/laravel-products-catalog')) {
            $this->loadViewsFrom(__DIR__.'/resources/views/packages/kleshch-s/laravel-products-catalog', 'prodCatViews');
        } else {
            $this->loadViewsFrom(__DIR__.'/views', 'prodCatViews');
        }

        // register routes
        require base_path().'/app/Http/routes.php';
        Route::resource('products','\Kleshchs\ProdCatalog\Controllers\ProductController', ['excepts' => ['show']]);
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }


}