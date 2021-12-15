import Validate, {FormValidate} from "/3-2/public/assets/js/classes/validate.js"

let controls = document.getElementsByClassName("form-control");
let form = document.querySelector("form");
let formValidate = new FormValidate(form);
let submitButton = formValidate.submitButton;
for (let control of controls) {
    let controlValidation = new Validate(control);
    formValidate.add_control(controlValidation);
    if (control.hasAttribute("required")) {
        controlValidation.required("focusout", true, submitButton);
    }
    switch (control.id) {
        case "password": {
            let errorText = "رمز عبور وارد شده باید بین 8 تا 20 کاراکتر باشد";
            controlValidation.length(["keyup", "focusout"], 8, 20, errorText);
            break;
        }
        case "re-password": {
            let errorText = "تکرار رمز عبور صحیح نیست";
            let form = control.closest("form");
            let controlPassword = form.querySelector("#password");
            controlValidation.equal_with(["keyup", "focusout"], controlPassword, errorText);
            break;
        }
        case "name": {
            let errorText = "نام، فقط میتواند شامل حروف باشد";
            controlValidation.regex(["keyup", "focusout"], /^[\p{L} ]+$/u, errorText);
            break;
        }
        case "full-name": {
            let errorText = "نام خانوادگی، فقط میتواند شامل حروف باشد";
            controlValidation.regex(["keyup", "focusout"], /^[\p{L} ]+$/u, errorText);
            break;
        }
        case "email": {
            let regex = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+))/;
            let errorText = "لطفا یک ایمیل معتبر وارد کنید";
            controlValidation.regex(["keyup", "focusout"], regex, errorText);
            break;
        }
        case "price": {
            let errorText = "قیمت، فقط میتواند شامل اعداد باشد";
            controlValidation.regex(["keyup", "focusout"], /^\d+$/, errorText);
            break;
        }
    }
}
formValidate.close();