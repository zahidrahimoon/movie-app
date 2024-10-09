<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...

    protected $routeMiddleware = [
        // ...
        'auth.user' => \App\Http\Middleware\AuthUser::class,
        'auth.admin' => \App\Http\Middleware\AuthAdmin::class,
    ];
}
