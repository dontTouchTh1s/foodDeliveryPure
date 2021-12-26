<?php

class Authorisation
{
    static function isLogeIn(): bool
    {
        session_start();
        if (isset($_SESSION['id'])) {
            return true;
        } else
            return false;
    }

    static function get_id(): bool
    {
        session_start();
        return $_SESSION['id'] ?? false;
    }
}