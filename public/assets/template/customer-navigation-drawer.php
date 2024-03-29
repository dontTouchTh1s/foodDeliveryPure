<?php

use Navigation\Navigation_drawer;

/** @var string $onFocus */
if (!isset($onFocus))
    $onFocus = "";
$nav = new Navigation_drawer("منو");
$nav->setFocused($onFocus);

$sec = $nav->section("محصولات");
$sec->button("محصولات موردعلاقه", USER_URL . "/profile/liked-products.php", "fas fa-heart");
$sec->button("محصولات ذخیره شده", USER_URL . "/profile/bookmarked-products.php", "fas fa-bookmark");
$nav->add_section($sec);
$nav->web_page_section();
$nav->add();