<?php

namespace Krishn\AuthApi\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Manager;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthApiProvider
{
        protected $app_url;
        protected $response;
        protected $message='Authenticated';

	public function __construct(){
                // $this->request = $request;
                $this->app_url = env('API_URL');
                $response =Http::withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer '.Cookie::get('access_token'),
                        // 'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6NTc1OFwvYXBpXC9sb2dpbiIsImlhdCI6MTU4MzY3NTU3NCwiZXhwIjoxNTgzNjc2MTc0LCJuYmYiOjE1ODM2NzU1NzQsImp0aSI6Imx5WWh6ZDhHd2QzVkVtVjEiLCJzdWIiOjQsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.uVyKBmqad5zyc5YtVKZ587Zm8pbLDV6Fo1OWrfDhvGE',
                    ])->post(env('API_URL')."/me", [
                        
                    ]);
                    if ($response->successful()) {
                        $response=json_decode($response);
                        $this->response=$response;
                    }elseif ($response->clientError()) {
                        $response=json_decode($response);
                        $this->response=$response;
                        $this->message=$response->message;
                    }elseif ($response->serverError()) {
                        $response=json_decode($response);
                        $this->response=$response;
                        $this->message=$response->message;
                    }
	}
}