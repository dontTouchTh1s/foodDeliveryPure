let shipping = document.querySelector(".goto-shipping");
shipping.addEventListener("click", goto_shipping);

let productList = document.querySelectorAll(".product");
let totalPrice = document.querySelector(".order-total-price");
for (let product of productList) {
    let id = product.getAttribute('product-id');
    let removeItemButton = product.querySelector(".card-button button");
    if (removeItemButton !== null)
        removeItemButton.addEventListener("click", () => change_product_qty(event, id, 0));
    let qty = product.querySelector(".qty");
    if (qty !== null) {
        let decrease = qty.querySelector(".decrease");
        let increase = qty.querySelector(".increase");
        increase.addEventListener("click", () => change_product_qty(event, id, 1));
        decrease.addEventListener("click", () => change_product_qty(event, id, -1));
    }
}

async function change_product_qty(event, id, value) {
    let button = event.currentTarget;
    let qtyParent = button.closest(".product-qty");
    let removeItem = qtyParent.querySelector(".remove-from-basket");
    let itemPrice = qtyParent.closest(".footer").querySelector(".item-price");
    let qtyDiv = qtyParent.querySelector(".qty")
    let qtySpan = qtyDiv.querySelector(".qty-count");
    let postData = JSON.stringify({id: id, value: value})
    let result = await AJAX_request(ACTION_USER_URL + "/products/addTo-productBasket-action.php", "POST", postData)
    let qty = result["value"];
    if (qty !== null) {
        if (qty === 0) {
            console.log("removed")
        } else {
            qtySpan.innerText = result["value"];
            itemPrice.innerText = result["itemPrice"] + " تومان"
            let postData = JSON.stringify({id: id})
            result = await AJAX_request(ACTION_USER_URL + "/products/calculate-price.php", "POST", postData)
            totalPrice.innerText = result["totalPrice"] + " تومان"
        }
    }
}

function goto_shipping() {
    window.location = USERS_URL + "/shipping.php";

}