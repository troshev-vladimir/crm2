<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    // public function contacts()
    // {
    //     return $this->belongsTo(ClientContact::class);
    // }
}
