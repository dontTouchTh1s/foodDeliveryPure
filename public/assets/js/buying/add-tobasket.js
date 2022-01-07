let pdContent = document.querySelector(".product-details-content");

let id = pdContent.getAttribute('product-id');

let addToBasketButton = pdContent.querySelector(".buy-button");
let likeButton = pdContent.querySelector(".fa-heart");
let bookMarkButton = pdContent.querySelector(".fa-bookmark");
if (addToBasketButton !== null)
    addToBasketButton.addEventListener("click", () => change_qty(event, id, 0));
if (likeButton !== null)
    likeButton.addEventListener("click", () => toggle_action(event, id, "like-product-action.php"));
if (bookMarkButton !== null)
    bookMarkButton.addEventListener("click", () => toggle_action(event, id, "bookmark-product-action.php"));

(async function () {
    let postData = JSON.stringify({id: id, select: ""})
    let result = await AJAX_request(ACTION_USER_URL + "/products/addTo-productBasket-action.php", "POST", postData);
    if ((result["value"] !== 0) && (result["value"] != null)) {
        toggle_buy_button(addToBasketButton, "حذف از سبد خرید");
    } else
        toggle_buy_button(addToBasketButton, "افزودن به سبد خرید");
})();


(async function () {
    let postData = JSON.stringify({id: id, select: ""});
    let result = await AJAX_request(ACTION_USER_URL + "/products/like-product-action.php", "POST", postData);
    if (result["toggled"]) {
        // Product toggled before
        likeButton.classList.remove("far");
        likeButton.classList.add("fas");
    } else if (result["toggled"] === false) {
        // Product doesn't toggled before
        likeButton.classList.remove("fas");
        likeButton.classList.add("far");
    }
})();
(async function () {
    let postData = JSON.stringify({id: id, select: ""});
    let result = await AJAX_request(ACTION_USER_URL + "/products/bookmark-product-action.php", "POST", postData);
    if (result["toggled"]) {
        bookMarkButton.classList.remove("far");
        bookMarkButton.classList.add("fas");
    } else if (result["toggled"] === false) {
        bookMarkButton.classList.remove("fas");
        bookMarkButton.classList.add("far");
    }
})();

async function toggle_action(event, id, file) {
    event.stopPropagation();
    const likeButton = event.currentTarget;
    let postData = JSON.stringify({id: id});
    let result = await AJAX_request(ACTION_USER_URL + "/products/" + file, "POST", postData);
    if (result["toggled"]) {
        likeButton.classList.remove("far");
        likeButton.classList.add("fas");
    } else if (result["toggled"] === false) {
        likeButton.classList.remove("fas");
        likeButton.classList.add("far");
    }
}

async function change_qty(event, id, value) {
    let postData = JSON.stringify({id: id, value: value})
    let result = await AJAX_request(ACTION_USER_URL + "/products/addTo-productBasket-action.php", "POST", postData)
    let qty = result["value"];
    if (qty !== null) {
        if (qty === 0) {
            toggle_buy_button(addToBasketButton, "افزودن به سبد خرید");
        } else {
            toggle_buy_button(addToBasketButton, "حذف از سبد خرید");
            window.location.href = USERS_URL + "/product-basket.php";
        }
    } else
        window.location.href = USERS_URL + "/login.php";
}

function toggle_buy_button(button, text) {
    let spanText = button.querySelector(".buy-button-text");
    if (spanText.textContent !== text) {
        spanText.textContent = text;
        let icon = button.querySelector("i");
        icon.classList.toggle("fa-shopping-cart");
        icon.classList.toggle("fa-trash");
    }
}