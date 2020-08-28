<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsAllUserLevel
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
        $status = Session::get('status');
        $status_require = ['kasir', 'admin', 'owner'];
        if (Session::has('is_login') && Session::get('is_login') == TRUE) {
            if (Session::has('status') && in_array($status, $status_require)) {
                return $next($request);
            }
        }
        
        return redirect('masuk')->with('alert', 'Login Terlebih Dahulu');
    }
}
