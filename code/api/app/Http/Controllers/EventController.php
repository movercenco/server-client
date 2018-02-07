<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Mail;
use App\Mail\InviteToEvent;

class EventController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(Event::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Event::getFillableAttributes());
    }

    public function getEventsForCity($id)
    {
        return response()->json(Event::where('city_id', $id)->get());
    }

    public function create()
    {
        if(Auth::user()->role_type != 2) {
            abort(403);
        }

        $event = Event::create(request()->intersectKeys(Event::getFillableAttributes()));

        return response()->json($event);
    }

    public function update($id)
    {
        if(! in_array(Auth::user()->role_type, [2, 4])) {
            abort(403);
        }

        $event = Event::findOrFail($id);
        $event = $event->update(request()->intersectKeys(Event::getFillableAttributes()));

        return response()->json($event);
    }

    public function getOne($id)
    {
        return response()->json(Event::findOrFail($id));
    }

    public function delete($id)
    {
        if(Auth::user()->role_type != 4) {
            abort(403);
        }

        Event::findOrFail($id)->delete();

        return response('', 204);
    }

    public function invite($id)
    {
        $event = Event::findOrFail($id);
        $message = request('message');
        $email = request('email');
        $cityId = request('city_id');

        $url = "https://mundolingo.org/event-details.html?cityId={$cityId}&eventId={$id}";

        Mail::to($email)->send(new InviteToEvent($url, $message));

        return response('', 204);
    }
}
