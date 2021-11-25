const fileInput = document.getElementById("picture");
const fileView = document.getElementById("file-view");
const fileName = document.getElementById("file-name");
const picturePre = document.querySelector(".picture-preview");
const fileCounter = fileView.querySelector(".file-counter");
const next = fileView.querySelector("#next-arrow");
const pre = fileView.querySelector("#pre-arrow");
let list = [];
let showing = 1;
fileInput.addEventListener("change", picture_preview);
next.addEventListener("click", () => change_picture(1));
pre.addEventListener("click", () => change_picture(-1));

function picture_preview() {
    const files = fileInput.files;
    if (files.length === 0) {
        fileName.textContent = "هیچ فایلی انتخاب نشده است.";
    } else {
        for (const l of list)
            for (const p of l)
                if (typeof p !== "string")
                    p.remove();
        list = [];
        fileView.setAttribute("value", String(files.length));

        for (const file of files) {
            const pictureList = [];
            const name = `${file.name} ${convertFileSize(file.size)}`;
            const picture = document.createElement("img");
            picturePre.appendChild(picture);
            picture.src = URL.createObjectURL(file);
            picture.classList.add("picture");
            picture.classList.add("picture-gone");
            const circle = document.createElement("i");
            const c = list.length;
            circle.addEventListener("click", () => change_picture(c - showing));
            circle.classList.add("fas");
            circle.classList.add("fa-circle");
            circle.classList.add("circle-counter");
            fileCounter.appendChild(circle);

            pictureList.push(picture);
            pictureList.push(circle);
            pictureList.push(name)
            list.push(pictureList);
        }
        change_picture(-1);
    }
}

function change_picture(state) {

    list[showing][1].setAttribute("aria-selected", "false");
    let step = (Math.abs(state) / state);
    state -= step;
    showing += step;
    for (let pic of list) {
        pic = pic[0];
        pic.classList.add("picture-gone");
        pic.classList.remove("picture-out-right");
        pic.classList.remove("picture-out-left");
        pic.classList.remove("picture-out-right-fast");
        pic.classList.remove("picture-out-left-fast");
    }

    list[showing][0].classList.add("picture");
    list[showing][0].classList.remove("picture-gone", "picture-out-left", "picture-out-right");
    list[showing][1].setAttribute("aria-selected", "true");
    try {
        if (Math.abs(state) >= 1) {
            list[showing + 1][0].classList.add("picture-out-right-fast");
        }
        if (Math.abs(state) === 0) {
            list[showing + 1][0].classList.add("picture-out-right");
        }
        list[showing + 1][0].classList.remove("picture-gone");
    } catch (err) {
    }
    try {
        if (Math.abs(state) >= 1) {
            list[showing - 1][0].classList.add("picture-out-left-fast");
        }
        if (Math.abs(state) === 0) {
            list[showing - 1][0].classList.add("picture-out-left");
        }
        list[showing - 1][0].classList.remove("picture-gone");
    } catch (err) {
    }

    fileName.textContent = list[showing][2];

    if (showing < list.length - 1) {
        next.setAttribute("aria-disabled", "false");
    } else
        next.setAttribute("aria-disabled", "true");
    if (showing > 0) {
        pre.setAttribute("aria-disabled", "false");
    } else
        pre.setAttribute("aria-disabled", "true");
    if (state !== 0) {
        setTimeout(() => change_picture(state), 250);
    }
}

function convertFileSize(size) {
    if (size >= 1000000) {
        size = (size / 1000000).toFixed(2);
        size = String(size) + " MB";
    } else {
        size = (size / 1000).toFixed(2);
        size = String(size) + " KB"
    }
    return size;
}

