<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function ($router) {
            Route::prefix('api/v1')
                ->middleware('api')
                ->name('api.v1.')
                ->namespace('App\Http\Controllers\api\v1')
                ->group(base_path('routes/api.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (NotFoundHttpException $exception, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => $exception->getMessage(),
                ], 404);
            }
        });

        $exceptions->render(function (ValidationException $exception, $request) {
            if ($request->is('api/*')) {
                $errors = $exception->validator->errors()->getMessages();
                $code = 422;
                return response()->json(['errors' => ['message' => $errors, 'code' => $code]], $code);
            }
        });
    })->create();
