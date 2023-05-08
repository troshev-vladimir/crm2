<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PermissionResource;

class ClientContactResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // JsonResource::withoutWrapping();
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'phone_add' => $this->phone_add,
            'email' => $this->email,
            'comment' => $this->comment,
            'job' => $this->job,
        ];
    }
}
