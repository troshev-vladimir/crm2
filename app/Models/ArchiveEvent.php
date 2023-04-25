<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveEvent extends Events
{
    protected $fillable = [
        'id',
        'title',
        'type_id',
        'client_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'fulfilled_date',
        'appointment_date',
    ];

    public function type()
    {
        return $this->belongsTo(EventTypes::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
