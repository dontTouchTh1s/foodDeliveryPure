<?php
const CARD_BTN_FILLED = "btn-filled";
const CARD_BTN_TONAL = "btn-filled-tonal";
const CARD_BTN_OUTLINED = "btn-outlined";
const CARD_FILLED = "card-filled";
const CARD_ACTION_LIKE = "far fa-heart";
const CARD_ACTION_BOOKMARK = "far fa-bookmark";
class card
{
    public string $cardHead;
    public array $cardPicture = [];
    public array $cardButton = [];
    public array $cardBody = [];
    public array $cardFooter = [];
    public string $cardTitle = "";

    public function __construct($type, $id = "0")
    {
        $this->cardHead = "<div class='card $type' product-id='$id'>";
        $this->cardBody[] = ["
        <div class='body-surface'></div>
        <div class='card-body'>"];
        $this->cardBody["title"] = ["<div class='card-title'>", "text" => "", "</div>"];
        $this->cardBody["price"] = ["<div class='card-subhead'>", "text" => "", "</div>"];
        $this->cardBody["description"] = ["<p>", "text" => "", "</p>"];
        $this->cardBody[] = ["</div >"];
        $this->cardPicture = ["<div class='card-picture'>", "</div>"];
        $this->cardButton = ["<div class='card-button'>", "</div>"];
        $this->cardFooter = ["<div class='card-footer'>", "</div>"];
    }

    public function description($description)
    {
        $this->cardBody["description"]["text"] = $description;
    }

    public function title($title)
    {
        $this->cardBody["title"]["text"] = $title;
        $this->cardTitle = $title;
    }

    public function price($price)
    {
        $this->cardBody["price"]["text"] = $price;
    }

    public function picture($imageURL)
    {
        $filename = basename($imageURL);
        if (!file_exists(dirname($filename)))
            return;
        $picture = "<img src = '$imageURL' alt = $this->cardTitle>";
        array_splice($this->cardPicture, 1, 0, $picture);
    }

    public function buy_button(string $text, int $qty, string $type = CARD_BTN_FILLED, string $icon = ""): void
    {
        $i = "";
        if (!$icon == "")
            $i = "<i class='$icon' aria-hidden='true'></i>";
        $button = "
        <button type='button' class='btn $type buy-button' >
            $i
            <span class='buy-button-text'> $text</span>
        </button>
        <div class='qty'>
        <button type='button' class='btn btn-icon increase' >
            <i class='fas fa-plus'></i>
        </button>
        <span class='qty-count'>$qty</span>
        <button type='button' class='btn btn-icon decrease' >
            <i class='fas fa-minus'></i>
        </button>
        </div>";
        array_splice($this->cardButton, 1, 0, $button);
    }

    public function button(string $text, string $type = CARD_BTN_FILLED, string $icon = ""): void
    {
        $i = "";
        if (!$icon == "")
            $i = "<i class='$icon' aria-hidden='true'></i>";
        $button = "
        <button type='button' class='btn $type' >
            <span> $text</span>
            $i
        </button> ";
        array_splice($this->cardButton, 1, 0, $button);
    }

    public function action(string $type): void
    {
        $action = "
            <div class='card-action' click-event='55'>
                <i class='$type' aria-hidden='true'></i>
            </div>";
        array_splice($this->cardFooter, 1, 0, $action);


    }

    public function add()
    {
        $body = "";
        foreach ($this->cardBody as $row) {
            $body .= implode("", $row);
        }
        $footer = implode("", $this->cardFooter);
        $button = implode("", $this->cardButton);
        $picture = implode("", $this->cardPicture);
        echo($this->cardHead . $picture . $body . $button . $footer . "</div> ");
    }
}
