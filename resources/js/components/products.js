'use_strict'
import currency from '../services/currency';
import Swal from 'sweetalert2'
const Products = {

    loadingProducts(products){
        return products.map((item) => {
            return (
             `
            <div class="flex flex-col rounded-lg sm:flex-row mt-4" style="background-color: #0e121d;" >
                <img src="${ item.product.img }" class="m-2 h-24 w-22 rounded-md  object-cover object-center" alt="" />
                    <div class="flex justify-between">
                        <div class="ml-3 mt-4">
                            <button style="right:250px; position:absolute;" class="text-xs font-normal text-opacity-80 text-white remover" data-id="${ item.product.id }">Remover</button>
                            <p class="text-base font-semibold text-white">${ item.product.name }</p>
                            <p class="text-xs font-normal text-opacity-80 text-white">${ item.product.description }</p>
                            <div class="flex justify-between mt-5">
                              <div class="flex flex-row border h-6 w-20 rounded border-gray-400 relative">
                                <button class="font-semibold border-r bg-white text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 flex rounded-l focus:outline-none cursor-pointer minus" data-id="${ item.product.id }">
                                    <span class="m-auto">-</span>
                                </button>
                                <input type="text" class="outline-none focus:outline-none text-center w-full bg-white font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" readonly name="custom-input-number" value="${ item.quantity }" id="qty${ item.product.id }" />
                                <button class="font-semibold border-l bg-white text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 flex rounded-r focus:outline-none cursor-pointer plus" data-id="${ item.product.id }">
                                    <span class="m-auto">+</span>
                                </button>
                              </div>
                              <div >
                                <p class="text-sm font-semibold text-white mt-2"> <strong>${ currency(item.sub_total) }</strong> por mês</p>
                              </div>
                            </div>
                        </div>
                </div>
            </div>
             `
            )
           }).join('');
    },

    removeItemCart(array, id) {
        var result = array.filter(function(el) {
          return el.id == id;
        });
          
        for(var elemento of result){
          var index = array.indexOf(elemento);    
          array.splice(index, 1);
        }
    },
    subAmountCart(array){
      return (
        `
        <li class="flex justify-between">
          <div class="inline-flex mt-5">
              <div class="ml-3">
                  <p class="text-base font-semibold text-white">Subtotal</p>
              </div>
          </div>
          <p class="mt-5 text-sm font-semibold text-white"> ${ currency(array) }</p>
      </li>
        `
       )
  },
  amountCart(array){
    return (
      `
      <div class="space-y-2">
          <p class="flex justify-between text-lg font-medium text-white""><span>Total</span><span> ${ currency(array) }</span></p>
      </div>
      `
     )
  },
  updateQuantity(id){
    return (
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
      })
     )
  }
    
}
export default Products; 
