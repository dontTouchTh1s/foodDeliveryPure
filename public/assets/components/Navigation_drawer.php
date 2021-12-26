<?php

namespace Navigation;

use JetBrains\PhpStorm\Pure;

class Navigation_drawer
{
    public static string $focused;
    public string $navDrawer = "<div class='nav-drawer-container'><div class='nav-drawer'>";
    public string $navBody = "<div class='nav-body'>";

    public function __construct($title)
    {
        $this->navDrawer .= "<p class='title'>$title</p>";
    }

    public function setFocused(string $focused): void
    {
        self::$focused = $focused;
    }

    #[Pure] public function section($title): Navigation_section
    {
        return new Navigation_section($title);
    }

    public function web_page_section(): Navigation_section
    {
        $webPages = new Navigation_section("صفحات سایت");
        $webPages->button("خانه", PUBLIC_URL . "/index.php", "fas fa-home");
        $webPages->button("محصولات", PUBLIC_URL . "/products.php", "fas fa-utensils");
        $webPages->button("بلاگ", PUBLIC_URL . "/index.php", "fas fa-rss");
        $this->navBody .= $webPages->execute();
        return $webPages;
    }

    public function add_section($section)
    {
        $this->navBody .= $section->execute();
    }

    public function add()
    {
        $this->navBody .= "</div>";
        $this->navDrawer .= $this->navBody . "</div>";
        echo($this->navDrawer . "<div class='scrim'></div>" . "</div>");
    }
}