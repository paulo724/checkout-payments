'use_strict';

import Products from './components/products'; 

var myHeaders = new Headers({
    "Content-Type": "application/json",
    "Accept": "application/json, text-plain, */*",
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')['content']
  });

async function cart() {
    const response = await fetch('http://127.0.0.1:8000' + '/api/cart/index');
    const products = await response.json();
    console.log(products);

    const list_products = document.querySelector('[data-list]');
    list_products.innerHTML = Products.loadingProducts(products['cart']);

    /*const sub_ammout_products = document.querySelector('[data-sub-ammout]');
    sub_ammout_products.innerHTML = Products.subAmountCart(products['ammout']);*/

    const ammout_products = document.querySelector('[data-ammout]');
    ammout_products.innerHTML = Products.amountCart(products['ammout']);
}
cart();

function putCart(code, quantity = 1)
{
    fetch('http://127.0.0.1:8000' + '/api/cart/buy', {
        headers: myHeaders,
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify({code, quantity})
    })
    .then(response => response.json())
        .then(function(result){
        console.log(result);
        const list_products = document.querySelector('[data-list]');
        list_products.innerHTML = Products.loadingProducts(result['cart']);
        const ammout_products = document.querySelector('[data-ammout]');
        ammout_products.innerHTML = Products.amountCart(result['ammout']);
    }).catch(function (error) {
        console.log(error);
    });
}

putCart(1);

const add_cart = document.querySelectorAll('.add_cart');
add_cart.forEach(btn =>{
    btn.addEventListener('click', async (event) =>{
        try {
            event.preventDefault();
            const id = +btn.getAttribute('data-id');
            console.log(id);
            putCart(id);
        } catch (error) {
            console.log(error);
        }

});
});


const delete_session = document.querySelector('.delete_session');
delete_session.addEventListener('click', async (event) =>{
    fetch('http://127.0.0.1:8000' + '/api/cart/delete', {
        headers: myHeaders,
        method: 'POST',
        credentials: "same-origin",
    })
    .then(response => response.json())
        .then(function(result){
        console.log(result);
        location.reload();
    }).catch(function (error) {
           console.log(error);
    });
});

function teste()
{
    alert("Boa tarde!");
}
