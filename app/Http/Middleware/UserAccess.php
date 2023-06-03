<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if(auth()->user() && auth()->user()->type == $userType){

            return $next($request);

        }
        else if(auth()->user() && auth()->user()->type == 'user')
        {
            return redirect()->route('user.add.sanitize');
        }
        return back();
    }
}
