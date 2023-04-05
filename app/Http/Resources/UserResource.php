<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PermissionResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'created_at' =>$this->created_at->format('Y.m.d H:i:s'),
            'roles' => $this->roles->map(function ( $item,  $key) {
                return [
                    'name' => $item->name,
                    'id' => $item->id
                ];
            })
        ];
    }
}
