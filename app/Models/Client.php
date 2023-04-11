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
}
