<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsKasirOrAdmin
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
        if (Session::has('is_login') && Session::get('is_login') == TRUE) {
            if (Session::has('status') && (Session::get('status') == 'admin' || Session::get('status') == 'kasir')) {
                return $next($request);
            }
        }
        
        return redirect('masuk')->with('alert', 'Login Terlebih Dahulu');
    }
}
