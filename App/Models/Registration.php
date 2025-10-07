<?php


namespace App\Models;

use App\QueryBuilder;
use Model;

class Registration extends Model
{
    

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    static public function isRegistered($event, $user)
    {
        return QueryBuilder::select("registrations", [
            ["event_id", "=", $event],
            ["user_id", "=", $user]
        ], true);
    }
}
