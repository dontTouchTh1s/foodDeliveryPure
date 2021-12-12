let logeIn = false;
let state = true;

window.addEventListener("click", hide_panel)
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

function hide_panel(event) {
    if (!(userManage.contains(event.target)) && !(userLogo.contains(event.target))) {
        if ((logeIn) && (state === false)) {
            state = true;
            userManage.setAttribute("aria-hidden", state)
        }
    }
}