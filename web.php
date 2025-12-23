<?php

require "./__init.php";

use App\Controllers\AdminController;
use App\Core\Route;
use App\Core\Request;
use App\Controllers\AuthController;
use App\Controllers\EventController;
use App\Controllers\FeedbackController;
use App\Controllers\HomeController;
use App\Controllers\RegistrationController;

Route::make()
->get("", [HomeController::class, "index"])
->get("about", [HomeController::class, "about"])
// Authentication
->get("register", [AuthController::class, "register"], "guest")
->post("register", [AuthController::class, "store"], "guest")
->get("login", [AuthController::class, "login"], "guest")
->get("forget-password", [AuthController::class, "forget_password"], "guest")
->get("reset-password", [AuthController::class, "reset"], "guest")
->post("reset-password", [AuthController::class, "update_password"], "guest")
->post("login", [AuthController::class, "authentication"], "guest")
->post("logout", [AuthController::class, "logout"], "auth")

// Event
->get("event", [HomeController::class,'show'])
->post("event/register", [RegistrationController::class, "store"], "auth")
->get("event/register", [RegistrationController::class, "index"], "auth")
->get("event/registered", [RegistrationController::class, "show"], "auth")
->get("event/rate", [FeedbackController::class, "index"], "auth")
->post("event/rate", [FeedbackController::class, "store"], "auth")
->get("event/rate/success", [FeedbackController::class, "success"], "auth")

// Admin
->get("dashboard", [AdminController::class, "index"])
->get("dashboard/events/create", [EventController::class, "create"])
->post("dashboard/events/create", [EventController::class, "store"])


->resolve(Request::uri(), Request::method());
