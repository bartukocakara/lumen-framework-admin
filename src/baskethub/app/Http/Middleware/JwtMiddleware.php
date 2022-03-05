<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use App\Traits\ApiResponse;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;

class JwtMiddleware extends BaseMiddleware
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
    */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
            $this->jwt = $jwt;
    }
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = auth()->userOrFail();
        } catch (Exception $e) {
            return $this->unauthorizedResponse();
        }
        return $next($request);
    }
}
