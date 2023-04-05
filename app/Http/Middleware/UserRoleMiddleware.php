<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class UserRoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if(Auth::check() && Auth::user()->role == $role)
        {
            return $next($request);
        }
        
        return response()->json(['You do not have permission to access for this page.', Auth::payload()->toArray()]);
    }
}
