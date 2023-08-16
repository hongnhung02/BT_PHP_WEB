<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('cates', Category::all());
            $total_cart = 0;
            if (Auth::check()) {
                $carts = Cart::where('user_id', Auth::id())->get();
                foreach ($carts as $cart) {
                    $total_cart += $cart->product->price;
                }
            }
            $view->with('total_cart', $total_cart);
        });
    }
}
