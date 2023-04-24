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
            'fulfilled_date' => $request->fulfilled_date,
            'appointment_date'=> $request->appointment_date,
            'title' => $request->title,
            'type_id' => $request->typeId,
            'client_id' => $request->clientId
        ]);
 
        return $event;
    }

    public function getEventByID($id)
    {
        return Events::find($id);
    }
}
