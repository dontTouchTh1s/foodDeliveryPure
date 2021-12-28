<?php

class Authentication
{
    static function isLogeIn(): bool
    {
        session_start();
        if (isset($_SESSION['id'])) {
            return true;
        } else
            return false;
    }

    static function check_login()
    {
        if (!isset($_SESSION['id'])) {
            redirect::request("/front-project/public/index.php");
        }
    }

    static function get_id(): bool
    {
        session_start();
        return $_SESSION['id'] ?? false;
    }
}