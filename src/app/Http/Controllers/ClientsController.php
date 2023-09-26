<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientCollection;
use App\Models\Client;
use App\Models\ClientJob;
use App\Models\ClientPotential;
use App\Models\ClientActivity;
use App\Models\Division;
use App\Services\ClientService;
use App\Http\Requests\StoreClientsRequest;
use App\Http\Filters\ClientFilter;
use App\Models\Legal;

class ClientsController extends Controller
{
    public function __construct(Type $var = null) {
        $this->middleware('auth:api');
        $this->service = new ClientService();
    }

    public function index(ClientFilter $filter) {
        $per_page = $filter->query()['per_page'] ?? 10;
        $clients = Client::filter($filter)->paginate($per_page);
        return new ClientCollection($clients);
    }

    public function getByDepartment($departmentId) {
        return $this->service->getClientsByDepartment($departmentId)[0];
    }

    public function store(StoreClientsRequest $request) {
        $validated = $request->validated();
        return $this->service->createClient($request);
    }

    public function show($id) {
        return new ClientResource(Client::find($id));
    }

    public function update(Request $request, $id) {
        // $validated = $request->validated();
        return $this->service->updateClient($request, $id);
    }

    public function delete($id) {
        $client = Client::findOrFail($id);
        $client->delete();
        return [
            'message' => 'Успешно Удалён клиент ' . $client['name']
        ];
    }

    public function getClientJobs(Request $request) {
        $clientJobs = ClientJob::all();
        return $clientJobs;
    }

    public function getClientActivitys(Request $request) {
        $getClientActivitys = ClientActivity::all();
        return $getClientActivitys;
    }

    public function getClientPotentials(Request $request) {
        $getClientPotentials = ClientPotential::all();
        return $getClientPotentials;
    }

    public function getClientMetadata(Request $request) {
        $clientJobs = $this->getClientJobs($request);
        $clientActivitys = $this->getClientActivitys($request);
        $clientPotentials = $this->getClientPotentials($request);
        return [
            "jobs" => $clientJobs,
            "activitys" => $clientActivitys,
            "potentials" => $clientPotentials,
        ];
    }
}
