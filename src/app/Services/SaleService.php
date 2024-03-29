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
        $this->dateService = new DateService();
    }

    public function createSale(Request $request)
    {
        $event = Sale::create([
            //model -> request
            "placement_date" => $this->dateService->createDate($request->placementDate) ?? '',
            "payed_date" => $this->dateService->createDate($request->payedDate) ?? '',
            "start" => $this->dateService->createDate($request->start) ?? '',
            "end" => $this->dateService->createDate($request->end) ?? '',
            "id_1c" => $request->id_1c ?? '',
            "sale_items" => json_encode($request->saleItems) ?? '',
            "smi_id" => $request->smi_id,
            "type_id" => $request->type_id,
            "client_id" => $request->client_id,
            "summa" => getSumma($request->saleItems) ?? '',
            "title" => $request->title ?? '',
            "user_id" => $request->user_id,
        ]);

        return $event;
    }

    public function updateSale(Request $request, $id)
    {
        $summ = getSumma($request->saleItems);
        $sale = Sale::findOrFail($id);

        if ($sale['locked']) return ['message' => 'Эта продажа уже заблокирована'];

        $sale->update([
            "placement_date" => $this->dateService->createDate($request->placementDate) ?? '',
            "payed_date" => $this->dateService->createDate($request->payedDate) ?? '',
            "start" => $this->dateService->createDate($request->start) ?? '',
            "end" => $this->dateService->createDate($request->end) ?? '',
            "id_1c" => $request->id_1c ?? '',
            "sale_items" => json_encode($request->saleItems) ?? '',
            "smi_id" => $request->smi_id,
            "type_id" => $request->type_id,
            "user_id" => $request->user_id,
            "client_id" => $request->client_id,
            "summa" => $summ ?? '',
            'locked' => $request->locked ?? '',
            "title" => $request->title ?? '',
        ]);
        return $sale;
    }


    public function getEventByID($id)
    {
        return Sale::find($id);
    }
}

function getSumma($json)
{
    $summa = 0;

    foreach ($json as $item) {
        $summa = $summa + $item['summ'];
    }
    return $summa;
}

