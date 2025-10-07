<?php


namespace App\Models;

use Model;

class Event extends Model {


    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

} 