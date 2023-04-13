<?php

namespace App\Services;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Services\UserService;  

class DepartmentService
{
    public function __construct() {
        $this->userService = new UserService();
    }

    public function getAll() {
       return Department::all();
    }

    public function getById($id) {
        return Department::find($id);
    }

    public function attachToUser($userId, $departmentId) {
        $user = $this->userService->getUserByID($userId);
        $userDepartments= $user['departments'];

        $exist = false;
        foreach ($userDepartments as $userDepartment) {
            if ($userDepartment['id'] == $departmentId) {
                $exist = true;
                break;
            }
        }

        if (!$exist) {
            try {
                $user->departments()->attach($departmentId);
            } catch (\Throwable $th) {
                throw new \Exception('Нет такой роли');
            }
        } else {
            throw new \Exception('Already exist');
        }
    }

    public function detachToUser($userId, $departmentId) {
        $user = $this->userService->getUserByID($userId);
        $userDepartments= $user['departments'];

        $exist = false;
        foreach ($userDepartments as $userDepartment) {
            if ($userDepartment['id'] == $departmentId) {
                $exist = true;
                break;
            }
        }

        if ($exist) {
            try {
                $user->departments()->detach($departmentId);
            } catch (\Throwable $th) {
                throw new \Exception('Нет такой роли');
            }
        } else {
            throw new \Exception('Already removed');
        }
    }
}
