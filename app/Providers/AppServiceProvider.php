<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        //
        Validator::extend('forpideen' , function($attr , $val){
            if($val == 'god' || $val = 'testo'){
                return false;
            }
            return true;
        } , 'OPPS! this word is forbiiden');
    }
}
