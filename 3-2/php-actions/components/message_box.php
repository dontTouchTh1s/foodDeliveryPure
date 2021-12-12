<?php
const MESSAGEBOX_TYPE_ERROR = 0;
const MESSAGEBOX_TYPE_SUCCESS = 1;
const MESSAGEBOX_TYPE_ALERT = 2;
class message_box
{
    public int $boxType;
    public string $messageBox;
    public string $boxDescription = "";

    public function __construct($type, $boxTitle)
    {
        switch ($type) {
            case MESSAGEBOX_TYPE_ERROR:
            {
                $boxClass = "box-error";
                break;
            }
            case MESSAGEBOX_TYPE_SUCCESS:
            {
                $boxClass = "box-success";
                break;
            }
            case MESSAGEBOX_TYPE_ALERT:
            {
                $boxClass = "box-alert";
                break;
            }
            default:
            {
                $ms = new message_box(MESSAGEBOX_TYPE_ERROR, "Invalid argument");
                $ms->description("Please enter a valid argument for boxMessage type (MESSAGEBOX_TYPE_ERROR, MESSAGEBOX_TYPE_SUCCESS, MESSAGEBOX_TYPE_ALERT)");
                $ms->add();
                return;
            }
        }
        $this->boxType = $type;
        $this->messageBox = "
            <div class='message-box $boxClass'>
                <div class='box-background fading'></div>
                <div class='box-body'>
                <p class='box-title'>$boxTitle</p>
            ";
    }

    public function description($description)
    {
        if ($description == "" or $description == null)
            return;
        $this->boxDescription = "
            <div class='box-show-more'>
               <i class='fas fa-chevron-down show-more-icon'></i>
            </div>
            <div class='box-description' aria-hidden='true'>
                <p>$description</p>
                <span class='ect'> ... </span>
            </div>
            ";
    }

    public function add()
    {
        $messageBox = $this->messageBox . $this->boxDescription . "</div></div>";
        echo($messageBox);
    }
}