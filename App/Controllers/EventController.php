<?php

namespace App\Controllers;

use App\Core\Request;
use App\Middleware\Auth;
use App\Models\Event;

class EventController extends Controller
{

    public function __construct()
    {

        if (!Auth::check() || !user()->is_admin) {
            return redirect_home();
        }
    }



    public function create()
    {
        return view("admin/events/create");
    }

    public function store()
    {
        $data = [
            "title" => Request::get("title"),
            "description" => Request::get("description"),
            "location" => Request::get("location"),
            "date" => Request::get("date"),
            "from_time" => Request::get("from_time"),
            "to_time" => Request::get("to_time"),
            "source" => $_FILES["source"],

        ];


        // Title Validate
        if (empty($data["title"])) {
            $data["errors"]["title"] = 'حقل العنوان فارغ';
        }

        // Description Validate
        if (empty($data["description"])) {
            $data["errors"]["description"] = 'حقل الوصف فارغ';
        }

        // Location Validate
        if (empty($data["location"])) {
            $data["errors"]["location"] = 'حقل الموقع فارغ';
        }

        // Date Validate
        if (empty($data["date"])) {
            $data["errors"]["date"] = 'حقل التاريخ فارغ';
        } else if (!strtotime($data["date"])) {
            $data["errors"]["date"] = 'صيغة التاريخ غير صحيحة';
        } else if (strtotime($data["date"]) <= strtotime("today")) {
            $data["errors"]["date"] = 'التاريخ يجب أن يكون في المستقبل';
        }

        // From Time Validate
        if (empty($data["from_time"])) {
            $data["errors"]["from_time"] = 'حقل وقت البداية فارغ';
        } else if (!preg_match("/^(2[0-3]|[01]?[0-9]):([0-5][0-9])$/", $data["from_time"])) {
            $data["errors"]["from_time"] = 'صيغة وقت البداية غير صحيحة (HH:MM)';
        }

        // To Time Validate
        if (empty($data["to_time"])) {
            $data["errors"]["to_time"] = 'حقل وقت النهاية فارغ';
        } else if (!preg_match("/^(2[0-3]|[01]?[0-9]):([0-5][0-9])$/", $data["to_time"])) {
            $data["errors"]["to_time"] = 'صيغة وقت النهاية غير صحيحة (HH:MM)';
        } else if (strtotime($data["to_time"]) <= strtotime($data["from_time"])) {
            $data["errors"]["to_time"] = 'وقت النهاية يجب أن يكون بعد وقت البداية';
        }

        if (isset($data["errors"])) {
            return view("admin/events/create", $data);
        } else {
            // img Vaildate & Store
            if (isset($data["source"]) && $data["source"]['error'] === UPLOAD_ERR_OK) {
                $originalName = $data["source"]['name'];

                $extension = pathinfo($originalName, PATHINFO_EXTENSION);

                $newFileName = uniqid('event_') . '.' . $extension;

                $uploadDir = __DIR__ . '/../../public/uploads/';
                $uploadPath = $uploadDir . $newFileName;
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                move_uploaded_file($data["source"]['tmp_name'], $uploadPath);
                $savedPath = 'uploads/' . $newFileName;
            } else {
                $savedPath = 'uploads/default.jpg';
            }
            $data["source"] = $savedPath;
            $data["user_id"] = user()->id;




            Event::create($data);

            redirect("dashboard");
        }
    }





    public function edit()
    {
        $event = Event::find(Request::get("id"));
        if (user()->id != $event->user_id) {
            return redirect("dashboard");
        }
        return view("admin/events/edit", compact("event"));
    }



    public function update()
    {
        $event = Event::find(Request::get("id"));

        if (user()->id != $event->user_id) {
            return redirect("dashboard");
        }

        if (!$event) {
            redirect("events");
        } else {
            $id = $event->id;
        }

        $data = [
            "title"       => Request::get("title"),
            "description" => Request::get("description"),
            "location"    => Request::get("location"),
            "date"        => Request::get("date"),
            "from_time"   => Request::get("from_time"),
            "to_time"     => Request::get("to_time"),
            "source"      => $_FILES["source"],
        ];

        /* ================= VALIDATION ================= */

        // Title Validate
        if (empty($data["title"])) {
            $data["errors"]["title"] = 'حقل العنوان فارغ';
        }

        // Description Validate
        if (empty($data["description"])) {
            $data["errors"]["description"] = 'حقل الوصف فارغ';
        }

        // Location Validate
        if (empty($data["location"])) {
            $data["errors"]["location"] = 'حقل الموقع فارغ';
        }

        // Date Validate
        if (empty($data["date"])) {
            $data["errors"]["date"] = 'حقل التاريخ فارغ';
        } else if (!strtotime($data["date"])) {
            $data["errors"]["date"] = 'صيغة التاريخ غير صحيحة';
        }

        // From Time Validate
        if (empty($data["from_time"])) {
            $data["errors"]["from_time"] = 'حقل وقت البداية فارغ';
        } else if (!preg_match("/^(2[0-3]|[01]?[0-9]):([0-5][0-9])$/", $data["from_time"])) {
            $data["errors"]["from_time"] = 'صيغة وقت البداية غير صحيحة (HH:MM)';
        }

        // To Time Validate
        if (empty($data["to_time"])) {
            $data["errors"]["to_time"] = 'حقل وقت النهاية فارغ';
        } else if (!preg_match("/^(2[0-3]|[01]?[0-9]):([0-5][0-9])$/", $data["to_time"])) {
            $data["errors"]["to_time"] = 'صيغة وقت النهاية غير صحيحة (HH:MM)';
        } else if (strtotime($data["to_time"]) <= strtotime($data["from_time"])) {
            $data["errors"]["to_time"] = 'وقت النهاية يجب أن يكون بعد وقت البداية';
        }

        /* ================= ERRORS ================= */

        if (isset($data["errors"])) {
            $data["event"] = $event;
            return view("admin/events/edit", $data);
        }

        /* ================= IMAGE ================= */

        if (isset($data["source"]) && $data["source"]["error"] === UPLOAD_ERR_OK) {

            $originalName = $data["source"]["name"];
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newFileName = uniqid('event_') . '.' . $extension;

            $uploadDir = __DIR__ . '/../../public/uploads/';
            $uploadPath = $uploadDir . $newFileName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            move_uploaded_file($data["source"]["tmp_name"], $uploadPath);

            $data["source"] = 'uploads/' . $newFileName;
        } else {
            // إذا ما رفع صورة نخلي القديمة
            $data["source"] = $event->source;
        }

        /* ================= UPDATE ================= */

        Event::update($id, [
            "title"       => $data["title"],
            "description" => $data["description"],
            "location"    => $data["location"],
            "date"        => $data["date"],
            "from_time"   => $data["from_time"],
            "to_time"     => $data["to_time"],
            "source"      => $data["source"],
        ]);

        redirect("dashboard");
    }

    public function delete()
    {
        $event = Event::find(Request::get("id"));

        if (user()->id != $event->user_id) {
            return redirect("dashboard");
        }
        
        if ($event) {
            Event::delete($event->id);
            return back();
        }
    }
}
