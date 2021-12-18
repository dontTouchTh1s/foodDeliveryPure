<?php

class redirect
{
    public function __construct($dest)
    {
        header("Location: " . $dest);
    }
}