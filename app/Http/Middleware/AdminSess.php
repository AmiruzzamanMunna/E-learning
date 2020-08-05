<?php

namespace App\Http\Middleware;

use Closure;

class AdminSess
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
        if(!$request->session()->get('loggedAdmin')){

            return redirect()->route('admin.loginAdmin');
        }
        return $next($request);
    }
}
