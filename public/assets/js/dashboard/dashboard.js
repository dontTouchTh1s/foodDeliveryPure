let dashboardHeader = document.querySelector(".profile-header");
let liList = dashboardHeader.querySelectorAll("li");
for (let li of liList)
    li.addEventListener("click", select_list);

function select_list(event) {
    for (let li of liList)
        li.setAttribute("aria-selected", "false");
    let list = event.currentTarget;
    list.setAttribute("aria-selected", "true");
}

const likedList = dashboardHeader.querySelector(".liked-products");
likedList.addEventListener("click", show_liked);

