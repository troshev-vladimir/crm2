<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;

class Events extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'title',
        'type_id',
        'client_id',
        'fulfilled_date',
        'appointment_date',
        'result',
        'comment',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
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
