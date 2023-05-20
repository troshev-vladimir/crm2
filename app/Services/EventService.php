<?php

namespace App\Services;

use App\Models\Events;
use App\Models\User;
use App\Models\ArchiveEvent;
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

    public function getEventByClient($client_id)
    {
        return Events::where('client_id', $client_id)->get();
    }

    public function archiveEvent($id)
    {
        $event = Events::find($id);
        $archivedEvent = $event->replicate();
        $archivedEvent->setTable('archive_events');
        $archivedEvent->save();
        $event->delete();

        return [
            'message' => 'Успешно заархивировано'
        ];
    }
}
