<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view("home", compact("events"));
    }

       public function show()
    {
        $event = Event::find(Request::get("id"));
        return view("event-details", compact("event"));
    }
}
