<?php

namespace App\Services;

use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService
{
    // public function createUser(Request $request): User
    // {
    //     // Create user
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     // Avatar upload and update user
    //     if ($request->hasFile('avatar')) {
    //         $avatar = $request->file('avatar')->store('avatars');
    //         $user->update(['avatar' => $avatar]);
    //     }

    //     return $user;
    // }


    public function getUserByEmail ($email) {
        $currentUser = DB::table('users')
            ->where('email', $request->email)
            ->leftJoin('user_role', 'users.id', '=', 'user_role.user_id')
            ->leftJoin('roles', 'role_id', '=', 'roles.id')
            // ->groupBy('login')
            ->get();

        return json_decode($currentUser, true);
    }

    public function getUserByID($id)
    {
        return User::find($id);
    }
}
