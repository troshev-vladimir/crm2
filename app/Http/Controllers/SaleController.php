<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SaleService;
use App\Models\Sale;
use App\Http\Resources\SaleResource;
use App\Http\Resources\SaleCollection;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Filters\SaleFilter;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->saleService = new SaleService();
        $this->middleware('auth:api');
    }

    public function index(SaleFilter $filter)
    {
      $per_page = $filter->query()['per_page'] ?? 10;
      $sale = Sale::filter($filter)->paginate($per_page);

      return new SaleCollection($sale);
    }

    public function show($id)
    {
       return new EventResource(Events::find($id));
    }

    public function store(Request $request)
    {
      //StoreSalesRequest
      // $validated = $request->validated();
      return $this->saleService->createSale($request);
    }

    public function update(StoreEventsRequest $request, $id)
    {
        $validated = $request->validated();

        $event = Events::findOrFail($id);
        $event->update($request->all());
        return $event;
    }

    public function delete($id)
    {
        $event = new EventResource(Events::findOrFail($id));
        $event->delete();
    }
}
