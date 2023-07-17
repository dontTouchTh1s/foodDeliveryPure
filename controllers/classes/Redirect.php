<?php

class Redirect
{
    static public function request($dest)
    {
        header("Location: " . $dest);
    }
}