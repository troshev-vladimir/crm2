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
        $is_exist = count($this->getEventByClient($request->client_id));
        if ((int) $is_exist) {
            return response()->json([
                'message' => 'Нельзя создать событие т.к. на этом клиенте уже есть событие',
            ], 400);
        }
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
