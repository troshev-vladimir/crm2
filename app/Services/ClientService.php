<?php

namespace App\Services;
 
use App\Models\Client;
use App\Models\Division;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Services\DepartmentService;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentCollection;

class ClientService
{

    public function __construct(Type $var = null)
    {
        $this->departmentService = new DepartmentService();
    }

    public function createClient(Request $request)
    {
        // Create user
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'phone_add' => $request->phone_add,
            'site' => $request->site,
            'vk' => $request->vk,
            'birth_day' => $request->birth_day,
            'division_id' => $request->divisionId,
            'user_id' => $request->userId
        ]);

 
        // if ($request->hasFile('avatar')) {
        //     $avatar = $request->file('avatar')->store('avatars');
        //     $user->update(['avatar' => $avatar]);
        // }
        
       
        return $client;
    }

    public function getClientsByDepartment($departmentId)
    {
        $department = $this->departmentService->getById($departmentId) ;
        $divisions = $department->divisions;
        $result = [];
        foreach ($divisions as $division) {
            $clients = Division::find($division['id'])->clients;
            $result[] = $clients;
        }
        return $result;
    }


    public function getClientByID($id)
    {
        return Client::find($id);
    }
}
