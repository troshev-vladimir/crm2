<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'phone_add',
        'email',
        'comment',
        'job_id',
        'client_id'
    ];

    public function job()
    {
        return $this->belongsTo(ClientJob::class);
    }
}
