<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\UserResource;

class IsDepartmentAvailable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        $response = $next($request);
        $current_department = +$request->route()->parameters()['id'];
        $user_id = auth()->user()->id;

        $user = new UserResource(User::find($user_id));
        if ($request->user()) {
            $departments = $user['departments'];
            $department_ids = [];
            foreach ($departments as $department) {
               $department_ids[] = $department['id'];
            }

            if (!in_array($current_department, $department_ids)) {
                $responseMessage = "Не допустимый департмент, у тебя такого нет";
                return response($responseMessage, 403);
            }
        }

 
        return $response;
    }
}
