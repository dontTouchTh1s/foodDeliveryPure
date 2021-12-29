let cardList = document.querySelectorAll(".card");

for (let card of cardList) {
    let id = card.getAttribute('product-id');
    let picture = card.querySelector(".card-picture");
    let addToBasketButton = card.querySelector(".card-button button");
    let likeButton = card.querySelector(".fa-heart");
    let bookMarkButton = card.querySelector(".fa-bookmark");
    addToBasketButton.addEventListener("click", () => toggle_action(event, id, "addTo-productBasket-action.php"));
    likeButton.addEventListener("click", () => toggle_action(event, id, "like-product-action.php"));
    bookMarkButton.addEventListener("click", () => toggle_action(event, id, "bookmark-product-action.php"));

    (async function () {
        let postData = JSON.stringify({id: id, select: ""});
        let result = await AJAX_request(ACTION_USER_URL + "/products/like-product-action.php", "POST", postData);
        if (result["liked"]) {
            // Product liked before
            likeButton.classList.remove("far");
            likeButton.classList.add("fas");
        } else if (result["liked"] === false) {
            // Product doesn't like before
            likeButton.classList.remove("fas");
            likeButton.classList.add("far");
        }
    })();
    (async function () {
        let postData = JSON.stringify({id: id, select: ""});
        let result = await AJAX_request(ACTION_USER_URL + "/products/bookmark-product-action.php", "POST", postData);
        if (result["liked"]) {
            bookMarkButton.classList.remove("far");
            bookMarkButton.classList.add("fas");
        } else if (result["liked"] === false) {
            bookMarkButton.classList.remove("fas");
            bookMarkButton.classList.add("far");
        }
    })();

}

async function toggle_action(event, id, file) {
    event.stopPropagation();
    const likeButton = event.currentTarget;
    let postData = JSON.stringify({id: id});
    let result = await AJAX_request(ACTION_USER_URL + "/products/" + file, "POST", postData);
    if (result["liked"]) {
        likeButton.classList.remove("far");
        likeButton.classList.add("fas");
    } else if (result["liked"] === false) {
        likeButton.classList.remove("fas");
        likeButton.classList.add("far");
    }
}

async function AJAX_request(url, method, body) {
    let result;
    await fetch(url, {
        method: method,
        headers: {"Content-Type": "application/json"},
        body: body
    })
        .then(
            function (response) {
                return response.json();
            }
        )
        .then(function (data) {
            result = data
        })
        .catch(error => {
            console.log(error);
            result = false;
        });
    return result;
}