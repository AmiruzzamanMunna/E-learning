<?php

namespace App\Http\Middleware;

use Closure;

class UserSess
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
        if(!$request->session()->get('loggedUser')){

            $request->session()->flash('message','You need to login');

            return redirect()->route('user.login');
        }
        return $next($request);
    }
}
