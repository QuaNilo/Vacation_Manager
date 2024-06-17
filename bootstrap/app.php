<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'recaptcha' => \App\Http\Middleware\ValidateRecaptcha::class,
            'manager.access' => \App\Http\Middleware\ManagerAccess::class,
            'check.company' => \App\Http\Middleware\CheckCompany::class,
            'check.not.company' => \App\Http\Middleware\CheckNotCompany::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
