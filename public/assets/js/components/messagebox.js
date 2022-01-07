class ect {
    constructor(messageBox) {
        this.description = messageBox.querySelector(".box-description");
        if (this.description == null) {
            return false;
        }
        const ectParagraph = this.description.querySelector("p");
        if (ectParagraph.clientHeight < 16) {
            return false;
        }
        this.showButton = messageBox.querySelector('.box-show-more');
        this.paragraph = this.description.querySelector("p");
        this.icon = this.showButton.querySelector("i");
        this.span = this.description.querySelector(".ect");
        this.state = this.description.getAttribute("aria-hidden");
    }

    change_state() {
        this.state = !this.state;
    }

    add() {
        this.paragraph.style.width = (this.description.clientWidth + 10).toString() + "px";
        this.span.style.display = "none";
        this.icon.classList.remove("fa-chevron-down");
        this.icon.classList.add("fa-chevron-up");
        this.description.setAttribute("aria-hidden", "false");
    }

    remove() {
        this.paragraph.style.width = (this.description.clientWidth - 10).toString() + "px";
        this.span.style.display = "inline";
        this.icon.classList.remove("fa-chevron-up");
        this.icon.classList.add("fa-chevron-down");
        this.description.setAttribute("aria-hidden", "true");
    }
}

const messageBoxList = document.getElementsByClassName("message-box");
for (const messageBox of messageBoxList) {
    let desc = new ect(messageBox);
    if (desc.description != null)
        desc.showButton.addEventListener("click", () => change_state(desc));
    messageBox.addEventListener("animationend", remove);
}

function change_state(ect) {
    ect.change_state();
    if (ect.state === true)
        ect.add();
    else
        ect.remove();
}

function remove(event) {
    event.target.remove();
}