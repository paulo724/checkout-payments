<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://kit.fontawesome.com/8fa86258ce.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/tailwind.css'])
</head>

<body>
    <div class="relative mx-auto w-full bg-white">
        <div class="grid min-h-screen grid-cols-10">
            <div class="relative col-span-full flex flex-col py-6 pl-4 pr-4 sm:py-12 lg:col-span-5 lg:py-24" style="background-color: #111828;">
                <div class="mx-auto w-full max-w-lg ">
                    <div class="inline-flex mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 12H6M12 5l-7 7 7 7" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e51b5c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    <p class="text-2xl font-medium text-white">Resumo do seu pedido</p>
                    <p class="text-gray-400">Verifique seus itens e selecione um método de pagamento.</p>
                    <ul class="space-y-5 mt-10">
                        <div class="flex flex-col rounded-lg sm:flex-row" style="background-color: #0e121d;">
                            <img class="m-2 h-24 w-22 rounded-md  object-cover object-center" src="https://cdn-icons-png.flaticon.com/512/2024/2024230.png" alt="" />
                            <div class="flex justify-between">
                                <div class="ml-3 mt-4">
                                    <p style="right:250px; position:absolute;" class="text-xs font-normal text-opacity-80 text-white">Remover</p>
                                    <p class="text-base font-semibold text-white">Plano de Saúde </p>
                                    <p class="text-xs font-normal text-opacity-80 text-white">O Seu plano de saúde digital.</p>
                                    <p class="text-sm font-semibold text-white mt-5">R$ 99,90 por mês</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col rounded-lg sm:flex-row" style="background-color: #0e121d;">
                            <img class="m-2 h-24 w-22 rounded-md border object-cover object-center" src="https://cdn-icons-png.flaticon.com/512/3467/3467830.png" alt="" />
                            <div class="flex justify-between">
                                <div class="ml-3 mt-4">
                                    <p style="right:250px; position:absolute;" class="text-xs font-normal text-opacity-80 text-white">Remover</p>
                                    <p class="text-base font-semibold text-white">Plano Odontológico</p>
                                    <p class="text-xs font-normal text-opacity-80 text-white">O Seu plano de ondontologico digital.</p>
                                    <p class="text-sm font-semibold text-white mt-5">R$ 45,90 por mês</p>
                                </div>
                            </div>
                        </div>
                        <li class="flex justify-between">
                            <div class="inline-flex mt-5">
                                <div class="ml-3">
                                    <p class="text-base font-semibold text-white">Subtotal</p>
                                </div>
                            </div>
                            <p class="mt-5 text-sm font-semibold text-white">R$ 145,80</p>
                        </li>
                    </ul>
                    <div class="my-5 h-0.5 w-full bg-gray-400 bg-opacity-20"></div>
                    <button class="bg-gray-500 bg-opacity-20 hover:bg-gray-400 text-gray-500 font-normal py-2 px-4 rounded-r">
                        Adicionar Código Promocional
                    </button>
                    <div class="my-5 h-0.5 w-full bg-gray-400 bg-opacity-20"></div>

                    <div class="space-y-2">
                        <p class="flex justify-between text-lg font-medium text-white""><span>Total</span><span>R$ 145,80</span></p>
                    </div>
                </div>
            </div>
            <div class=" col-span-full py-6 px-4 sm:py-12 lg:col-span-5 lg:py-24 shadow-lg">
                        <div class="mx-auto w-full max-w-lg ">
                            <form x-data="ContactForm()" @submit.prevent="submitForm" class="space-y-2">
                                <div x-data="{ formStep: 1 }">
                                    <div x-cloak x-show="formStep == 1">
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
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-cloak x-show="formStep == 2">
                                        <div class="mt-4 mb-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
                                            <div class="relative">
                                                <ul class="relative flex w-full items-center  space-x-2 sm:space-x-4">
                                                    <li class="flex items-center space-x-3 text-left ">
                                                        <a x-cloak x-show="formStep == 2" @click="formStep -= 1" class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                                    </div>

                                    <div x-cloak x-show="formStep === 1">

                                        <p class="text-xl font-medium">Informações de Pessoais</p>
                                        <p class="text-gray-400">Conclua seu pedido fornecendo seus dados!</p>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                                            <div class="sm:col-span-6">
                                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                                <div class="mt-2">
                                                    <input type="text" x-model="formData.email" name="email" id="first-name" autocomplete="given-name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-6">
                                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Telefone</label>
                                                <div class="mt-2">
                                                    <input type="text" x-model="formData.phone" name="phone" id="first-name" autocomplete="given-name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-6">
                                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Nome Completo</label>
                                                <div class="mt-2">
                                                    <input type="text" x-model="formData.name" name="email" id="first-name" autocomplete="given-name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-6">
                                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">CPF</label>
                                                <div class="mt-2">
                                                    <input type="text" x-model="formData.cpf" name="cpf" id="first-name" autocomplete="given-name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3">
                                                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Sexo Biologico</label>
                                                <div class="mt-2">
                                                    <select id="country" x-model="formData.sexo" name="sexo" autocomplete="country-name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                        <option>Masculino</option>
                                                        <option>Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-3 mb-5">
                                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Data de Nascimento</label>
                                                <div class="mt-2">
                                                    <input type="text" x-model="formData.date" name="date" id="first-name" autocomplete="given-name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-cloak x-show="formStep === 2">

                                        <p class="text-xl font-medium">Informações de Pagamento</p>
                                        <p class="text-gray-400">Conclua seu pagamento fornecendo seus dados!</p>
                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">

                                            <div class="sm:col-span-6" id="link-authentication-element">
                                                <!--Stripe.js injects the Link Authentication Element-->
                                            </div>
                                            <div class="sm:col-span-6" id="payment-element">
                                                <!--Stripe.js injects Payment Element-->
                                            </div>
                                            <div class="sm:col-span-6 mb-5">
                                                <label for="last-name" class="block text-sm font-normal leading-6 text-gray-900">CEP</label>
                                                <div class="mt-2">
                                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="w-full rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button x-cloak @click="formStep += 1" class="mt-10 inline-flex w-full items-center justify-center rounded bg-sky-950 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-1 focus:ring-sky-950 sm:text-lg">Continuar</button>
                                    <p class="mt-10 text-center text-sm font-semibold text-gray-500">Ao fazer este pedido você concorda com os <a href="#" class="whitespace-nowrap text-teal-400 underline hover:text-teal-600">Termos e Condições</a></p>
                                </div>
                            </form>
                        </div>
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('pk_test_51N3UsIGZ2CkNUhfuS3e6ql4ycSKtbmftL4rWM76LvyMXozueJalmplR4IHevULXkDGgLYSY40yZHp3XRorkRrDUe00oaVbKN62');
            var elements = stripe.elements({
                mode: 'payment',
                currency: 'usd',
                amount: 1099,
            });
            const appearance = {
                /* appearance */
            };
            const options = {
                /* options */
            };

            var linkAuthenticationElement = elements.create('linkAuthentication');
            var linkAuthenticationElement = elements.getElement('linkAuthentication');

            const paymentElement = elements.create('payment', options);
            paymentElement.mount('#payment-element');
        </script>
        <script>
            function ContactForm() {
                return {
                    formData: {
                        name: "",
                        email: "",
                        message: "",
                    },
                    submitForm() {
                        fetch(FORM_URL, {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    Accept: "application/json",
                                },
                                body: JSON.stringify(this.formData),
                            })
                            .then(() => {
                                this.formData.name = "";
                                this.formData.email = "";
                                this.formData.message = "";

                            })
                            .catch(() => {
                                this.formMessage = "Something went wrong.";
                            })
                            .finally(() => {
                                this.formLoading = false;
                                this.buttonText = "Submit";
                            });
                    },
                };
            }
        </script>
        </script>
</body>

</html>