'use_stict';

import Loading from './components/loading'; // Loading Buttons
import Products from './components/products'; 
import Swal from 'sweetalert2'
var data = [];
var clientData = [];

const btn_pular = document.querySelector(".submit");
btn_pular.addEventListener('click', (event) =>{
   Loading.show(btn_pular, 'Processando');


   setTimeout(function() {
        Loading.hide(btn_pular, 'Continuar');
        changeStage(1);
        stripe();
}, 2000);
});

const payment_form = document.getElementById("payment_form");
const information_form = document.getElementById("information_form");
const confirm_form = document.getElementById("confirm_form");


function changeStage(stage){
    switch (stage) {
        case 0:
            payment_form.style.display = "none";
            information_form.style.display = "block";
        break;
        case 1:
            information_form.style.display = "none";
            payment_form.style.display = "block";
            submitUser();
        break;
        case 2:
            information_form.style.display = "none";
            payment_form.style.display = "none";
            confirm_form.style.display = "block";
        break;
        default:

            break;
    }
}


const btn_back_stage = document.getElementById("back_stage");
btn_back_stage.addEventListener('click', (event) =>{
   //Loading.show(btn_pular, 'Processando');
    changeStage(0);
});


function stripe (clientSecret){
    var stripe = Stripe('pk_test_51N3UsIGZ2CkNUhfuS3e6ql4ycSKtbmftL4rWM76LvyMXozueJalmplR4IHevULXkDGgLYSY40yZHp3XRorkRrDUe00oaVbKN62');

    const appearance = {
        theme: 'stripe'
      };
      
    var elements = stripe.elements({
        clientSecret,
        appearance
    });
  
    const options = { mode: 'billing' };

    var linkAuthenticationElement = elements.create('linkAuthentication');
    var linkAuthenticationElement = elements.getElement('linkAuthentication');
    const paymentElement = elements.create('payment', options);
    paymentElement.mount('#payment-element');
    const addressElement = elements.create('address', options);
    addressElement.mount('#address-element');

    const btn_submit = document.querySelector(".submit_stripe");
    btn_submit.addEventListener('click', async (event) =>{
    Loading.show(btn_submit, 'Processando');


    await stripe.confirmPayment({
        elements,
        confirmParams: {
            return_url: 'https://example.com',
        },
        redirect: "if_required",
        
        }).then(function(result) {
            console.log(result);
            if (result.error) {
            // Exibe erro caso ocorra um erro com o cartão
            const messageContainer = document.querySelector('#error-message');
            messageContainer.textContent = error.message;
            Loading.hide(btn_submit, 'Assinar');
            console.log(result.error.message);    
    
            } else {
            // The payment has been processed!
            Loading.hide(btn_submit, 'Concluido');
            createOrder(result);
            console.log(result);
            changeStage(2);
            }
        });
});
}

var myHeaders = new Headers({
    "Content-Type": "application/json",
    "Accept": "application/json, text-plain, */*",
    "X-Requested-With": "XMLHttpRequest",
    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')['content']
  });

function submitUser()
{
    const form = document.getElementById('form_submit');
    var formData = new FormData(form);

    data = {
        'email': formData.get('email'),
        'phone': formData.get('phone'),
        'name': formData.get('name'),
        'cpf': formData.get('cpf').replace(/[^0-9]/g, ""),
    }

    fetch('http://127.0.0.1:8000' + '/api/create-customer', {
        headers: myHeaders,
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify({data})
    })
    .then(response => response.json())
        .then(function(result){
        console.log(result);
        clientData = {
            'customer' : result.customer,
            'subscription': result.subscription,
            'products' : result.products
        }
        stripe(result.clientSecret);
    }).catch(function (error) {
        console.log(error);
    });
    
}

function createOrder(order)
{
    var dataOrder = {
        'email': data['email'],
        'phone': data['phone'],
        'name': data['name'],
        'cpf': data['cpf'],
        'payment_status': 'paid',
        'payment_method': order.paymentIntent.payment_method,
        'total': order.paymentIntent.amount,
        'stripe_id': clientData['customer'],
        'subscription': clientData['subscription'],
        'products': clientData['products']
    }

    fetch('http://127.0.0.1:8000' + '/api/create-order', {
        headers: myHeaders,
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify({dataOrder})
    })
    .then(response => response.json())
        .then(function(result){
        console.log(result);
    }).catch(function (error) {
        console.log(error);
    });
    
}



const products_in_cart = [];

async function loadCart() {
    const response = await fetch('http://127.0.0.1:8000' + '/api/cart/index');
    const products = await response.json();
    console.log(products);

    const list_products = document.querySelector('[data-list]');
    list_products.innerHTML = Products.loadingProducts(products['cart']);

    const sub_ammout_products = document.querySelector('[data-sub-ammout]');
    sub_ammout_products.innerHTML = Products.subAmountCart(products['ammout']);

    const ammout_products = document.querySelector('[data-ammout]');
    ammout_products.innerHTML = Products.amountCart(products['ammout']);

    const plus = [].slice.call(document.querySelectorAll('.plus'));
    if (plus) {
            plus.map(function (plus) {
            plus.addEventListener('click', event => {
            event.preventDefault();
            const id = plus.dataset.id;
            const qtyProduct = document.querySelector('#qty'+id);
            const valueInput = Number(qtyProduct.value) + 1;
            if(valueInput > 5){
                alert('Quantidade maxima de produtos!');
                return;
            }
            qtyProduct.value = valueInput;
            putCart(id, 1);
            });
        });
    }
    const minus = [].slice.call(document.querySelectorAll('.minus'));
    if (minus) {
        minus.map(function (minus) {
        minus.addEventListener('click', event => {
        event.preventDefault();
        const id = minus.dataset.id;
        const qtyProduct = document.querySelector('#qty'+id);
        const valueInput = Number(qtyProduct.value) - 1;
        if(valueInput < 1){
            alert('Quantidade miníma de produtos!');
            return;
        }
        qtyProduct.value = valueInput;
        putCart(id, -1);
        });
    });  
    };
}
//loadCart();


function putCart(code, quantity)
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
        loadCart();
    }).catch(function (error) {
        console.log(error);
    });
}



function deleted(code, quantity)
{
    fetch('http://127.0.0.1:8000' + '/api/cart/delete', {
        headers: myHeaders,
        method: 'POST',
        credentials: "same-origin",
        body: JSON.stringify({code, quantity})
    })
    .then(response => response.json())
        .then(function(result){
        console.log(result);
    }).catch(function (error) {
        console.log(error);
    });
    
}

//deleted('1', 2);
  
putCart('1','3');


const btn_remover = document.querySelectorAll(".remover");
btn_remover.forEach(btn =>{
btn.addEventListener('click', (event) =>{
    event.preventDefault();
    const id = +btn.getAttribute('data-id');
    Products.removeItemCart(products_in_cart, id);
    list_products.innerHTML = Products.loadingProducts(products_in_cart);
});
});


    /*const htmlAlert = document.querySelector('.promo_code')
    if (htmlAlert) {
        htmlAlert.onclick = function () {
            Swal.fire({
                title: 'Selecionar a quantidade',
                html:
                '<div class="flex justify-center h-10 w-full rounded-lg relative bg-transparent mt-1">'+
                '<button class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none minus">' +
                    '<span class="m-auto text-2xl font-thin">−</span>' +
                '</button>' +
                '<input type="number" class="outline-none focus:outline-none text-center w-10 bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" name="custom-input-number" value="0"></input>' +
                '<button class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer plus">' +
                '<span class="m-auto text-2xl font-thin">+</span>' +
                '</button></div>',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                'Atualizar',
                confirmButtonAriaLabel: 'Atualizar Quantidade!',
                cancelButtonText:
                'Cancelar',
                cancelButtonAriaLabel: 'Thumbs down'
          });
          const plus = [].slice.call(document.querySelectorAll('.plus'));
            if (plus) {
                    plus.map(function (plus) {
                    plus.addEventListener('click', event => {
                    event.preventDefault();
                    console.log('opa');
                    });
                });
            }
        const minus = [].slice.call(document.querySelectorAll('.minus'));
            if (minus) {
                minus.map(function (minus) {
                minus.addEventListener('click', event => {
                event.preventDefault();
                console.log('opa');
                });
            });  
        };
    }
}
*/

function teste()
{
    alert("Boa tarde!");
}