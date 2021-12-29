<?php

class Authentication
{
    static function isLogeIn(): bool
    {
        session_start();
        $session = isset($_SESSION['id']);
        session_write_close();
        return $session;
    }

    static function check_login()
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            session_write_close();
            redirect::request("/front-project/public/index.php");
        }
        session_write_close();
    }

    static function get_id(): bool
    {
        session_start();
        $session = $_SESSION['id'] ?? false;
        session_write_close();
        return $session;
    }
}