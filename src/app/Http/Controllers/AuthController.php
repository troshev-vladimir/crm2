<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Services\RolesService;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->rolesService = new RolesService();
        $this->middleware('auth:api', ['except' => ['login','register', 'refresh']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $currentUser = DB::table('users')
            ->where('email', $request->email)
            ->leftJoin('user_role', 'users.id', '=', 'user_role.user_id')
            ->leftJoin('roles', 'role_id', '=', 'roles.id')
            // ->groupBy('login')
            ->get();

        if (!count($currentUser)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Пользователя с таким email нет',
            ], 404);
        }

        $userRoles;
        foreach (json_decode($currentUser, true) as $user) {
            $userRoles[] = $user['name'];
        }

        $credentials = $request->only('email', 'password');
        $token = auth()->claims(['roles' => $userRoles])->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Пароль не подходит',
            ], 403);
        }


        $user = Auth::user();
        return response()->json([
                'status' => 'success',
                'user' => auth()->user(),
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);

    }

    public function register(Request $request){
        $request->validate([
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->rolesService->attachRole($user['id'], 1);

        $updatedUser = User::find($user['id']);
        $currentUser = DB::table('users')
            ->where('email', $user['email'])
            ->leftJoin('user_role', 'users.id', '=', 'user_role.user_id')
            ->leftJoin('roles', 'role_id', '=', 'roles.id')
            // ->groupBy('login')
            ->get();
        $userRoles;
        foreach (json_decode($currentUser, true) as $user) {
            $userRoles[] = $user['name'];
        }
        $token = auth()->claims(['roles' => $userRoles])->login($updatedUser);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $currentUser,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => auth()->user(),
            'authorisation' => [
                'token' => auth()->refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}