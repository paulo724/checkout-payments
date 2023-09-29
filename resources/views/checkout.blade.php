<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel</title>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/8fa86258ce.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/tailwind.css'])
    <style>
        .fa {
            margin-left: 5px;
            margin-right: 8px;
        }

        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .custom-number-input input:focus {
            outline: none !important;
        }

        .custom-number-input button:focus {
            outline: none !important;
        }
    </style>
</head>

<body>

    <div class="relative mx-auto w-full bg-white">
        <div class="grid min-h-screen grid-cols-10">
            <div class="relative col-span-full flex flex-col py-6 pl-4 pr-4 sm:py-12 lg:col-span-5 lg:py-24" style="background-color: #111828;">
                <div class="mx-auto w-full max-w-lg ">
                    <div class="inline-flex mb-5">
                        <a href="/cart"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 12H6M12 5l-7 7 7 7" />
                            </svg></a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e51b5c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    <p class="text-2xl font-medium text-white">Resumo do seu pedido</p>
                    <p class="text-gray-400">Verifique seus itens e selecione um método de pagamento.</p>
                    <ul class="space-y-5 mt-10">
                        <div data-list></div>
                        <div data-sub-ammout></div>
                    </ul>

                    <div class="my-5 h-0.5 w-full bg-gray-400 bg-opacity-20"></div>
                    <button class="bg-gray-500 bg-opacity-20 hover:bg-gray-400 text-gray-500 font-normal py-2 px-4 rounded-r promo_code">
                        Adicionar Código Promocional
                    </button>
                    <div class="my-5 h-0.5 w-full bg-gray-400 bg-opacity-20"></div>

                    <div data-ammout></div>

                </div>
            </div>
            <div class=" col-span-full py-6 px-4 sm:py-12 lg:col-span-5 lg:py-24 shadow-lg">
                <div class="mx-auto w-full max-w-lg ">
                    <div>
                        <div id="information_form">
                            <div class="mt-4 mb-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                                <div class="relative">
                                    <ul class="relative flex w-full items-center  space-x-2 sm:space-x-4">
                                        <li class="flex items-center space-x-3 text-left ">
                                            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">1</a>

                                            <span class="font-semibold text-gray-900">Informações</span>
                                        </li>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">2</a>
                                            <span class="font-semibold text-gray-500">Pagamento</span>
                                        </li>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">3</a>
                                            <span class="font-semibold text-gray-500">Conclusão</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-xl font-medium">Informações de Contato</p>
                            <p class="text-gray-400">Conclua seu pedido fornecendo seus dados!</p>
                            <form method="post" id="form_submit">
                                @csrf
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">

                                    <div class="sm:col-span-6">

                                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                        <div class="mt-2">
                                            <input type="text" name="email" id="email" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Telefone</label>
                                        <div class="mt-2">
                                            <input type="text" name="phone" id="phone" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nome Completo</label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-6">
                                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">CPF/CNPJ</label>
                                        <div class="mt-2">
                                            <input type="text" name="cpf" id="cpf" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                        </div>
                                    </div>
                                    {{-- <div class="sm:col-span-3">
                                                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Sexo Biologico</label>
                                                <div class="mt-2">
                                                    <select name="gender" id="gender" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                        <option value="m">Masculino</option>
                                                        <option value="f">Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3 mb-5">
                                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Data de Nascimento</label>
                                                <div class="mt-2">
                                                    <input type="date" name="birth_date" id="birth_date" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>--}}
                                </div>
                                <button type="submit" class="submit mt-10 inline-flex w-full items-center justify-center rounded bg-sky-950 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-1 focus:ring-sky-950 sm:text-lg">Continuar</button>
                            </form>
                        </div>
                        <div id="payment_form" hidden>
                            <div class="mt-4 mb-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                                <div class="relative">
                                    <ul class="relative flex w-full items-center  space-x-2 sm:space-x-4">
                                        <li class="flex items-center space-x-3 text-left ">
                                            <a id="back_stage" class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg></a>
                                            <span class="font-semibold text-gray-900">Informações</span>
                                        </li>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <li class="flex items-center space-x-3 text-left sm:space-x-4">
                                            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">2</a>
                                            <span class="font-semibold text-gray-500">Pagamento</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-xl font-medium">Informações de Pagamento</p>
                            <p class="text-gray-400">Conclua seu pagamento fornecendo seus dados!</p>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">

                                <div class="sm:col-span-6" id="link-authentication-element">
                                    <!--Stripe.js injects the Link Authentication Element-->
                                </div>
                                <div class="sm:col-span-6" id="payment-element">
                                    <!--Stripe.js injects Payment Element-->
                                </div>
                                <div class="sm:col-span-6" id="address-element">
                                    <!--Stripe.js injects Address Element-->
                                </div>
                            </div>
                            <div class="flex items-center  mt-5">
                                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Concordo com os <a href="#" class="whitespace-nowrap text-teal-400 underline hover:text-teal-600">Termos e Condições</a> e a
                                    <a href="#" class="whitespace-nowrap text-teal-400 underline hover:text-teal-600">Política de Privacidade</a> da empresa PwrSaúde</label>
                            </div>
                            <button class="submit_stripe mt-10 inline-flex w-full items-center justify-center rounded bg-sky-950 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-1 focus:ring-sky-950 sm:text-lg">Continuar</button>
                            <div id="error-message">
                                <!-- Display error message to your customers here -->
                            </div>
                        </div>
                        <div id="confirm_form" hidden>
                            <div class="mt-4 mb-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                                <div class="relative">
                                    <ul class="relative flex w-full items-center  space-x-2 sm:space-x-4">
                                        <li class="flex items-center space-x-3 text-left ">
                                            <a id="back_stage" class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg></a>
                                            <span class="font-semibold text-gray-900">Informações</span>
                                        </li>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                        <li class="flex items-center space-x-3 text-left ">
                                            <a id="back_stage" class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                </svg></a>
                                            <span class="font-semibold text-gray-900">Pagamento</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <p class="text-xl font-medium">Informações de Pagamento</p>
                            <p class="text-gray-400">Enviamos para o seu email uma recibo de compra!</p>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                                <div class="mt-10 sm:col-span-6 flex items-center justify-center">
                                    <img class="w-24 h-24" src="{{ URL::asset('img/checkout/checkmark.png') }}" alt="Help center articles">
                                </div>
                                <div class="sm:col-span-6 flex items-center justify-center">
                                    <p class="text-xl font-medium text-center">Pagamento Realizado com Sucesso!</p>
                                </div>
                            </div>
                            <button class="mt-10 inline-flex w-full items-center justify-center rounded bg-sky-950 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-1 focus:ring-sky-950 sm:text-lg">Continuar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cart', () => ({
                products_in_cart: [{
                        id: 1,
                        value: '99,90',
                        name: 'Plano de Saúde',
                        description: 'O Seu plano de saúde digital.',
                        img: 'https://cdn-icons-png.flaticon.com/512/2024/2024230.png'
                    },
                    {
                        id: 2,
                        value: '45,90',
                        name: 'Plano Odontológico',
                        description: 'O Seu plano Odontológico digital.',
                        img: 'https://cdn-icons-png.flaticon.com/512/2818/2818366.png'
                    },
                ],
            }))
            Alpine.data('total_in_cart', () => ({
                valor_itens: 'products_in_cart.reduce((total, item) => total += (item.id * item.value), 0),'
            }))
        })
    </script>
</body>

</html>