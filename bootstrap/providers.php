<?php

return [

    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
        //

    App\Providers\BroadcastServiceProvider::class,
    App\Providers\EventServiceProvider::class,

    App\Providers\ExceptionServiceProvider::class,
            //
            // customised due to the changes made laravel 12+ and how app is bootstrapped in kernel 

    App\Providers\RateLimiterServiceProvider::class,
    
    // App\Providers\RouteServiceProvider::class,

];
