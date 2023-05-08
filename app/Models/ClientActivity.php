<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
