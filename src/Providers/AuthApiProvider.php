<?php

namespace Krishn\AuthApi\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Manager;

class AuthApiProvider
{
        protected $app_url;
	public function __construct(){
        // $this->request = $request;
        $this->app_url = env('API_URL');
		
	}
}