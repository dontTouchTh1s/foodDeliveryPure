let controls = document.getElementsByClassName("form-control");
for (let control of controls) {
    switch (control.id) {
        case "password": {
            control.addEventListener("keyup", validate_password);
            break;
        }
        case "re-password": {
            control.addEventListener("keyup", validate_rePassword);
            break;
        }
        case "name": {
            control.addEventListener("keyup", () => validate_name(event, 'name-error'));
            break;
        }
        case "full-name": {
            control.addEventListener("keyup", () => validate_name(event, 'full-name-error'));
            break;
        }
        case "email": {
            control.addEventListener("keyup", validate_email);
            break;
        }
        case "price": {
            control.addEventListener("keyup", validate_price);
            break;
        }
    }
}
function validate_password(event) {
    let passInput = event.target;
    let password = passInput.value;
    let errorElement = document.getElementById("password-error");
    if (password.length >= 8) {
        let defaultVal = errorElement.getAttribute("helper-text");
        error_change_att(passInput, "false");
        errorElement.innerText = defaultVal;
    } else {
        errorElement.innerText = "رمز عبور باید حداقل 8 کاراکتر باشد.";
        error_change_att(passInput, "true");
    }
}
function validate_rePassword(event) {
    let repPassInput = event.target;
    let passInput = document.getElementById("password");
    let password = passInput.value;
    let repPassword = repPassInput.value;
    let errorElement = document.getElementById("re-password-error");
    if (password === repPassword) {
        error_change_att(repPassInput, "false");
        errorElement.innerText = "";
    } else {
        errorElement.innerText = "تکرار پسورد صحبح نیست";
        error_change_att(repPassInput, "true");
    }
}
function validate_name(event, id) {
    const nameReg = /^[\p{L} ]+$/u;
    let nameInput = event.currentTarget;
    let name = nameInput.value;
    let errorElement = document.getElementById(id);
    if (nameReg.test(name)) {
        error_change_att(nameInput, "false");
        errorElement.innerText = "";
    } else {
        error_change_att(nameInput, "true");
        errorElement.innerText = "فقط استفاده از حروف مجاز است.";
    }
}
function validate_email(event) {
    const emailReg = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+))/;
    let emailInput = event.currentTarget;
    let email = emailInput.value;
    let errorElement = document.getElementById("email-error");
    if (emailReg.test(email)) {
        error_change_att(emailInput, "false");
        errorElement.innerText = "";
    } else {
        error_change_att(emailInput, "true");
        errorElement.innerText = "لطفا یک ایمیل معتبر وارد کنید.";
    }
}
function  validate_price(event) {
    const priceReg = /^\d+$/;
    let priceInput = event.currentTarget;
    let email = priceInput.value;
    let errorElement = document.getElementById("price-error");
    if (priceReg.test(email)) {
        let defaultVal = errorElement.getAttribute("helper-text");
        error_change_att(priceInput, "false");
        errorElement.innerText = "";
    } else {
        error_change_att(priceInput, "true");
        errorElement.innerText = "قیمت فقط میتواند عدد باشد.";
    }
}

function error_change_att(control, value){
    let formGroup = control.parentElement;
    let formControl = formGroup.getElementsByTagName("input")[0];
    formControl.setAttribute("error", value);
    let errorMessage = formGroup.getElementsByClassName("error-message")[0];
    errorMessage.setAttribute("error", value);

}