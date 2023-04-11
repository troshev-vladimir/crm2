<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'site',
        'vk',
        'comment',
        'phone',
        'phone_add',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birth_day'
    ];

    public function department()
    {
        return $this->hasOneThrough(
            'App\Models\Department',
            'App\Models\Division',
            'department_id', //Foreign key on the Division table
            'id', //Foreign key on the Department table
        );
    }
}
