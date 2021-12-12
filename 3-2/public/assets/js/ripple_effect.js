let timeOut;

function createRipple(event) {
    event.stopPropagation();
    const button = event.currentTarget;
    if (button.className.includes("card")) {
        if (typeof timeOut !== 'undefined') clearTimeout(timeOut);
        const surface = button.querySelector(".body-surface")
        surface.style.opacity = "0";
        timeOut = setTimeout(() => back_opacity(surface), 1600);
    }
    const circle = document.createElement('span');
    const size = Math.max(button.clientWidth, button.clientHeight);
    const radius = size / 2;

    let vpOffset = button.getBoundingClientRect()

    circle.style.width = circle.style.height = `${size}px`;
    circle.style.left = `${event.pageX - scrollX - (vpOffset.left + radius)}px`;
    circle.style.top = `${event.pageY - scrollY - (vpOffset.top + radius)}px`;
    circle.classList.add("ripple");

    const ripple = button.getElementsByClassName("ripple")[0];

    if (ripple) {
        ripple.remove();
    }

    button.insertBefore(circle, button.children[1]);
}

const buttons = document.querySelectorAll('.btn');
for (const button of buttons) {
    button.addEventListener("click", createRipple);
}
const anchors = document.getElementsByTagName('a');
for (const anchor of anchors) {
    anchor.addEventListener("click", createRipple);
}
const cards = document.getElementsByClassName('card');
for (const card of cards) {
    card.addEventListener("click", createRipple);
}

function back_opacity(surface) {
    surface.style.opacity = "";
}