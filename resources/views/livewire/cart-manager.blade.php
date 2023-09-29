<aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[18%]">
    <div>
        <ul class="space-y-2 tracking-wide mt-8">
            @foreach($products_in_cart as $value)
            <li class="flex items-center gap-4">
                <img src="{{$value['product']->img}}" alt="" class="h-16 w-16 rounded object-cover" />
                <div>
                    <h3 class="text-sm text-gray-900">{{$value['product']->name}}</h3>

                    <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                        <div>
                            <dt class="inline">{{$value['product']->description}}</dt>
                        </div>

                        <div>
                            <dt class="inline">Valor: {{$value['sub_total']}}</dt>
                            <dd class="inline"> {{$value['product']->price}} value por unidade</dd>
                        </div>
                    </dl>
                </div>

                <div class="flex flex-1 items-center justify-end gap-2">
                    <form>
                        <label for="Line1Qty" class="sr-only"> Quantity </label>
                        <input type="number" min="1" value="{{$value['quantity']}}" id="Line1Qty" class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                    </form>
                    <button class="text-gray-600 transition hover:text-red-600">
                        <span class="sr-only">Remove item</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="space-y-4">
        <div data-ammout></div>
        <div class="text-center">
            <a href="/checkout" class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                Checkout
            </a>

            <a href="#" class="inline-block text-sm text-gray-500 underline underline-offset-4 transition hover:text-gray-600">
                Continue shopping
            </a>
        </div>
    </div>
    <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
        <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-700 group">
            <svg class="h-6 w-6 text-gray-700" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                <path d="M20 12h-13l3 -3m0 6l-3 -3" />
            </svg>
            <a class="group-hover:text-gray-700 delete_session">Encerrar Sessão</a>
        </button>
    </div>
</aside>