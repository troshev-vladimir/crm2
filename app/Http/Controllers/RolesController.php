<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Services\RolesService;

class RolesController extends Controller {
    public function __construct()
    {
        $this->userService = new UserService();
        $this->rolesService = new RolesService();
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
        try {
            $this->rolesService->attachRole($request->userId, $id);
        } catch (err) {
            return response()->json([
                'message' => err
            ], 405);
        }
        return response()->json([
            'message' => 'Успешно добавлена роль'
        ], 201);
    }

    public function detach(Request $request, string $id)
    {
        try {
            $this->rolesService->detachRole($request->userId, $id);
        } catch (err) {
            return response()->json([
                'message' => err
            ], 405);
        }
        return response()->json([
            'message' => 'Успешно удалена роль'
        ],  201);
    }


}
