let shippingButton = document.querySelector(".goto-pay");
shippingButton.addEventListener("click", goto_pay);

function goto_pay() {
    window.location = USERS_URL + "/pay.php";

}