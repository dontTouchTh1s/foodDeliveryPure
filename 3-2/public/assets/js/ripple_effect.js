function createRipple(event) {
    const button = event.currentTarget;
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

const buttons = document.getElementsByTagName('button');
for (const button of buttons) {
    button.addEventListener("click", createRipple);
}
const anchors = document.getElementsByTagName('a');
for (const anchor of anchors) {
    anchor.addEventListener("click", createRipple);
}