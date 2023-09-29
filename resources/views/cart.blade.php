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

    @vite(['resources/css/app.css', 'resources/js/cart/main.js', 'resources/css/tailwind.css'])
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
    <aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[18%]">
        <div>
            <ul class="space-y-2 tracking-wide mt-8">
                <div data-list></div>
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

    <container class="flex flex-col items-center justify-center bg-gray-300 py-[12px] min-h-screen">
        <div class="md:text:4xl flex w-auto flex-col px-6 text-center text-2xl sm:text-3xl">
            <span class="mt-4"> Selecione os melhores planos para você! </span>
            <div class="mt-8 flex items-center justify-center gap-4 pl-5 text-base md:mt-16">
                <span>Assinaturas Mensais </span>
                <div class="flex items-center">
                    <label for="small-toggle" class="relative inline-flex cursor-pointer">
                        <input type="checkbox" value="" id="small-toggle" class="peer sr-only" />
                        <div class="peer h-5 w-9 flex-1 rounded-full bg-gray-200 align-middle after:absolute after:top-[2px] after:left-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-[#365CCE] peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none  dark:border-gray-600 dark:bg-gray-700 dark:peer-focus:bg-[#365CCE]"></div>
                    </label>
                </div>
                <span>Assinaturas Anuais</span>
            </div>
        </div>
        <div class="flex w-[300px] justify-end pt-2 sm:w-[350px] md:w-[590px] md:pt-0">
            <svg width="107" height="88" viewBox="0 0 107 88" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-14 md:w-20 h-20 -mt-8">
                <path d="M95.4463 61.5975C83.1573 64.6611 68.4838 65.2433 57.6839 57.506C50.782 52.5613 47.1171 42.5628 49.6964 34.4471C52.1324 26.7825 57.8212 20.0482 66.3457 20.2534C70.789 20.3604 74.6201 22.4047 75.429 27.084C76.6648 34.2329 69.5331 41.6308 63.8629 44.7405C46.1672 54.4452 21.1341 53.9052 4.27686 42.6407" stroke="#365CCE" stroke-width="3" stroke-linecap="round" />
                <path d="M11.7068 55.8447C9.64482 52.9634 5.14208 46.2418 3.62681 42.4054" stroke="#365CCE" stroke-width="3" stroke-linecap="round" />
                <path d="M3.62695 42.4055C7.1396 41.942 15.124 40.6363 18.9603 39.121" stroke="#365CCE" stroke-width="3" stroke-linecap="round" />
            </svg>
            <span class="pr-2 pt-2 text-sm font-medium text-[#365CCE] md:text-lg">
                Desconto de 25%
            </span>
        </div>
        <div class="flex h-full flex-col gap-6 px-5 lg:flex-row">
            @foreach($products as $value)
            <div class="h-full max-w-[378px] rounded-xl bg-white lg:w-auto xl:w-[378px]">
                <div class="flex h-full flex-col rounded-xl border border-gray-500 py-6 px-5 sm:px-10 lg:border-none">
                    <div class="flex flex-col text-left">
                        <div class="flex flex-col gap-3">
                            <span class="text-[22px]">{{$value->name}}</span>
                            <span>
                                {{$value->description}}
                            </span>
                        </div>
                        <div class="my-4 flex items-center gap-3">
                            <span class="text-[56px] font-semibold">R$ {{$value->value}}</span>
                            <span class="font-normal">/ Mês</span>
                        </div>
                        <button class="w-full rounded border-[1px] border-[#365CCE] py-2.5 text-[#365CCE] add_cart" data-id="{{$value->id}}">
                            Adicionar ao Carrinho
                        </button>
                        <div class="mt-10 space-y-3">
                            @foreach($value->description_services as $items)
                            <div class="flex items-center gap-4">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="32" height="32" rx="16" fill="#E8EDFB" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.8162 12.207C22.0701 12.4737 22.0597 12.8957 21.793 13.1495L14.0893 20.4829C13.9577 20.6081 13.7808 20.6742 13.5993 20.666C13.4179 20.6577 13.2477 20.5758 13.128 20.4391L10.1651 17.0545C9.92254 16.7775 9.95052 16.3563 10.2276 16.1138C10.5046 15.8713 10.9258 15.8992 11.1683 16.1763L13.6734 19.0379L20.8737 12.1838C21.1404 11.9299 21.5624 11.9403 21.8162 12.207Z" fill="#365CCE" />
                                </svg>
                                <span class="text-base font-medium">
                                    {{$items}}
                                </span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </container>

</body>

</html>