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

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/tailwind.css'])
</head>

<body>
    <!-- body start -->
    <div class="bg-gray-200 relative min-h-screen antialiased border-t-8 border-black">
        <div class="max-w-sm mx-auto px-6" x-data="getData()">
            <!-- modal starts -->

            <div x-show.transition="status || isError" style="background-color: rgb(0,0,0, .5)" class="mx-auto absolute top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                <div class="container mx-auto rounded p-4 mt-2 overflow-y-auto">
                    <div class="bg-white rounded px-8 py-8 max-w-lg mx-auto">
                        <h1 class="font-bold text-2xl mb-3 text-center" x-text="modalHeaderText"></h1>
                        <div :class="{'text-green-700': status, 'text-red-700': isError}" class="modal-body text-center">
                            <p x-text="modalBodyText"></p>
                        </div>
                        <div class="mt-4">
                            <button @click="location.reload()" class="mt-3 text-lg font-semibold bg-gray-800 w-full 
                 text-white rounded-lg px-6 py-3 block shadow-xl 
                 hover:text-white hover:bg-black">
                                Close Modal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal ends -->

            <!-- form container starts -->
            <div x-show="!status && !isError" class="relative h-screen flex flex-wrap items-center">
                <div class="w-full relative">

                    <div class="mt-6">
                        <div class="text-center font-semibold text-black text-2xl"> SignUp </div>
                        <!-- registration form starts-->

                        <form action="/register" method="POST" class="mt-8" @submit.prevent="submitData">
                            <div class="mx-auto max-w-lg ">

                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Email</span>
                                    <input placeholder="" type="text" x-model="formData.email" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 
         border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500
         focus:bg-white focus:border-gray-600 focus:outline-none">
                                </div>

                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Password</span>
                                    <input placeholder="" type="password" x-model="formData.password" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 
       border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 
         focus:bg-white focus:border-gray-600 focus:outline-none">
                                </div>

                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Password Confirm</span>
                                    <input placeholder="" type="password" x-model="formData.password_confirm" class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 
       border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 
       focus:bg-white focus:border-gray-600 focus:outline-none">
                                </div>

                                <!-- validation starts -->

                                <div class="flex justify-start mt-3 ml-4 p-1">
                                    <ul>
                                        <!-- Validate Email -->
                                        <li x-show="formData.email.length > 0" class="flex items-center py-1">
                                            <div :class="{'bg-green-200 text-green-700': isEmail(formData.email),
            'bg-red-200 text-red-700': !isEmail(formData.email)}" class=" rounded-full p-1 fill-current ">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path x-show="isEmail(formData.email)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    <path x-show="!isEmail(formData.email)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>
                                            <span :class="{'text-green-700': isEmail(formData.email), 
               'text-red-700': !isEmail(formData.email)}" class="font-medium text-sm ml-3" x-text="isEmail(formData.email) ? 
             'Email is valid' : 'Email is not valid!' "></span>
                                        </li>

                                        <!-- Validate Password -->
                                        <li x-show="formData.password.length > 0" class="flex items-center py-1">
                                            <div :class="{'bg-green-200 text-green-700': formData.password.length > 7,
           'bg-red-200 text-red-700':formData.password.length < 8 }" class=" rounded-full p-1 fill-current ">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path x-show="formData.password.length > 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    <path x-show="formData.password.length < 8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>

                                            <span :class="{'text-green-700': formData.password.length > 7, 
             'text-red-700':formData.password.length < 8 }" class="font-medium text-sm ml-3" x-text="formData.password.length > 7 ? 
             'The minimum length is reached' : 
             'At least 8 characters required' "></span>
                                        </li>

                                        <!-- Validate Password Confirm -->
                                        <li x-show="formData.password_confirm > 0" class="flex items-center py-1">
                                            <div :class="{'bg-green-200 text-green-700': 
           formData.password === formData.password_confirm, 
           'bg-red-200 text-red-700':formData.password !== 
           formData.password_confirm}" class=" rounded-full p-1 fill-current ">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path x-show="formData.password === formData.password_confirm" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    <path x-show="formData.password !== formData.password_confirm" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>

                                            <span :class="{'text-green-700': 
             formData.password === formData.password_confirm, 
             'text-red-700':formData.password !== formData.password_confirm}" class="font-medium text-sm ml-3" x-text="formData.password === formData.password_confirm ? 
             'Passwords match' : 'Passwords do not match' "></span>
                                        </li>

                                    </ul>
                                </div>
                                <!-- validation ends -->

                                <button class="mt-3 text-lg font-semibold bg-gray-800 w-full text-white 
     rounded-lg px-6 py-3 block shadow-xl hover:text-white hover:bg-black" x-text="buttonLabel" :disabled="loading">
                                </button>
                            </div>
                        </form>
                        <!-- registration form ends -->
                    </div>
                </div>
            </div>
        </div>
        <!-- form container ends -->

    </div>
    <!-- body end -->
    <script>
        function getData() {
            return {
                formData: {
                    email: "",
                    password: "",
                    password_confirm: ""
                },
                status: false,
                loading: false,
                isError: false,
                modalHeaderText: "",
                modalBodyText: "",
                buttonLabel: 'Submit',
                isEmail(email) {
                    var re = /\S+@\S+\.\S+/;
                    return re.test(email);
                },

                submitData() {
                    // Ensures all fields have data before submitting
                    if (!this.formData.email.length ||
                        !this.formData.password.length ||
                        !this.formData.password_confirm.length) {
                        alert("Please fill out all required field and try again!")
                        return;
                    }
                    this.buttonLabel = 'Submitting...'
                    this.loading = true;
                    fetch('https://reqre6s.in/api/users', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(this.formData)
                        })
                        .then((response) => {
                            if (response.status === 201) {
                                this.modalHeaderText = "Congratulations!!!"
                                this.modalBodyText = "You have been successfully registered!";
                                this.status = true;
                            } else {
                                throw new Error("Your registration failed");
                            }
                        })
                        .catch((error) => {
                            this.modalHeaderText = "Ooops Error!"
                            this.modalBodyText = error.message;
                            this.isError = true;
                        })
                        .finally(() => {
                            this.loading = false;
                            this.buttonLabel = 'Submit'
                        })
                }
            }
        }
    </script>
</body>

</html>