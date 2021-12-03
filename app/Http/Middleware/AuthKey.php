<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthKey
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
        $token=$request->header('APP_KEY');
        if($token=='PFC_APP_2021') {
            return $next($request);
        } else {
            return response()->json(['message'=>'Token Error. Token recibida: '.$token],401);
        }
    }
}
