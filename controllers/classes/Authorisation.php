<?php
const ROLL_ADMIN = 10;
const ROLL_CUSTOMER = 0;
const ROLL_USER = 1;
class Authorisation
{
    static function get_roll()
    {
        session_start();
        $roll = 0;
        if (isset($_SESSION["roll"])) {
            $roll = $_SESSION['roll'];
        }
        session_write_close();
        return $roll;

    }

    static function check_roll($roll_required)
    {
        session_start();
        if (isset($_SESSION["id"])) {
            $user_roll = $_SESSION['roll'];
            if ($user_roll < $roll_required) {
                Redirect::request("/front-project/public/index.php");
            }
        } else {
            if ($roll_required == ROLL_ADMIN)
                Redirect::request(ADMIN_URL . "/login.php");
            else if ($roll_required == ROLL_USER)
                Redirect::request(USER_URL . "/login.php");
        }
        session_write_close();
    }
}