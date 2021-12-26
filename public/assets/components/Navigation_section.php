<?php

namespace Navigation;

class Navigation_section
{
    public string $title = "";
    public string $body = "<section>";

    public function __construct($title)
    {
        $this->body .= "<span class='section-title'>$title</span>";
    }

    public function button($title, $url, $icon)
    {
        $focused = "";
        if ($title == Navigation_drawer::$focused) {
            $focused = "focused";
        }
        $this->body .=
            "<a href ='$url' title='$title' class='btn btn-filled-tonal' $focused>
                <i class='$icon'></i>
                <div class='background'></div>
                <span>$title</span>
            </a >";
    }

    public function execute(): string
    {
        return $this->body .= "</section>";
    }
}