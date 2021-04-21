<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()) {
            return $next($request);
        }
        if (\session()->has('user')) {
            return \redirect()->back()->with(['msg' => 'anda tidak memiliki akses ke halaman yang dituju!!']);
        }
        return \redirect()->route('login.index')->with(['warning' => 'you must be login']);
    }
}
