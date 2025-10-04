<?php

namespace App\Controllers;

use App\Middleware\Auth;
use App\Models\Event;

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
        return view("admin/index", compact("events"));
    }
}
