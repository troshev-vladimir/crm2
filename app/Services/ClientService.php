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
use App\Services\ClientContactService;
use App\Http\Resources\DepartmentResource;
use App\Http\Resources\DepartmentCollection;

class ClientService
{

    public function __construct(Type $var = null)
    {
        $this->departmentService = new DepartmentService();
        $this->clientContactService = new ClientContactService();
        $this->clientLegalService = new ClientLegalService();
    }

    public function createClient(Request $request)
    {
        $client = Client::create([
            'name' => $request->name ?? '',
            'email' => $request->email ?? '',
            'phone' => $request->phone ?? '',
            'phone_add' => $request->phone_add ?? '',
            'site' => $request->site ?? '',
            'vk' => $request->vk ?? '',
            'birth_day' => $request->birth_day ?? null,
            'division_id' => $request->division_id,
            'user_id' => $request->userId,
            'address' => $request->address ?? '',
            'address_add' => $request->address_add ?? '',
            'comment' => $request->comment ?? '',
            'potencial_id' => $request->potencial_id,
            'activity_id' => $request->activity_id,
            'active'=> $request->active ?? true,
            'federal'=> $request->federal ?? false,
            'top'=> $request->top ?? false,
            'prioritet'=> $request->prioritet ?? false,
        ]);

        if ($request->legals && count($request->legals)) {
            $clientLegel = $this->clientLegalService->createClientLegal($request->legals, $client['id']);
        }

        if ($request->contacts && count($request->contacts)) {
            $clientContact = $this->clientContactService->createClientContact($request->contacts, $client['id']);
        }
        return [
            'message' => 'Успешно создан новый клиент ' . $client['name']
        ];
        // return $client;
    }

    public function updateClient(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());

        if ($request->legals && count($request->legals)) {
            $this->clientLegalService->updateClientLegal($request->legals);
        }

        if ($request->contacts && count($request->contacts)) {
            $clientContact = $this->clientContactService->updateClientContact($request->contacts);
        }
        return [
            'message' => 'Успешно отредактирован клиент ' . $client['name']
        ];
        // return $client;
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
