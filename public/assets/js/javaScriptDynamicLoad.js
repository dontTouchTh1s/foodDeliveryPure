let form = document.querySelector("form");
let swiper = document.querySelector(".swiper");
let navigationDrawer = document.querySelector(".nav-drawer");
let card = document.querySelector(".card");

const JS_URL = "/front-project/public/assets/js";
const JS_FORM_URL = JS_URL + "/form";
const ACTION_URL = "../php-action";
const ACTION_USER_URL = "../php-actions/users";

if (form !== null) {
    include(JS_FORM_URL, ["form-validate.js"], "module");
    include(JS_FORM_URL, ["form-controls.js", "submit-form.js"]);
    let controlFile = form.querySelector(".form-control-file");
    if (controlFile !== null)
        include(JS_FORM_URL, ["control-file.js"]);
}

if (swiper !== null) {
    include(JS_URL, ["swiper.js"]);
}

if (navigationDrawer !== null) {
    include(JS_URL, ["navigation-drawer.js"]);
}

if (card !== null) {
    include(JS_URL, ["card.js"]);
}
include(JS_URL, ["messagebox.js"]);
include(JS_URL, ["ripple-effect.js"]);

function include(path, files, type = "text/javascript") {
    for (let file of files) {
        let script = document.createElement("script");
        script.src = path + "/" + file;
        script.type = type;
        document.body.appendChild(script);
    }
}