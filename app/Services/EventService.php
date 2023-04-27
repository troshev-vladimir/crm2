<?php

namespace App\Services;

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventService
{

    public function __construct(Type $var = null)
    {

    }

    public function createEvent(Request $request)
    {
        $event = Events::create([
            'fulfilled_date' => null,
            'appointment_date'=> $request->appointment_date,
            'title' => $request->title,
            'type_id' => $request->type_id,
            'client_id' => $request->client_id
        ]);

        return $event;
    }

    public function getEventByID($id)
    {
        return Events::find($id);
    }
}
