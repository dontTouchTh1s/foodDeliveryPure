<?php
const ROLL_ADMIN = 10;
const ROLL_CUSTOMER = 0;
const ROLL_USER = 1;
class check_access
{
    public int $user_roll;

    static function check_roll($roll_required)
    {
        session_start();
        if (isset($_SESSION['roll'])) {
            $user_roll = $_SESSION['roll'];
            if ($user_roll < $roll_required) {
                new redirect("");
            }
        } else {
            if ($roll_required == ROLL_ADMIN)
                new redirect(ADMIN_URL . "/login.php");
            else if ($roll_required == ROLL_USER)
                new redirect(USER_URL . "/login.php");
        }
    }
}