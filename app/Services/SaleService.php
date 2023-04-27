<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleService
{

    public function __construct(Type $var = null)
    {

    }

    public function createSale(Request $request)
    {
        $event = Sale::create([
            "placement_date" => $request->placementDate,
            "payed_date" => $request->payedDate,
            "start" => $request->start,
            "end" => $request->end,
            "id_1c" => $request->id_1c,
            "sale_items" => json_encode($request->saleItems),
            "smi_id" => $request->smi_id,
            "type_id" => $request->type,
            "user_id" => $request->userId,
            "client_id" => $request->client_id
        ]);

        return $event;
    }

    public function getEventByID($id)
    {
        return Sale::find($id);
    }
}
