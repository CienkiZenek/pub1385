<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAktywny
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(\Auth::user()->stan!=='Aktywny'){

            return redirect(route('stronaGlowne'));
        }
        return $next($request);
    }
}
