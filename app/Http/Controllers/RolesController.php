<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Http\Resources\UserResource;

class RolesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Role::all(); 
    }

    public function show($id)
    {
        return Role::find($id);
    }

    public function attach(Request $request, string $id)
    {
        $user = User::find($request->userId);
        $exist = false;

        foreach ($user->roles as $role) {
            if ($role == $id) {
                $exist = true;
                break;
            }
        }

        if ($exist) {
            return response()->json([
                'message' => 'Already exist'
            ], 405); 
        }
       
        $user->roles()->attach($id);

        
        return new UserResource($user);
    }
}
