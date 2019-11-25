<?php

namespace App\Http\Controllers;

use Spatie\GoogleCalendar\Event;

class CalendarController extends Controller
{
    public function getEvents()
    {
        $googleEvents = Event::get()->pluck('googleEvent');

        return response()->json($googleEvents);
    }
}
