<?php
const ROLL_ADMIN = 10;
const ROLL_CUSTOMER = 0;
class check_access
{
    public int $user_roll;

    function __construct()
    {
        session_start();
    }

    function check_roll($roll_required)
    {
        if (isset($_SESSION['roll'])) {
            $this->user_roll = $_SESSION['roll'];
            if ($this->user_roll < $roll_required) {
                new redirect("");
            }
        } else {
            if ($roll_required == ROLL_ADMIN)
                new redirect(ADMIN_URL . "/login.php");
            else
                new redirect(USER_URL . "/login.php");
        }
    }
}