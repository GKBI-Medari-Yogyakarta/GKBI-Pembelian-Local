<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewarePembelian
{
    public function handle($request, Closure $next)
    {
        if (auth()->guard('pembelian')->user()) {
            return $next($request);
        }
        if (\session()->has('pembelian')) {
            return \redirect()->back()->with(['msg' => 'anda tidak memiliki akses ke halaman yang dituju!!']);
        }
        return \redirect()->route('login.index')->with(['warning' => 'you must be login']);
    }
}
