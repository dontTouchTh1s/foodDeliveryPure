async function AJAX_request(url, method, body) {
    let result;
    await fetch(url, {
        method: method,
        headers: {"Content-Type": "application/json"},
        body: body
    })
        .then(
            function (response) {
                return response.json();
            }
        )
        .then(function (data) {
            result = data
        })
        .catch(error => {
            console.log(error);
            result = false;
        });
    return result;
}