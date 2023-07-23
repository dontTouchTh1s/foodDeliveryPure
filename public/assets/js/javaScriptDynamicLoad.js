let form = document.querySelector("form");
let swiperComp = document.querySelector(".swiper");
let navigationDrawer = document.querySelector(".nav-drawer");
let card = document.querySelector(".card");
let product = document.querySelector(".product");
let shippingBtn = document.querySelector(".content-shipping");
let dashboard = document.querySelector(".content-profile");
let productDetails = document.querySelector(".content-product-details");
let searchBar = document.querySelector('.header-search');
let successFul = document.querySelector('.successful-content');
let orders = document.querySelector('#orders');

const ACTION_URL = "/front-project/controllers";
const PUBLIC_URL = "/front-project/public";
const USERS_URL = PUBLIC_URL + "/users"
const JS_URL = PUBLIC_URL + "/assets/js";
const JS_FORM_URL = JS_URL + "/form";
const JS_COMPONENTS_URL = JS_URL + "/components";
const JS_BUYING_URL = JS_URL + "/buying";
const JS_DASHBOARD_URL = JS_URL + "/profile";
const ACTION_USER_URL = ACTION_URL + "/users";
const ACTION_ADMIN_URL = ACTION_URL + "/admins";
const PRODUCTS_URL = PUBLIC_URL + "/products.php";

include(JS_COMPONENTS_URL, ["messagebox.js"]);
include(JS_URL, ["ripple-effect.js"]);
include(JS_URL, ["AJAX.js"]);

if (orders !== null) {
    include(JS_URL, ["showOrderProducts.js"]);
}
if (successFul !== null) {
    include(JS_BUYING_URL, ["successful.js"]);
}

if (searchBar !== null) {
    include(JS_URL, ["search-bar.js"]);
}

if (form !== null) {
    include(JS_FORM_URL, ["form-validate.js"], "module");
    include(JS_FORM_URL, ["form-controls.js"]);
    let controlFile = form.querySelector(".form-control-file");
    if (controlFile !== null)
        include(JS_FORM_URL, ["control-file.js"]);
}

if (swiperComp !== null) {
    include(JS_COMPONENTS_URL, ["swiper.js"]);
}

if (navigationDrawer !== null) {
    include(JS_COMPONENTS_URL, ["navigation-drawer.js"]);
}

if (card !== null) {
    include(JS_COMPONENTS_URL, ["card.js"]);
}

if (product !== null) {
    include(JS_BUYING_URL, ["product-basket.js"]);
}

if (shippingBtn !== null) {
    include(JS_BUYING_URL, ["shipping.js"]);
}

if (dashboard !== null) {
    include(JS_DASHBOARD_URL, ["profile.js"], "text/babel");
}

if (productDetails !== null) {
    include(JS_BUYING_URL, ["add-tobasket.js"]);
}

function include(path, files, type = "text/javascript") {
    for (let file of files) {
        let script = document.createElement("script");
        script.src = path + "/" + file;
        script.type = type;
        document.body.appendChild(script);
    }
}