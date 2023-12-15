@extends("dashboard.master")
@section('content')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

    </style>
    @if (Session::has('updateUnsuccessfull'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-red-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-red-700">
                {{ Session::get('updateUnsuccessfull') }}</div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif
    @if (Session::has('updateSuccessfull'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-green-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-green-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-green-700">
                {{ Session::get('updateSuccessfull') }}</div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif

    <div class="block items-center justify-between bg-white p-4 sm:flex lg:mt-1.5">
        <div class="mb-1 w-full">
            <div class="">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <svg class="mr-2.5 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2"
                                    aria-current="page">Settings</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">User Settings</h1>
            </div>
        </div>
    </div>

    <div class="bg-white px-4 py-4 pt-6">
        <form action="/updateUserProfile" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                <div class="rounded-lg bg-white p-2 shadow-md sm:p-4 xl:p-6">
                    <div class="mb-2 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-normal text-gray-500 sm:text-2xl">Profile Picture</h3>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                        <div class="rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class=""> <img src="{{ asset(session()->get('User')->uimage) }}"
                                        alt="{{ session()->get('User')->uname }}"
                                        class="mx-auto h-72 rounded-lg object-cover object-center">
                                </div>
                            </div>
                            <div class=""> <button style=""
                                    class="my-3 w-full overflow-x-hidden rounded-lg border border-cyan-600 px-5 py-2.5 text-sm font-medium text-cyan-600 hover:bg-cyan-700 hover:text-white focus:ring-4 focus:ring-blue-300"
                                    onclick="changePictureClicked()" id="changePicture">Change
                                    Picture</button>
                                <input type='file' id="getFile" style="display:none" name="newProfilePicture"
                                    accept=".png, .jpg, .jpeg" name="uimageInput">
                                <script>
                                    let imgfile = document.getElementById('getFile');
                                    let imgBtn = document.getElementById('changePicture');

                                    function changePictureClicked() {

                                        event.preventDefault();
                                        imgfile.click()
                                    }

                                    imgfile.onchange = function() {

                                        let myArray = this.value.split("\\");
                                        imgBtn.innerText = myArray[myArray.length - 1];
                                    };
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 rounded-lg bg-white p-2 shadow-md sm:p-4 xl:p-6">
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-normal text-gray-500 sm:text-2xl">User Details</h3>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                        <div class="rounded-lg">
                            <div class="inline-block min-w-full align-middle">
                                <div class="sm:rounded-lg">
                                    <div class="mb-6 grid grid-cols-1 gap-2 sm:grid-cols-2">
                                        <div class=""> <label for="email"
                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">Your
                                                Name</label>
                                            <input type="name" id="uname"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                placeholder="User Name" required="" name="unameInput"
                                                value="{{ session()->get('User')->uname }}">
                                        </div>
                                        <div class=""> <label for="email"
                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">Your
                                                Email</label>
                                            <input type="email" id="email" name="uemailInput"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                placeholder="dipeshgupta@gmail.com" required=""
                                                value="{{ session()->get('User')->uemail }}">
                                        </div>
                                    </div>
                                    <div class="mb-6 grid grid-cols-1 gap-2 sm:grid-cols-3">
                                        <div class=""> <label for="password"
                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">Old
                                                Password</label>
                                            <input type="password" id="oldpassword" name="uoldpasswordInput"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                            @error('uoldpasswordInput')
                                                <div class="text-sm text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class=""> <label for="password"
                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">New
                                                Password</label>
                                            <input type="password" id="newpassword" name="unewpasswordInput"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                            @error('unewpasswordInput')
                                                <div class="text-sm text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class=""> <label for="password"
                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">Confirm
                                                Password</label>
                                            <input type="password" id="confirmpassword" name="uconfirmpasswordInput"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                            @error('uconfirmpasswordInput')
                                                <div class="text-sm text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <script>
                                            let np = document.getElementById("newpassword");
                                            let cp = $("#confirmpassword");

                                            cp.keyup(() => {
                                                cp.removeClass("border-gray-300");
                                                cp.removeClass("focus:ring-blue-500");
                                                cp.removeClass("focus:border-blue-500");
                                                if ($("#newpassword").val() == cp.val()) {
                                                    cp.removeClass("border-red-500");
                                                    cp.removeClass("focus:ring-red-500");
                                                    cp.removeClass("focus:border-red-500");
                                                    cp.addClass("border-green-500");
                                                    cp.addClass("focus:ring-green-500");
                                                    cp.addClass("focus:border-green-500");
                                                } else {
                                                    cp.removeClass("border-green-500");
                                                    cp.removeClass("focus:ring-green-500");
                                                    cp.removeClass("focus:border-green-500");
                                                    cp.addClass("border-red-500");
                                                    cp.addClass("focus:ring-red-500");
                                                    cp.addClass("focus:border-red-500");
                                                }

                                            });
                                        </script>
                                    </div>

                                    <div class="mb-5 grid grid-cols-1 gap-2 sm:grid-cols-3">
                                        <div class=""> <label for="password"
                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">Your
                                                Number</label>
                                            <input type="number" id="uphone" name="uphoneInput"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                required="" value="{{ session()->get('User')->uphone }}">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="password"
                                                class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">Your
                                                Address</label>
                                            <input type="text" id="password" name="uaddressInput"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                required="" value="{{ session()->get('User')->uaddress }}">
                                        </div>
                                    </div>
                                    <div class="mb-6 grid grid-cols-1 sm:grid-cols-3">
                                        <input type="submit"
                                            class="my-2 w-full overflow-x-hidden rounded-lg border border-cyan-600 bg-cyan-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-blue-300"
                                            id="submit" value="Update">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
