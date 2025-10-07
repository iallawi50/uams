<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Feedback;
use App\Models\Registration;
use App\Models\User;
use App\QueryBuilder;

class RegistrationController extends Controller
{

    public function store()
    {
        $data = [
            "event_id" => Request::get("id"),
            "user_id" => user()->id
        ];

        if (Registration::isRegistered($data["event_id"], $data["user_id"])) {
            return redirect("event?id=" . $data["event_id"]);
        } else {

            Registration::create($data);
            return redirect("event/register");
        }
    }


    public function index()
    {
        return view("event/completed");
    }

    public function show()
    {
        $events = user()->events();
        // echo "<pre>";
        // foreach ($events as $event) {
        //     print_r($event->event());
        // }
        // echo "</pre>";
        // exit;

        return view("event/registered", compact("events"));
    }


}
