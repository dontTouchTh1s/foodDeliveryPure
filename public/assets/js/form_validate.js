import Validate, {ALPHABET_REGEX, EMAIL_REGEX, FormValidate, NUMBER_REGEX} from "/public/assets/js/classes/validate.js"

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
            controlValidation.regex(["keyup", "focusout"], ALPHABET_REGEX, errorText);
            break;
        }
        case "full-name": {
            let errorText = "نام خانوادگی، فقط میتواند شامل حروف باشد";
            controlValidation.regex(["keyup", "focusout"], ALPHABET_REGEX, errorText);
            break;
        }
        case "email": {
            let errorText = "لطفا یک ایمیل معتبر وارد کنید";
            controlValidation.regex(["keyup", "focusout"], EMAIL_REGEX, errorText);
            break;
        }
        case "price": {
            let errorText = "قیمت، فقط میتواند شامل اعداد باشد";
            controlValidation.regex(["keyup", "focusout"], NUMBER_REGEX, errorText);
            controlValidation.min("focusout", 0, "قیمت نمیتواند کمتر از صفر باشد");
            // Can use 'step' and 'max' method to validate control
            break;
        }
    }
}
formValidate.validate_controls_on_button("click", submitButton);