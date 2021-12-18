<?php
include("__PATH__.php");
session_start();
session_unset();
session_destroy();
header("location: " . USER_URL . "/login.php");