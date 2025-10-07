<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Feedback;
use App\Models\Registration;

class FeedbackController extends Controller
{

    public function index()
    {
        $event = Request::get("id");
        if (Feedback::isRated($event, user()->id)) {
            redirect("event/rate/success");
        }
        return view("event/rate");
    }

    public function store()
    {


        $rating = Request::get("rating");
        $text = Request::get("feedback_text");
        $event = Request::get("id");

        if (Registration::isRegistered($event, user()->id)) {
            Feedback::create([
                "user_id" => user()->id,
                "event_id" => $event,
                "rating" => $rating,
                "feedback_text" => $text,
            ]);


            redirect("event/rate/success");
        } else {
            redirect_home();
        }
    }


    public function success()
    {
        return view("event/rate-success");
    }
}
