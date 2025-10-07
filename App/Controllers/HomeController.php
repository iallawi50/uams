<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Event;
use App\Models\Feedback;
use App\QueryBuilder;

class HomeController extends Controller
{
    public function index()
    {
        $events = QueryBuilder::select("events",["status", "<", "2"]);
        return view("home", compact("events"));
    }

    public function about()
    {
        return view("about");
    }

       public function show()
    {
        $event = Event::find(Request::get("id"));
        if($event->status == 2) {

        }
        return view("event-details", compact("event"));
    }
}
