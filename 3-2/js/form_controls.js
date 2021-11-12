let inputElements = document.getElementsByClassName("form-control");
for (const input of inputElements)
{
    input.value = "";
    input.addEventListener("keyup", check_select);
    input.addEventListener("change", check_select);
}

let textareaElements = document.getElementsByTagName("textarea")
for(const textarea of textareaElements)
{
    new ResizeObserver(textarea_resize).observe(textarea);
}

function textarea_resize(event)
{
    for (let textarea of event) {
        let formGroup = textarea.target.parentElement;
        formGroup.style.height = String(textarea.target.clientHeight)+"px";
    }
}
function check_select(event)
{
    event.target.setAttribute("value", event.target.value);
    event.target.setAttribute("selected-option", event.target.value);
}