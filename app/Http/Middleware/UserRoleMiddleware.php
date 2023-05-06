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
        if(Auth::check() && Auth::payload()['roles'] && in_array( $role , Auth::payload()['roles']))
        {
            return $next($request);
        }

        $responseMessage = "You do not have permission to access for this page. only " . $role . " can do it.";
        return response($responseMessage, 403);
    }
}
