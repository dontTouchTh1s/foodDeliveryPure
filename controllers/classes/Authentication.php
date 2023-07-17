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
            Redirect::request("/front-project/public/users/login.php");
        }
        session_write_close();
    }

    static function get_id(): int
    {
        session_start();
        $session = $_SESSION['id'] ?? false;
        session_write_close();
        return $session;
    }

    static function get_name(): string
    {
        $name = $_SESSION['name'] ?? false;
        session_write_close();
        return $name;
    }

    static function get_full_name(): string
    {
        $name = $_SESSION['full-name'] ?? false;
        session_write_close();
        return $name;
    }
}