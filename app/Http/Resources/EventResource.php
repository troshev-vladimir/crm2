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
            'client' => $this->client,
            'appointment_date' => $this->appointment_date,
            'fulfilled_date' => $this->fulfilled_date,
        ];
    }
}