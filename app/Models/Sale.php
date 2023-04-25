<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Filters\Filterable;

class Sale extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'type_id',
        'client_id',
        'user_id',
        'smi_id',
        'paid',
        'id_1c',
        'sale_items',
        'created_at',
        'updated_at',
        'placement_date',
        'payed_date',
        'start', // рекламная компания
        'end',
        'summa',
        'locked',
        // '1c_ref_key',
        // '1c_kontragent_key',
        // '1c_dogovor_key',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function type()
    {
        return $this->belongsTo(SalesType::class);
    }

    public function smi()
    {
        return $this->belongsTo(Smi::class);
    }
}
