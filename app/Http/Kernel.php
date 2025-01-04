<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        // Global middleware
    ];

    /**
     * The middleware groups for the application.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Web middleware
        ],

        'api' => [
            // API middleware
        ],
    ];

    /**
     * The route middleware for the application.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Other middleware
        'dashboard.login' => \App\Http\Middleware\AdminAuth::class,  // Correctly register the middleware here
    ];
}
