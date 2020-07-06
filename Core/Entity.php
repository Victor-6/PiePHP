<?php

namespace Core;

use Core\ORM;

class Entity
{

    public function __construct($array)
    {
        new ORM();

        if (count($array) > 1) {
            $array = ORM::find("users" . [
                    "WHERE" => 'email = "' . $array['email'] . '" AND password = "' . $array['password'] . '"'
                ]);
        } else {
            $array = ORM::find("users" . [
                    "WHERE" => 'id = "' . $array["id"] . '"'
                ]);
        }
        foreach ($array[0] as $key =>$value) {
            $this->$key = $value;
        }
    }
}