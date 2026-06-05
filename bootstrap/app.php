<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->alias([
            'is_admin' => \App\Http\Middleware\AdminMiddleware::class,
            'is_user' => \App\Http\Middleware\UserMiddleware::class,
        ]);
        
        $middleware->redirectGuestsTo(function ($request) {
            // return route('admin.login');
            if ($request->is('admin') || $request->is('admin/*')) {
                return route('admin.login');
            }

            if ($request->is('user') || $request->is('user/*')) {
                return route('login');
            }

            // fallback (optional)
            return route('login');

        });

    })

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })

    ->withMiddleware(function ($middleware) {
        $middleware->validateCsrfTokens(except: [
            'razorpay/webhook',
        ]);
    })

    ->create();