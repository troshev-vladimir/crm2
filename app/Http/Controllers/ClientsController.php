<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientCollection;
use App\Models\Client;

class ClientsController extends Controller
{
   public function index(Request $request)
    {
        $users = Client::all();
        return new ClientCollection($users);
        // return new UserCollection(User::paginate()); 
    }

}
