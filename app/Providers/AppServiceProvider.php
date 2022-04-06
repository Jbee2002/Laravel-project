<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Category;
use App\Models\Cart;
use App\Models\OrderDetail;
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
        Paginator::useBootstrap();
        view()->composer('*',function($view) {
            $cart = new Cart;
            $categories = Category::orderBy('name','ASC')->where('status',1)->get();
            $view->with(compact('categories','cart'));

        });
    }
}
