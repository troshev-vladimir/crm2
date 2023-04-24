<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // JsonResource::withoutWrapping();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'placementDate' =>$this->placement_date,
            'payedDate' =>$this->payed_date,
            'start' =>$this->start,
            'end' =>$this->end,
            '1c_id' => $this->id_1c,
            'user' => $this->user,
            'saleItems' => $this->sale_items,
            'client' => $this->client,
            // 'agent' => $this->agents,
            'type' => $this->type,
            'smi' => $this->smi,
        ];
    }
}
