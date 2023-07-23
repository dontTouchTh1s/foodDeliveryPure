let searchInput = document.querySelector('#search');
searchInput.addEventListener('keypress', (event) => {

    // event.keyCode or event.which  property will have the code of the pressed key
    let keyCode = event.keyCode ? event.keyCode : event.which;

    // 13 points the enter key
    if (keyCode === 13) {
        // call click function of the button
        window.location.href = PRODUCTS_URL + '?name=' + searchInput.value;
    }
});