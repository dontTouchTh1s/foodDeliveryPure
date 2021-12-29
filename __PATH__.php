<?php

const ROOT_PATH = __DIR__;

// Actions Path
const ACTIONS_PATH = ROOT_PATH . "/php-actions";
const INCLUDES_PATH = ACTIONS_PATH . "/includes";
const USERS_PATH = ACTIONS_PATH . "/users";
const ADMINS_PATH = ACTIONS_PATH . "/admins";
const CLASS_PATH = ACTIONS_PATH . "/classes";

// Actions URL
const ROOT_URL = "/front-project";
const ACTIONS_URL = ROOT_URL . "/php-actions";
const ACTION_USER_URL = ACTIONS_URL . "/users";
const ACTION_ADMINS_URL = ACTIONS_URL . "/admins";

// Public Path
const PUBLIC_PATH = ROOT_PATH . "/public";
const ASSETS_PATH = PUBLIC_PATH . "/assets";
const IMAGE_PATH = ASSETS_PATH . "/img";
const UPLOAD_PATH = IMAGE_PATH . "/upload";
const COMP_PATH = ASSETS_PATH . "/components";

// Public URL
const PUBLIC_URL = ROOT_URL . "/public";
const USER_URL = PUBLIC_URL . "/users";
const ADMIN_URL = PUBLIC_URL . "/admins";
const ASSETS_URL = PUBLIC_URL . "/assets";
const IMAGES_URL = ASSETS_URL . "/img";
const UPLOAD_URL = IMAGES_URL . "/upload";
const JS_URL = ASSETS_URL . "/js";
const JS_FORM_URL = JS_URL . "/form";
const STYLE_URL = ASSETS_URL . "/style";
const FONTS_URL = ASSETS_URL . "/fonts";

spl_autoload_register(function ($class) {
    $class = explode("\\", $class);
    $class = end($class);
    $classPath = CLASS_PATH . "/" . $class . ".php";
    if (!is_file($classPath)) {
        $classPath = COMP_PATH . "/" . $class . ".php";
        if (!is_file($classPath)) {
            throw new LogicException ("Class $class not found");
        }
    }
    require($classPath);
});