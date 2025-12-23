<?php

namespace App\Models;

use Model;

class User extends Model
{

    public $id;
    public $name;
    public $email;
    public $password;
    public $is_admin;

    public function events()
    {
        return $this->hasMany(Registration::class);
    }

    public function admin_events()
    {
        return $this->hasMany(Event::class);
    }

}