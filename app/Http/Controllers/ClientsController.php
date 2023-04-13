<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientCollection;
use App\Models\Client;
use App\Models\Division;
use App\Services\ClientService;
use App\Http\Requests\StoreClientsRequest;

class ClientsController extends Controller
{
    public function __construct(Type $var = null)
    {
        $this->service = new ClientService();
    }
   public function index(Request $request)
    {
        $clients = Client::all();
        return new ClientCollection($clients);
        // return new UserCollection(User::paginate()); 
    }

    public function getByDepartment($departmentId)
    {
        return $this->service->getClientsByDepartment($departmentId);
    }
    
    public function store(StoreClientsRequest $request)
    {
        $validated = $request->validated();
        return $this->service->createClient($request);
    }

    public function show($id)
    {
        return new ClientResource(Client::find($id));
    }

    public function update(StoreClientsRequest $request, $id)
    {
        $validated = $request->validated();

        $client = Client::findOrFail($id);
        $client->update($request->all());
        return $client;
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    }
}
