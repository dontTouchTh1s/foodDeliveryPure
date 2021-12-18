<?php
const CARD_BTN_FILLED = 0;
const CARD_BTN_TONAL = 1;
const CARD_BTN_OUTLINED = 2;
class card
{
    public string $cardHead;
    public string $cardPicture = "";
    public string $cardButton = "";
    public string $cardBody = "";
    public string $cardTitle;

    public function __construct($title, $description, $class = "card-outlined")
    {
        $this->cardTitle = $title;
        $this->cardHead = "<div class='card $class'>";
        $this->cardBody = "
        <div class='body-surface'></div>
        <div class='card-body'>
            <div class='card-title'>" . $title . "</div>
            <div class='card-subhead'> subhead </div>
            <p>$description</p>
        </div>";
    }

    public function picture($imageURL)
    {
        $filename = basename($imageURL);
        if (!file_exists(dirname($filename)))
            return;
        $this->cardPicture = "<div class='card-picture'><img src='$imageURL' alt=$this->cardTitle></div>";
    }

    public function button($text, $type = CARD_BTN_FILLED)
    {
        switch ($type) {
            case CARD_BTN_FILLED:
            {
                $btnClass = "btn-filled";
                break;
            }
            case CARD_BTN_TONAL:
            {
                $btnClass = "btn-filled-tonal";
                break;
            }
            case CARD_BTN_OUTLINED:
            {
                $btnClass = "btn-outlined";
                break;
            }
            default:
            {
                $ms = new message_box(MESSAGEBOX_TYPE_ERROR, "Invalid argument");
                $ms->description("Please enter a valid argument card button type (CARD_BTN_FILLED, CARD_BTN_TONAL, CARD_BTN_OUTLINED)");
                $ms->add();
                return;
            }
        }

        $this->cardButton = "<a href='' class='btn $btnClass'><span>$text</span></a>";
    }

    public function add()
    {
        echo($this->cardHead . $this->cardPicture . $this->cardBody . $this->cardButton . "</div>");
    }
}