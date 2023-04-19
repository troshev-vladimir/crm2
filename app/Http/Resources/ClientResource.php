<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PermissionResource;

class ClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // JsonResource::withoutWrapping();
        return [
            'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone,
            'phone_add' => $this->phone_add,
            'site' => $this->site,
            'vk' => $this->vk,
            'birth_day' => $this->birth_day,
            // 'created_at' =>$this->created_at->format('Y.m.d'),
            'department' => $this->department,
            'division' => $this->division,
            'creator' => $this->user,
        ];
    }
}
