<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cookie;
use App\Models\Traffic;

class SetCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (is_null(Cookie::get('user_token'))) {
            $token = hash("sha256", time() . rand(0, 100));
            $expired = 7200000; // 2 hour
            Cookie::queue('user_token', $token, $expired);
            Traffic::create(['user_token' => $token]);
        } else {
            if (!Traffic::where('user_token', Cookie::get('user_token'))->exists()) {
                Traffic::create(['user_token' => Cookie::get('user_token')]);
            }
        }

        return $next($request);
    }
}
