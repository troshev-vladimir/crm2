<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $page = 0;
        $per_page = 10;

        if ($request->filled('page')) {
            $page = $request->query('page') - 1;
        }

        if ($request->filled('per_page')) {
            $per_page = $request->query('per_page');
        }

        $users = User::limit($per_page)->offset($page * $per_page);

        if ($request->filled('login')) {
            $login = $request->get('login');
            $users->where('login', 'like', "%$login%");
        }

        if ($request->filled('roles')) {
            $role_id = $request->query('roles');
            $users = User::leftJoin('user_role', 'user_role.user_id', '=', 'users.id' )
              ->select('users.*')
              ->where('user_role.role_id', $role_id )
              ->groupBy('users.login');
        }

        //->orderBy('position')
        $resp = $users->get();
        return new UserCollection($resp);
        // return new UserCollection(User::paginate());
    }

    public function show($id)
    {
        $userId = auth()->user()['id'];
        $user = User::findOrFail($userId);
        $isManager = false;

        foreach ($user->roles as $role) {
            if ($role->name === 'Manager' || $role->name === 'Admin' ) {
                $isManager = true;
            }
        }

        if ($id == $userId || $isManager ) {
            return new UserResource(User::find($id));
        } else {
            return response()->json([
                'message' => 'Вы не имеете прав для промотра других пользователей'
            ], 403);
        }

    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'login' => 'required|string|max:40',
        //     'description' => 'required|string|max:255',
        // ]);

        $data = $request->all();
        return User::create($data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
