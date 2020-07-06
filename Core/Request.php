<?php

namespace Core;

class Request
{
    public function __construct()
    {
        foreach($_POST as $email => $password)
        {
            $password = trim($password);
            $email = trim($email);

            //sanitise string
            $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW |
                FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);

            $password =  filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW |
                FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
        }

        foreach($_GET as $email => $password)
        {
            $password = trim($password);
            $email = trim($email);

            //sanitise string
            $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW |
                FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);

            $password =  filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW |
                FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK);
        }

    }
}