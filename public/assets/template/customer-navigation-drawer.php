<?php

use Navigation\Navigation_drawer;

/** @var string $onFocus */
$nav = new Navigation_drawer("منو");
$nav->setFocused($onFocus);
$sec = $nav->section("new section");
$sec->button("ورود", USER_URL . "/login.php", "fas fa-user-alt");
$sec->button("ایجاد حساب", USER_URL . "/register.php", "fas fa-sign-in-alt");
$nav->add_section($sec);
$nav->web_page_section();
$nav->add();