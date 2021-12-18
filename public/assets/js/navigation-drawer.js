let currentURL = document.location.href;
let position = currentURL.search("front-project");
currentURL = currentURL.substring(position, position.length);
let navDrawer = document.querySelector(".nav-drawer");
let links = navDrawer.querySelectorAll(".btn");
for (let link of links) {
    let href = link.getAttribute("href");
    if (href === currentURL) {
        link.setAttribute("focused");
        link.setAttribute("aria-selected", "true");
    }
}