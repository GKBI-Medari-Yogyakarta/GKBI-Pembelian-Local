<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareAkuntansi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guard('akuntansi')->user()) {
            return $next($request);
        }
        return \redirect()->back()->with(['msg' => 'anda tidak memiliki akses ke halaman yang dituju!!']);
    }
}
