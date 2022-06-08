<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\User;
use App\City;
use Illuminate\Support\Facades\Schema;

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
        //view::composer('*',function() it can be written as same as thus
        view()->composer('*',function($view){//the 1st parameter is for views and * mean for all views , and second thing is return back function
            $categories = Category::all();
            $view->with('categories', $categories); 
            //1st paramter is the upper variable that have the data and second parameter is the variable to which we are assigning the data
            //$view is the parameter we want to send back

            $sellerShops = User::where('role',2)->get();
            $view->with('shops', $sellerShops);

            $citiesall = City::all();
            $view->with('citiesall',$citiesall);

        });


        Schema::defaultStringLength(191);
    }
}
