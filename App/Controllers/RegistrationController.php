<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Registration;
use App\QueryBuilder;

class RegistrationController extends Controller
{

    public function store()
    {
        $data = [
            "event_id" => Request::get("id"),
            "user_id" => user()->id

        ];
    // QueryBuilder::select("registrations", "'event_id' = $event_id AND 'user_id' = $user_id", true);


    Registration::create($data);

    return redirect("event/register");

    }


    public function index()
    {
        return view("event/completed");
    }

    
}
