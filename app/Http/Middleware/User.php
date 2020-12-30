<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if (Auth::id() != 1) {
            return $next($request);
        } elseif (Auth::id() == 1) {
            return redirect(route('admin_index'));    
        }

        return redirect('login');
    }
}
