<?php

namespace App\Services;

use App\Models\ClientContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ClientContactService
{
    public function createClientContact($contacts, $clientId)
    {
        foreach ($contacts as $contact) {
            $cientContact = ClientContact::create([
                'name' => $contact['name'],
                'phone' => $contact['phone'],
                'phone_add' => $contact['phone_add'],
                'email' => $contact['email'],
                'comment' => $contact['comment'],
                'job_id' => $contact['job'],
                'client_id' => $clientId,
            ]);
        }
    }

    public function getClientByID($id)
    {
        return ClientContact::find($id);
    }
}
