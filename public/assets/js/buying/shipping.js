let shippingButton = document.querySelector(".goto-pay");
let emailForm = document.querySelector("form");
shippingButton.addEventListener("click", goto_pay);

function goto_pay() {
    emailForm.submit();

}