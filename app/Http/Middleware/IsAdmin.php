<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class IsAdmin
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
            if (Session::has('status') && Session::get('status') == 'admin') {
                return $next($request);
            }else{
                return redirect('masuk')->with('alert', 'Mohon maaf anda bukan admin, kembali ke halaman <a href="/dasbor">dasbor</a>');
            }
        }
        
        return redirect('masuk')->with('alert', 'Login Terlebih Dahulu');
    }
}
