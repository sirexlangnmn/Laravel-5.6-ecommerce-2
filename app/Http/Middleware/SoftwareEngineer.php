<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SoftwareEngineer
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->isSoftwareEngineer()) {
                return $next($request);
            }
        }

        /*protected $redirectTo = '/home';*/
        /*protected $redirectTo = '/';*/

        return redirect('/');
    }
}
