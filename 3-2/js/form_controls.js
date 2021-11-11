let inputElements = document.getElementsByTagName("input");
for (const input of inputElements)
{
    input.value = "";
    input.addEventListener("keyup", () => {
        input.setAttribute("value", input.value);
    })
}


let selectElements = document.getElementsByTagName("select")
for(const select of selectElements)
{
    select.value = "";
    select.setAttribute("selected-value", select.value);
    select.addEventListener("change", check_select)
    function check_select(){
        select.setAttribute("selected-value", select.value);}
}