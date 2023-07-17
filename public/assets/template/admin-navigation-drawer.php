<?php

use Navigation\Navigation_drawer;

/** @var string $onFocus */
if (!isset($onFocus))
    $onFocus = "";
$nav = new Navigation_drawer("منو");
$nav->setFocused($onFocus);

$sec = $nav->section("مدیریت");
$sec->button("مدیریت کاربران", ADMIN_URL . "/users/show.php", "fas fa-user-alt");
$sec->button("ایجاد محصول جدید", ADMIN_URL . "/products/add.php", "fas fa-sign-in-alt");
$sec->button("ویرایش محصول", ADMIN_URL . "/products/edit.php", "fas fa-sign-in-alt");
$sec->button("مدیریت محصولات", ADMIN_URL . "/products/show.php", "fas fa-sign-in-alt");
$sec->button("مدیریت پیغام ها", ADMIN_URL . "/messages/show.php", "fas fa-sign-in-alt");
$nav->add_section($sec);


$nav->web_page_section();
$nav->add();