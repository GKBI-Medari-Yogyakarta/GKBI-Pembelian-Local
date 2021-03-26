<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareAkuntansi
{
    public function handle($request, Closure $next)
    {
        if (auth()->guard('akuntansi')->user()) {
            return $next($request);
        }
        if (\session()->has('akuntansi')) {
            return \redirect()->back()->with(['msg' => 'anda tidak memiliki akses ke halaman yang dituju!!']);
        }
        return \redirect()->route('login.index')->with(['warning' => 'you must be login']);
    }
}
