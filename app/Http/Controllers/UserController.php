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
            $page = $request->query('page');
        }

        if ($request->filled('per_page')) {
            $per_page = $request->query('per_page');
        }
            
        $users = User::limit($per_page)->offset($page * $per_page);
        // if ($request->filled('roles')) {
        //     $users = User::with([
        //         'roles' => function ($query) {
        //             $query->where('role_id', 1);
        //         }
        //     ]);
        //     $users = User::with([

        // }

        if ($request->filled('login')) {
            $login = $request->get('login');
            $users->where('login', 'like', "%$login%");
        }
        //->orderBy('position')
        $resp = $users->get();
        return new UserCollection($resp);
        // return new UserCollection(User::paginate()); 
    }

    public function show($id)
    {
        return new UserResource(User::find($id));
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
        // $roleIds = [1, 2];
        // $user->permissions()->attach($roleIds);
        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
