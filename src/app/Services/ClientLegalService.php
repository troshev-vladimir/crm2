<?php

namespace App\Services;

use App\Models\Legal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ClientLegalService
{
    public function createClientLegal($legals, $clientId)
    {

        foreach ($legals as $legal) {
            Legal::create([
                'client_id' => $clientId,
                // '1c_kontragent_key'=> $legal['name'],
                'legal_entity'=> $legal['legal_entity'] ?? '',
                'legal_address'=> $legal['legal_address'] ?? '',
                'address'=> $legal['address'] ?? '',
                'ogrn'=> $legal['ogrn'] ?? '',
                'inn'=> $legal['inn'] ?? '',
                'opf'=> $legal['opf'] ?? '',
                'leader_name'=> $legal['leader_name'] ?? '',
                'accouter_name'=> $legal['accouter_name'] ?? '',
                'bank'=> $legal['bank'] ?? '',
                'bic'=> $legal['bic'] ?? '',
                'inn_bank'=> $legal['inn_bank'] ?? '',
                'kpp'=> $legal['kpp'] ?? '',
                'r_count'=> $legal['r_count'] ?? '',
                'k_count'=> $legal['k_count'] ?? '',
                'comment'=> $legal['comment'] ?? '',
            ]);
        }
    }

    public function updateClientLegal($newLegals)
    {
        foreach ($newLegals as $newLegal) {
            $legal = Legal::findOrFail($newLegal['id']);
            $legal->update($newLegal);
        }
    }
}
