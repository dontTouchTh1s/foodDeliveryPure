const header = document.querySelector("header");
let logeIn = header.getAttribute("login");
if (logeIn === "true")
    header.querySelector("#login").style.display = "none";
else
    header.querySelector("#user-name").style.display = "none";
let hidden = true;

window.addEventListener("click", hide_panel)
userLogo = document.getElementById("user-logo");
userLogo.addEventListener("click", change_manage_state);

let userManage = document.getElementById("user-manage");


function change_manage_state(event) {
    if (logeIn === "true") {
        hidden = !hidden;
        userManage.setAttribute("aria-hidden", hidden);
    }
}

function hide_panel(event) {
    if (!(userManage.contains(event.target)) && !(userLogo.contains(event.target))) {
        if ((logeIn === "true") && (hidden === false)) {
            hidden = true;
            userManage.setAttribute("aria-hidden", hidden)
        }
    }
}