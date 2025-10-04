<?php

require "./__init.php";

use App\Controllers\AdminController;
use App\Core\Route;
use App\Core\Request;
use App\Controllers\AuthController;
use App\Controllers\EventController;
use App\Controllers\HomeController;
use App\Controllers\RegistrationController;

Route::make()
->get("", [HomeController::class, "index"])
// Authentication
->get("register", [AuthController::class, "register"], "guest")
->post("register", [AuthController::class, "store"], "guest")
->get("login", [AuthController::class, "login"], "guest")
->post("login", [AuthController::class, "authentication"], "guest")
->post("logout", [AuthController::class, "logout"], "auth")

// Event
->get("event", [HomeController::class,'show'])
->post("event/register", [RegistrationController::class, "store"])
->get("event/register", [RegistrationController::class, "index"])

// Admin
->get("dashboard", [AdminController::class, "index"])
->get("dashboard/events/create", [EventController::class, "create"])
->post("dashboard/events/create", [EventController::class, "store"])


->resolve(Request::uri(), Request::method());
