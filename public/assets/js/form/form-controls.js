// Add event to password fields for password icon
let iconPasswordParent = document.getElementById("icon-password");
if (iconPasswordParent) {
    iconPasswordParent.addEventListener("click", change_password_state);
}
// Add validating event to all form controls
let inputElements = document.getElementsByClassName("form-control");
for (const control of inputElements) {
    if (control.type === "checkbox" || control.type === "radio")
        continue;
    if (control.getAttribute("value") === "")
        control.value = "";

    if (control.id !== 'search') {
        let formControl = control.parentElement;
        let errorMessage = formControl.getElementsByClassName("error-message")[0];
        errorMessage.innerText = errorMessage.getAttribute("helper-text");
    }

    control.addEventListener("keyup", check_select);
    control.addEventListener("change", check_select);
}

function check_select(event) {
    event.target.setAttribute("value", event.target.value);
}

function change_password_state(event) {
    let iconParent = event.target;
    let icon = iconParent.firstElementChild;
    let formGroup = iconParent.parentElement;
    let input = formGroup.querySelector("#password");

    if (iconParent.getAttribute("state") === "show") {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
        iconParent.setAttribute("state", "hide")
    } else {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
        iconParent.setAttribute("state", "show")
    }
}