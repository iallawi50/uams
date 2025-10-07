<?php


namespace App\Models;

use App\QueryBuilder;
use Model;

class Feedback extends Model
{


    static public function isRated($event, $user)
    {
        return QueryBuilder::select("feedbacks", [
            ["event_id", "=", $event],
            ["user_id", "=", $user]
        ], true);
    }
}
