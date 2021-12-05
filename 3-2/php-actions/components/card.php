<?php

class card
{
    public string $cardHead;
    public string $cardPicture = "";
    public string $cardBody;

    public function __construct($title, $description, $class = "card-outlined")
    {
        $this->cardHead = "<div class='card $class'>";
        $this->cardBody = "
            <div class='card-body'>
                <div class='card-title'>" . $title . "</div>
                <div class='card-subhead'> subhead </div>
                $description
                <div class='body-surface'></div>
            </div>
        </div>
        ";
    }

    public function card_picture($imageURL)
    {
        if ($imageURL !== null) {
            $filename = basename($imageURL);
        } else
            $imageURL = "";
        $this->cardPicture = "<div class='card-picture'><img src='$imageURL'></div>";
    }

    public function card_add()
    {
        echo($this->cardHead . $this->cardPicture . $this->cardBody);
    }
}