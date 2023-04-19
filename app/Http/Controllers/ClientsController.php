<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientCollection;
use App\Models\Client;
use App\Models\Division;
use App\Services\ClientService;
use App\Http\Requests\StoreClientsRequest;
use App\Http\Filters\ClientFilter;

class ClientsController extends Controller
{
    public function __construct(Type $var = null)
    {
        $this->middleware('auth:api');
        $this->service = new ClientService();
    }

    public function index(ClientFilter $filter)
    {
        $clients = Client::filter($filter)->paginate();
        return new ClientCollection($clients);
    }

    public function getByDepartment($departmentId)
    {
        return $this->service->getClientsByDepartment($departmentId)[0];
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

    public function update(Request $request, $id)
    {
        // $validated = $request->validated();

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
