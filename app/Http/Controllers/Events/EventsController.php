<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Session;

class EventsController extends Controller
{
    public function eventsView(){
        Session::put('activeTab', 'EVENTS');
        return view('events/events');
    }
}
