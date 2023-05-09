<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\ClientContactCollection;


class ClientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // JsonResource::withoutWrapping();
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone,
            'phone_add' => $this->phone_add,
            'site' => $this->site,
            'vk' => $this->vk,
            'birth_day' => $this->birth_day,
            // 'created_at' =>$this->created_at->format('Y.m.d'),
            // 'department' => $this->department,
            'division' => $this->division,
            'creator' => $this->user,
            'comment'=> $this->comment,
            'address'=> $this->address,
            'address_add'=> $this->address_add,
            'user_id'=> $this->user_id,

            //Это статусы Клиента
            'active'=> !!$this->active,
            'federal'=> !!$this->federal,
            'top'=> !!$this->top,
            'prioritet'=> !!$this->prioritet,

            'activity'=> $this->activity, //Это специализация Клиента
            'activity_id'=> $this->activity_id, // TODO: Переделать, отдавать только ID
            'potencial'=> $this->potencial,
            'potencial_id'=> $this->potencial_id, // TODO: Переделать, отдавать только ID
            'contacts'=> new ClientContactCollection($this->contacts),
        ];
    }
}
