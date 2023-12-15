<div id="home" class="flex h-screen flex-col-reverse sm:flex-row">
    <div class="flex justify-center sm:w-1/3 md:w-1/3 lg:w-1/3">
        <div class="mb-24 mt-6 ml-2 max-w-sm rounded-lg bg-white p-6 dark:bg-gray-800 sm:mt-52">
            <a href="#">
                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Quick Inventory</h5>
            </a>
            <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">Here is the simple yet powerfull
                inventory
                management web app you could find.</p>
            <a href="#"
                class="hidden items-center rounded-lg bg-blue-700 py-2 px-3 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:inline-flex">
                Read more
                <svg class="ml-2 -mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#"
                class="inline-flex items-center rounded-lg bg-blue-700 py-2 px-3 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:hidden"
                data-modal-toggle="login-modal">
                Login
            </a>
        </div>
    </div>
    <div class="items-center justify-center p-2 sm:flex sm:h-screen sm:w-2/3 sm:p-0 md:w-2/3 lg:w-2/3">
        {{-- <img class="" src="https://tri-merit.com/wp-content/uploads/2020/03/sbir-grants-tax-credits.jpg"
            alt="Quick Inventory"> --}}
        <img class="" src="{{ asset('/images/staticImages/siteHome.jpg') }}" alt="Quick Inventory">
    </div>
</div>


<div>
    <h3 id="features" class="text-center text-4xl font-bold"><span class="w-1/3 border-b-2">Our Features</span></h3>
</div>

<div class="flex h-screen flex-col sm:flex-row">
    <div class="h-screen items-center justify-center p-2 sm:flex sm:w-2/3 sm:p-0 md:w-2/3 lg:w-2/3">
        <img class="sm:scale-75" src="{{ asset('/images/staticImages/animation1.gif') }}" alt="Quick Inventory">
    </div>
    <div class="flex justify-center sm:w-1/3 md:w-1/3 lg:w-1/3">
        <div class="mt-16 ml-2 max-w-sm rounded-lg bg-white p-6 dark:bg-gray-800 sm:mt-52">
            <a href="#">
                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Inventory Forecasting
                </h5>
            </a>
            <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">This feature of the inventory
                management system helps managers in meeting customer expectations and reduction of stock out risks.</p>
            <span
                class="inline-flex items-center rounded-lg bg-blue-700 py-2 px-3 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="ml-2 -mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
    </div>
</div>

<div class="mt-10 flex h-screen flex-col-reverse sm:flex-row">
    <div class="flex justify-center sm:w-1/3 md:w-1/3 lg:w-1/3">
        <div class="mt-16 ml-2 max-w-sm rounded-lg bg-white p-6 dark:bg-gray-800 sm:mt-52">
            <a href="#">
                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Visualize Your
                    Inventories
                </h5>
            </a>
            <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">Charts and graphs are helpful because
                managers can actually see the differences in activities and products.</p>
            <span
                class="inline-flex items-center rounded-lg bg-blue-700 py-2 px-3 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="ml-2 -mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
        </div>
    </div>
    <div class="h-screen items-center justify-center sm:flex sm:w-2/3 sm:p-0 md:w-2/3 lg:w-2/3">
        <img class="scale-100 sm:scale-110" src="{{ asset('/images/staticImages/animation2.gif') }}"
            alt="Quick Inventory">
    </div>
</div>




<div>
    <h3 id="about" class="mb-20 mt-10 text-center text-4xl font-bold"><span class="w-1/3 border-b-2">About Us</span>
    </h3>
</div>

<section class="body-font text-gray-600">
    <div class="container mx-auto px-5 py-24">
        <div class="flex flex-wrap justify-center space-y-3 text-center sm:space-y-0">
            <div class="mb-10 px-4 transition ease-in-out hover:scale-105 sm:w-1/2">
                <div class="h-96 overflow-hidden rounded-lg">
                    <img alt="content" class="mx-auto h-full rounded-md object-contain object-center"
                        src="{{ asset('/images/staticImages/dipesh.PNG') }}">
                </div>
                <h2 class="title-font mt-4 mb-1 text-2xl font-medium text-gray-900">Dipesh Gupta</h2>
                <p class="text-base leading-relaxed">MMC BCA-VI</p>
                <div class="mt-3 flex justify-center space-x-10">
                    <a href="#"
                        class="inline-flex items-center rounded-lg bg-blue-700 py-2 px-8 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                        friend</a>
                    <a href="#"
                        class="inline-flex items-center rounded-lg border border-gray-300 bg-white py-2 px-8 text-center text-base font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Message</a>
                </div>
            </div>
            <div class="mb-10 px-4 transition ease-in-out hover:scale-105 sm:w-1/2">
                <div class="h-96 overflow-hidden rounded-lg">
                    <img alt="content" class="mx-auto h-full rounded-md object-contain object-center"
                        src="{{ asset('/images/staticImages/avishek.PNG') }}">
                </div>
                <h2 class="title-font mt-4 mb-1 text-2xl font-medium text-gray-900">Avishek Khatiwada</h2>
                <p class="text-base leading-relaxed">MMC BCA-VI</p>
                <div class="mt-3 flex justify-center space-x-10">
                    <a href="#"
                        class="inline-flex items-center rounded-lg bg-blue-700 py-2 px-8 text-center text-base font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                        friend</a>
                    <a href="#"
                        class="inline-flex items-center rounded-lg border border-gray-300 bg-white py-2 px-8 text-center text-base font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Message</a>
                </div>
            </div>
        </div>
    </div>
</section>





<div>
    <h3 id="contact" class="my-10 text-center text-4xl font-bold"><span class="w-1/3 border-b-2">Contact Us</span>
    </h3>
</div>

<div class="flex flex-col sm:flex-row">
    <div class="flex justify-center sm:w-1/3 md:w-1/3 lg:w-1/3">
        <div class="mt-16 ml-2 max-w-sm rounded-lg bg-white p-6 dark:bg-gray-800 sm:mt-44">
            {{-- <a href="#">
                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Visualize Your
                    Inventories
                </h5>
            </a> --}}
            <p class="mb-3 text-2xl font-normal text-gray-700 dark:text-gray-400">Feel free to contact us anytime. We
                will respond to you as soon as possible</p>
            {{-- <a href="#"
                class="hidden sm:inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a> --}}
            {{-- <a href="#"
                class="sm:hidden inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Get Started
            </a> --}}
        </div>
    </div>
    <div class="items-center justify-center p-2 sm:-mt-20 sm:flex sm:h-screen sm:w-2/3 sm:p-0 md:w-2/3 lg:w-2/3">
        <form class="mx-auto w-11/12 sm:space-y-8">
            <div class="grid sm:-my-5 xl:grid-cols-2 xl:gap-6">
                <div class="group relative z-0 mb-6 w-full">
                    <input type="text" name="floating_first_name" id="floating_first_name"
                        class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                        placeholder=" " required="">
                    <label for="floating_first_name"
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 sm:text-lg">First
                        name</label>
                </div>
                <div class="group relative z-0 mb-6 w-full">
                    <input type="text" name="floating_last_name" id="floating_last_name"
                        class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                        placeholder=" " required="">
                    <label for="floating_last_name"
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 sm:text-lg">Last
                        name</label>
                </div>
            </div>
            <div class="group relative z-0 mb-6 w-full">
                <input type="email" name="floating_email"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                    placeholder=" " required="">
                <label for="floating_email"
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 sm:text-lg">Email</label>
            </div>
            <div class="group relative z-0 mb-6 w-full">
                <input type="text" name="floating_password" id="floating_password"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                    placeholder=" " required="">
                <label for="floating_password"
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 sm:text-lg">Address</label>
            </div>
            <div class="group relative z-0 mb-6 w-full">
                <input type="text" name="repeat_password" id="floating_repeat_password"
                    class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                    placeholder=" " required="">
                <label for="floating_repeat_password"
                    class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 sm:text-lg">Message</label>
            </div>
            <button type="submit"
                onclick="function refresh(){ location.reload(); setTimeout(()=>{alert('Message was sent')},2000) } refresh()"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Submit</button>
        </form>
    </div>
</div>
