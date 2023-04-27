<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'type_id' => $this->type["id"],
            'client' => $this->client,
            'appointment_date' => $this->appointment_date,
            'fulfilled_date' =>  $this->fulfilled_date == '0000-00-00' ? false : $this->fulfilled_date,
        ];
    }
}
