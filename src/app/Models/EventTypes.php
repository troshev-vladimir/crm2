<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EventTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'active',
    ];

    public function events()
    {
        return $this->hasMany(Events::class);
    }
}
