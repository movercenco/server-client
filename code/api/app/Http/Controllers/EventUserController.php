<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventUser;
use Auth;
use App\User;
use App\Event;

class EventUserController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(EventUser::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(EventUser::getFillableAttributes());
    }

    public function toggle($id)
    {
        $event = Event::findOrFail($id);

        $event->users()->toggle([Auth::id()]);

        return response('', 204);
    }

    public function getUserForOneEvent($id)
    {
        $users = Event::findOrFail($id)->users;

        return response()->json($users);
    }

    public function getEventForOneUser($id)
    {
        $events = User::findOrFail($id)->events;

        return response()->json($events);
    }
}
