<nav class="fixed z-30 w-full border-b border-gray-200 bg-white">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                    class="mr-2 cursor-pointer rounded p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 lg:hidden">
                    <svg id="toggleSidebarMobileHamburger" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex space-x-2">
                    <img class="w-10" src="https://qil.co.uk/wp-content/uploads/2018/10/qi-favicon.png" alt=""
                        srcset="">
                    <span class="self-center whitespace-nowrap text-lg font-semibold dark:text-white"><span
                            class="text-xl text-blue-700">Q</span>uick <span
                            class="text-xl text-blue-700">i</span>nventory</span>
                </a>
                <form action="#" method="GET" class="hidden lg:pl-32">
                    <label for="topbar-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" name="email" id="topbar-search"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-gray-900 focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                            placeholder="Search">
                    </div>
                </form>
            </div>
            <div class="hidden items-center">
                <button id="toggleSidebarMobileSearch" type="button"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 lg:hidden">
                    <span class="sr-only">Search</span>
                    <!-- Search icon -->
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <a href="{{ route('alerts') }}">
                    <button type="button"
                        class="mr-3 flex justify-center rounded-full text-sm outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 md:mr-0"
                        id="alerts-button">
                        @if (Request::get('alertCount') == 0)
                            <img alt="content" class="h-8 w-6 rounded-md object-contain object-center"
                                src="{{ asset('/images/staticImages/Bell.png') }}">
                        @else
                            <img alt="content" class="h-8 w-7 animate-pulse rounded-md object-contain object-center"
                                src="{{ asset('/images/staticImages/Bell_ringing.png') }}">
                        @endif

                    </button>
                </a>

                <button type="button"
                    class="mr-3 flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 md:mr-0"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="{{ asset(session()->get('User')->uimage) }}"
                        alt="user photo">
                </button>
            </div>
            <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                id="dropdown">
                <div class="py-3 px-4">
                    <span
                        class="block text-sm text-gray-900 dark:text-white">{{ session()->get('User')->uname }}</span>
                    <span
                        class="block truncate text-sm font-medium text-gray-500 dark:text-gray-400">{{ session()->get('User')->uemail }}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                    <li>
                        <a href="{{ route('settings') }}"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    {{-- <li>
                        <a href="#"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                    </li> --}}
                    <li>
                        <a href="/home/logout"
                            class="block py-2 px-4 text-sm text-red-500 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
