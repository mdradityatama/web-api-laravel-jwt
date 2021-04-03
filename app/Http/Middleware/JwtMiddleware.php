<?php

namespace App\Http\Middleware;

use App\Helpers\MessageError;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try
        {
            $user = JWTAuth::parseToken()->authenticate();
        }
        catch (Exception $e)
        {
            if ($e instanceof TokenInvalidException)
            {
                return response()->json(MessageError::TOKEN_INVALID);
            }
            else if ($e instanceof TokenExpiredException)
            {
                return response()->json(MessageError::TOKEN_EXPIRED);
            }
            else
            {
                return response()->json(MessageError::TOKEN_NOT_FOUND);
            }
        }

        return $next($request);
    }
}
