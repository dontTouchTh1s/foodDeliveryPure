let cardList = document.querySelectorAll(".card");

for (let card of cardList) {
    let id = card.getAttribute('product-id');
    card.addEventListener("click", (function (d) {
            window.location.href = PUBLIC_URL + "/product-details.php?product=" + id;
        }
    ))
    let picture = card.querySelector(".card-picture");
    let addToBasketButton = card.querySelector(".card-button button");
    let likeButton = card.querySelector(".fa-heart");
    let bookMarkButton = card.querySelector(".fa-bookmark");
    if (addToBasketButton !== null)
        addToBasketButton.addEventListener("click", () => change_qty(event, id, 0));
    if (likeButton !== null)
        likeButton.addEventListener("click", () => toggle_action(event, id, "like-product-action.php"));
    if (bookMarkButton !== null)
        bookMarkButton.addEventListener("click", () => toggle_action(event, id, "bookmark-product-action.php"));
    let qty = card.querySelector(".qty");
    let qtySpan;
    if (qty !== null) {
        qtySpan = qty.querySelector("span");
        let decrease = qty.querySelector(".decrease");
        let increase = qty.querySelector(".increase");
        increase.addEventListener("click", () => change_qty(event, id, 1));
        decrease.addEventListener("click", () => change_qty(event, id, -1));
        (async function () {
            let postData = JSON.stringify({id: id, select: ""})
            let result = await AJAX_request(ACTION_USER_URL + "/products/addTo-productBasket-action.php", "POST", postData);
            if ((result["value"] === 0) || (result["value"] === null)) {
                qty.style.display = "none";
            } else {
                qty.style.display = "grid";
                qtySpan.textContent = result["value"];
                toggle_buy_button(addToBasketButton, "حذف");
            }
        })();
    }

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
}

async function change_qty(event, id, value) {
    let button = event.currentTarget;
    let cardButton = button.closest(".card-button");
    let buyButton = cardButton.querySelector(".buy-button");
    let qtyDiv = cardButton.querySelector(".qty")
    let qtySpan = qtyDiv.querySelector(".qty-count");
    let postData = JSON.stringify({id: id, value: value})
    let result = await AJAX_request(ACTION_USER_URL + "/products/addTo-productBasket-action.php", "POST", postData)
    let qty = result["value"];
    if (qty !== null) {
        if (qty === 0) {
            qtyDiv.style.display = "none";
            toggle_buy_button(buyButton, "خرید");
        } else {
            toggle_buy_button(buyButton, "حذف");
            qtySpan.innerText = result["value"];
            qtyDiv.style.display = "grid";
        }
    } else {
        window.location.href = USERS_URL + "/login.php";
    }
}

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
    } else if (result["toggled"] === null) {
        Element
    }
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