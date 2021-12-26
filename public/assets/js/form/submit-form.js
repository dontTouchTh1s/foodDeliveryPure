let submitButton = document.getElementById("submit-button");
submitButton.addEventListener("click", submitForm);
function submitForm(){
    let rePassElement = document.getElementById("re-password");
    let passElement = document.getElementById("password");
    let password = passElement.value;
    let rePassword = rePassElement.value;
    let errorElement = document.getElementById("re-password-error");
    if (password === rePassword) {
        errorElement.innerText = "";
        document.getElementsByTagName('form')[0].submit();
    }
    else errorElement.innerText = "تکرار پسورد صحبح نیست";

}
