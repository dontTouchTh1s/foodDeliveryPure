<?php
const ROOT_PATH = __DIR__;
const ACTIONS_PATH = ROOT_PATH . "/php-actions";
const INCLUDES_PATH = ACTIONS_PATH . "/includes";
const ADMINS_PATH = ACTIONS_PATH . "/admins";
const CLASS_PATH = ACTIONS_PATH . "/classes";

const PUBLIC_PATH = ROOT_PATH . "/public";
const ASSETS_PATH = PUBLIC_PATH . "/assets";
const IMAGE_PATH = ASSETS_PATH . "/img";
const UPLOAD_PATH = IMAGE_PATH . "/upload";

const ROOT_URL = "/front-project/3-2";
const ACTIONS_URL = ROOT_URL . "/php-actions";

const PUBLIC_URL = ROOT_URL . "/public";
const USER_URL = PUBLIC_URL . "/users";
const ASSETS_URL = PUBLIC_URL . "/assets";
const IMAGES_URL = ASSETS_URL . "/img";
const UPLOAD_URL = IMAGES_URL . "/upload";
const JS_URL = ASSETS_URL . "/js";
const STYLE_URL = ASSETS_URL . "/style";
const FONTS_URL = ASSETS_URL . "/fonts";

spl_autoload_register(function ($class) {
    $class = CLASS_PATH . "/" . $class . ".php";
    if (!is_file($class)) {
        throw new LogicException ("Class $class not found");
    }
    require($class);
});