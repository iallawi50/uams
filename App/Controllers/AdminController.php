<?php

namespace App\Controllers;

use App\Middleware\Auth;
use App\Models\Event;
use App\Models\Registration;
use App\QueryBuilder;

class AdminController extends Controller
{

    public function __construct()
    {
        if (!Auth::check() || !user()->is_admin) {
            return redirect_home();
        }
    }

    public function index()
    {
        if (!user()->is_admin) {
            return redirect_home();
        }
        $events = Event::all(true);

        // echo "<pre>"
        // print_r($events);
        // return;

        $stats = [
            "events" => count(Event::all()),
            "registration" => count(Registration::all()),
            "coming" => count(QueryBuilder::select("events", ["status", "!=", "2"])),
            "finshed" => count(QueryBuilder::select("events", ["status", "=", "2"]))
        ];
        return view("admin/index", compact("events", "stats"));
    }
}
