let logeIn = false;
let state = true;
userLogo = document.getElementById("user-logo");
userLogo.addEventListener("click", change_manage_state);

let userManage = document.getElementById("user-manage");
let userEmail = document.getElementById("user-email");
if (userEmail.innerText !== "") {
    userLogo.style.cursor = "pointer";
    logeIn = true
}


function change_manage_state(event) {
    if (logeIn) {
        state = !state;
        userManage.setAttribute("aria-hidden", state);
    }
}