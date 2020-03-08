<?php

namespace Krishn\AuthApi;

use Illuminate\Support\ServiceProvider;
use Krishn\AuthApi\Providers\AuthApi;

class AuthApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
           
    }

    public function register()
    {
        $this->app->bind('authapi',function(){

            return new AuthApi();
    
            });
    }
}