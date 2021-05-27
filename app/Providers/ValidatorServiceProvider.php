<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend(
            'custom_validator',
            'App\Validators\CustomValidator@validate',
            'Custom validator of :attribute got errors'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {}
}
