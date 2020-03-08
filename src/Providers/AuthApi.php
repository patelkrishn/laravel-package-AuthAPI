<?php

namespace Krishn\AuthApi\Providers;
use Krishn\AuthApi\Providers\AuthApiProvider;

class AuthApi extends AuthApiProvider
{
    public function appUrl()
    {
        echo  $this->app_url;
    }
    
    
}