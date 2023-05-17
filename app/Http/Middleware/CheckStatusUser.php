<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatusUser
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
        if (Auth::check()) {
            if (Auth::user()->status == 1){
                return $next($request);
            } else {
                Auth::logout();
                toastr()->error('Tài khoản của bạn đã bị khóa, vui lòng liên hệ quản trị viên');
    
                return redirect()->route('auth.show.login');
            }
        }

        return $next($request);
    }
}
