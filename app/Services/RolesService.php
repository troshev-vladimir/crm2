<?php

namespace App\Services;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Services\UserService;  
use App\Models\Role;

class RolesService
{
    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function attachRole($userId, $roleId) {
        // if ($roleId > 3) throw new Exception('Role not exist');

        $user = $this->userService->getUserByID($userId);
        $userRoles = $user['roles'];

        $exist = false;
        foreach ($userRoles as $userRole) {
            if ($userRole['id'] == $roleId) {
                $exist = true;
                break;
            }
        }

        if (!$exist) {
            try {
                $user->roles()->attach($roleId);
            } catch (\Throwable $th) {
                throw new \Exception('Нет такой роли');
            }
        } else {
            throw new \Exception('Already exist');
        }
    }
}
