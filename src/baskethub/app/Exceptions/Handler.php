<?php

namespace App\Exceptions;

use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (ValidationException $e, $request) {
            if($request->expectsJson()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'data' => null,
                    'error' => $e->errors()
                ], 422);
            }
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    "status" => false,
                    "message" => 'Valid auth credentials required',
                    "data" => null,
                    "error" => null
                ], 401);
            }
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if($request->expectsJson()) {
                return response()->json([
                    "status" => false,
                    "message" => "Not found",
                    "data" => null,
                    "error" => null
                ], 404);
            }
        });
    }
}
