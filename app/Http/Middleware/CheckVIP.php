<?php

namespace App\Http\Middleware;

use Closure;

class CheckVIP
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
        if (Auth::check() && Auth::user()->is_vip) {
            return $next($request);
        }

        return redirect()->route('request_vip')->with(['flag' => 'danger', 'message' => 'Bạn cần quyền VIP để xem nội dung']);
    }
}