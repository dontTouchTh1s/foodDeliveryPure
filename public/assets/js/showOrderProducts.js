let rows = document.querySelectorAll('tr');
let op = document.querySelector('.order-products');
let items = op.querySelector('.order-products-items');
let mousePos = {x: undefined, y: undefined};
window.addEventListener("click", hideOrderProduct)

window.addEventListener('mousemove', (event) => {
    mousePos = {x: event.clientX, y: event.clientY};
});
let c = 0;
for (const row of rows) {
    c++
    if (c === 1) continue;
    let id = row.querySelector('td');
    id = id.innerText;
    row.addEventListener('click', () => getData(id))


}

function hideOrderProduct(event) {
    if (!(op.contains(event.target))) {
        op.style.visibility = 'hidden';
        items.innerHTML = "";
    }
}

async function getData(id) {
    let postData = JSON.stringify({id: id})
    let response = await AJAX_request(ACTION_ADMIN_URL + '/orders/order-products.php', 'POST', postData);
    items.innerHTML = "";
    op.style.visibility = 'visible';
    op.style.left = mousePos.x + 'px';
    op.style.top = mousePos.y + 'px';
    for (const responseElement of response) {
        let item = document.createElement('p');
        item.classList.add('item');
        for (let i = 2; i >= 0; i--) {
            let p = document.createElement('p');
            p.innerText = responseElement[i];
            item.appendChild(p);
        }

        items.appendChild(item);
    }
    console.log(response);
}
