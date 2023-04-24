<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type_id',
        'client_id',
        'paid',
        '1c_id',
        'sale_items'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'placement_date',
        'payed_date',
        'start', // рекламная компания
        'end'
    ];
}
