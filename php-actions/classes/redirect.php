<?php

class redirect
{
    static public function request($dest)
    {
        header("Location: " . $dest);
    }
}