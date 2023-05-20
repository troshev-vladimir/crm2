<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventService;
use App\Models\Events;
use App\Models\EventTypes;
use App\Models\ArchiveEvent;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Filters\EventFilter;

class EventController extends Controller
{
    public function __construct()
    {
        $this->eventService = new EventService();
        $this->middleware('auth:api');
    }

    public function index(EventFilter $filter)
    {

      $per_page = $filter->query()['per_page'] ?? 10;
      $events = Events::filter($filter)->paginate($per_page);

      return new EventCollection($events);
    }

    public function show($id)
    {
      return new EventResource(Events::find($id));
    }

    public function types()
    {
      return EventTypes::get();
    }

    public function store(StoreEventsRequest $request)
    {
      $validated = $request->validated();
      return $this->eventService->createEvent($request);
    }

    public function update(StoreEventsRequest $request, $id)
    {
      $validated = $request->validated();

      $event = Events::findOrFail($id);
      $event->update($request->all());
      return $event;
    }

    public function delete($id)
    {
        $event = new EventResource(Events::findOrFail($id));
        $event->delete();
    }

    public function archive($id)
    {
      return $this->eventService->archiveEvent($id);
    }

    public function getArchive(EventFilter $filter)
    {
      $per_page = $filter->query()['per_page'] ?? 10;
      $events = ArchiveEvent::filter($filter)->paginate($per_page);

      return new EventCollection($events);
    }

    public function getByClient($client_id)
    {
      return $this->eventService->getEventByClient($client_id);
    }
}
