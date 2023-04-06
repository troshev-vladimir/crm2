<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return new UserCollection(User::paginate()); 
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
