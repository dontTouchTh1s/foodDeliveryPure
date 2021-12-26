let navContainer = document.querySelector(".nav-drawer-container");
let navController = document.querySelector(".navigation-controller");
let navScrim = navContainer.querySelector(".scrim");
navController.addEventListener("click", navigationDrawer_toggle);
navScrim.addEventListener("click", navigationDrawer_toggle);

function navigationDrawer_toggle(event) {
    navContainer.toggleAttribute("open");
}