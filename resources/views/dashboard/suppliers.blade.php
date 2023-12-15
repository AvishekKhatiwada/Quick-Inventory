@extends('dashboard.master')
@section('content')
    <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

    </style>

    @if (Session::has('supplierSuccessFlashSession'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-green-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-green-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-green-700">
                {{ Session::get('supplierSuccessFlashSession') }}</div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif
    @if (Session::has('supplierUnsuccessFlashSession'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-red-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-red-700">
                {{ Session::get('supplierUnsuccessFlashSession') }}</div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif

    <div class="block items-center justify-between border-b border-gray-200 bg-white p-4 sm:flex lg:mt-1.5">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="mb-5 flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-gray-700 hover:text-gray-900">
                                <svg class="mr-2.5 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Home
                            </a>
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
                                    aria-current="page">Suppliers</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">All Suppliers</h1>
            </div>
            <div class="sm:flex">
                <div class="mb-3 hidden items-center sm:mb-0 sm:flex sm:divide-x sm:divide-gray-100">
                    <form class="lg:pr-3" action="#" method="GET">
                        <label for="supplier_search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-64 xl:w-96">
                            <input type="text" name="email" id="supplier_search"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                placeholder="Search for suppliers">
                        </div>
                    </form>
                    {{-- <div class="mt-3 flex space-x-1 pl-0 sm:mt-0 sm:pl-2">
                        <a href="#"
                            class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </a>
                    </div> --}}
                </div>
                <div class="ml-auto flex items-center space-x-2 sm:space-x-3">
                    <button type="button" data-modal-toggle="add-user-modal"
                        class="inline-flex w-1/2 items-center justify-center rounded-lg bg-cyan-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 sm:w-auto">
                        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add New
                    </button>
                    {{-- <a href="#"
                        class="inline-flex w-1/2 items-center justify-center rounded-lg border border-gray-300 bg-white px-3 py-2 text-center text-sm font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 sm:w-auto">
                        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Export
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full table-fixed divide-y divide-gray-200" id="suppliertable">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Sn.
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Image
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Name <span><img src="{{ asset('images/staticImages/sorting.ico') }}"
                                            class="float-right transition ease-in-out hover:scale-125 hover:cursor-pointer"
                                            width="15"></span>
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Contact <span><img src="{{ asset('images/staticImages/sorting.ico') }}"
                                            class="float-right transition ease-in-out hover:scale-125 hover:cursor-pointer"
                                            width="15"></span>
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Suppliers Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php $sn = 1; ?>
                            @foreach ($items as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="w-4 p-4">
                                        {{ $sn++ }}
                                    </td>
                                    <td class="mr-12 flex items-center space-x-6 whitespace-nowrap p-4 lg:mr-0">
                                        <img class="h-10 w-10 rounded-full" src="{{ asset($item->simage) }}"
                                            alt=" avatar">
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-base font-medium text-gray-900">
                                        <div class="text-sm font-normal text-gray-500">
                                            <div class="text-base font-semibold capitalize text-gray-900">
                                                {{ $item->sname }}</div>
                                            <div class="text-sm font-normal capitalize text-gray-500">
                                                {{ $item->saddress }}</div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-base font-medium text-gray-900">
                                        <div class="text-sm font-normal text-gray-500">
                                            <div class="text-base font-semibold capitalize text-gray-900">
                                                {{ $item->sphone }}</div>
                                            <div class="text-sm font-normal text-gray-500">
                                                {{ $item->semail }}</div>
                                        </div>
                                    </td>
                                    <td class="space-x-2 whitespace-nowrap p-4">
                                        <a href="/home/supplier/editSuppliers/{{ $item->id }}">
                                            <button type="button"
                                                class="inline-flex items-center rounded-lg bg-cyan-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg> Edit
                                            </button></a>
                                        <button type="button" data-modal-toggle="delete-supplier-modal"
                                            onclick="showSupplierDeleteModal('{{ $item->id }}')"
                                            class="inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <span>{{ $items->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div
        class="sticky bottom-0 right-0 w-full items-center border-t border-gray-200 bg-white p-4 sm:flex sm:justify-between">
        <div class="mb-4 flex items-center sm:mb-0">
            <a href="#"
                class="inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#"
                class="mr-2 inline-flex cursor-pointer justify-center rounded p-1 text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <span class="text-sm font-normal text-gray-500">Showing <span class="font-semibold text-gray-900">1-20</span> of
                <span class="font-semibold text-gray-900">2290</span></span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="#"
                class="inline-flex flex-1 items-center justify-center rounded-lg bg-cyan-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200">
                <svg class="-ml-1 mr-1 h-5 w-5" fill=" currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Previous
            </a>
            <a href="#"
                class="inline-flex flex-1 items-center justify-center rounded-lg bg-cyan-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200">
                Next
                <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div> --}}
    <!-- Add Supplier Modal -->
    <div class="h-modal fixed top-4 left-0 right-0 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0"
        id="add-user-modal">
        <div class="relative h-full w-full max-w-2xl px-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between rounded-t border-b p-5">
                    <h3 class="text-xl font-semibold">
                        Add new Supplier
                    </h3>
                    <button type="button"
                        class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                        data-modal-toggle="add-user-modal">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-6 p-6">
                    <form action="/addSuppliersToDatabase" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="mb-1 block text-sm font-medium text-gray-900">Full
                                    Name</label>
                                <input type="text" name="name" id="name"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                    placeholder="Bonnie" value="{{ old('name') }}" required>
                                <span class="p-0.5 text-red-800">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="mb-1 block text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                    placeholder="example@company.com" value="{{ old('email') }}" required>
                                <span class="p-0.5 text-red-800">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="phonenumber" class="mb-1 block text-sm font-medium text-gray-900">Phone
                                    Number</label>
                                <input type="number" name="phonenumber" id="phone-number"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                    placeholder="e.g. +(12)3456 789" value="{{ old('phonenumber') }}" required>
                                <span class="p-0.5 text-red-800">
                                    @error('phonenumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="address" class="mb-1 block text-sm font-medium text-gray-900">Address</label>
                                <input type="text" name="address" id="address"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                    placeholder="Dhulabari-9" value="{{ old('address') }}" required>
                                <span class="p-0.5 text-red-800">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="user_avatar">Upload/Drop
                                    Image<span class="text-red-500">*</span></label>
                                <input
                                    class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-transparent focus:outline-none"
                                    aria-describedby="user_avatar_help" id="user_avatar" type="file" name="image" id="image"
                                    accept="image/png,image/jpeg,image/jpg">
                            </div>
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="items-center rounded-b border-t border-gray-200 p-6">
                    <button
                        class="rounded-lg bg-cyan-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200"
                        type="submit">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{ View::make('dashboard.shared.supplierDeleteModal') }}
    <script>
        function showSupplierDeleteModal(id) {
            document.getElementById("supplierDeleteId").value = id;
        }

        $(document).ready(function() {
            var table = $('#suppliertable').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
            });

            $('#supplier_search').on('keyup', function() {
                table.search(this.value).draw();
            });

        });
    </script>
@endsection
