<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
