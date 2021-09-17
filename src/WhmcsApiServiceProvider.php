<?php

namespace FintechSystems\WhmcsApi;

use Illuminate\Support\ServiceProvider;

class WhmcsApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('whmcs-api', function () {
            return new WhmcsApi([
                'url'            => env('WHMCS_URL'),
                'api_identifier' => env('WHMCS_API_IDENTIFIER'),
                'api_secret'     => env('WHMCS_API_SECRET'),
            ], env('WHMCS_API_MODE'));
        });
    }
}
