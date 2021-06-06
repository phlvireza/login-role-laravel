<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if(Auth::user()->role == 'Admin') //bergantung apakah role terdapat pada tabel yang sama atau beda
        {
            return $next($request);
        }
        return abort(403,'Unauthorized Action');
    }
}
