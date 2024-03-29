<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use LaravelLegends\EloquentFilter\Concerns\HasFilter;
use App\Http\Filters\Filterable;

class Client extends Model
{
    use HasFactory;
    // use HasFilter;
    use Filterable;

    protected $fillable = [
        'name',
        'email',
        'site',
        'vk',
        'comment',
        'phone',
        'phone_add',
        'address',
        'address_add',
        'division_id',
        'user_id',
        'birth_day',
        'active',
        'federal',
        'top',
        'prioritet',

        'activity_id',
        'potencial_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'birth_day'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function activity()
    {
        return $this->belongsTo(ClientActivity::class);
    }

    public function potencial()
    {
        return $this->belongsTo(ClientPotential::class);
    }

    public function department()
    {
        return $this->hasOneThrough(
            'App\Models\Department',
            'App\Models\Division',
            'department_id', //Foreign key on the Division table
            'id', //Foreign key on the Department table
        );
    }

    public function events()
    {
        return $this->hasMany('App\Models\Events');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function contacts() {
        return $this->hasMany(ClientContact::class);
    }

    public function legals() {
        return $this->hasMany(Legal::class);
    }
}
