@extends('dashboard.master')
@section('content')
    @if (Session::has('Ordered'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-green-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-green-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-green-700">
                {{ Session::get('Ordered') }}</div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif
    <div class="justify-betwee block items-center bg-white p-4 sm:flex lg:mt-1.5">
        <div class="mb-1 w-full">
            <div class="mb-4">
                <nav class="mb-5 flex" aria-label="Breadcrumb">
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
                                    aria-current="page">Alerts</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">All alerts</h1>
            </div>
        </div>
    </div>

    <div class="flex flex-col border border-b-gray-50">
        <div class="bg-white">
            <div class="inline-block min-w-full bg-white align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full table-fixed divide-y divide-gray-200 bg-white">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Sn
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Name
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Date
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Remarks
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php $sn = 1;
                            ?>
                            @if (0)
                                <tr>
                                    <td colspan="5" class="border-b border-gray-200 py-5 text-center text-2xl"> No Data</td>
                                </tr>
                            @else
                                @foreach ($result as $item)
                                    <tr class="hover:bg-gray-100">
                                        <td class="whitespace-nowrap p-4 text-base font-normal text-gray-900">
                                            {{ $sn++ }}</td>
                                        <td
                                            class="flex flex-row space-x-3 whitespace-nowrap p-3 text-base font-normal text-gray-900">
                                            <div class="flex-shrink-0">
                                                <img class="h-9 w-9" src="{{ asset($item->image) }}" alt="">
                                            </div>
                                            <div class="flex items-center justify-center text-center">
                                                <p class="truncate text-lg font-normal text-gray-900">
                                                    {{ $item->pname }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                            <div class="text-base font-normal capitalize text-gray-900">
                                                {{ date('Y/m/d') }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                            <div class="text-base font-normal text-gray-900">
                                                Only <span class="font-semibold text-red-500">{{ $item->quantity }}</span>
                                                {{ $item->soldper }} remaining of lot "<span
                                                    class="font-semibold capitalize">{{ $item->lot }}</span>".
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                            <div class="text-base font-normal capitalize text-gray-900">
                                                <button
                                                    class="rounded-lg border border-blue-200 bg-white py-2 px-4 text-sm font-medium text-blue-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200"
                                                    type="button" data-modal-toggle="authentication-modal">Order
                                                    Now</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="h-modal fixed top-0 right-0 left-0 z-50 hidden w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-md p-4 md:h-auto">

            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="authentication-modal">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <form action="{{ route('order') }}">
                    <div class="py-6 px-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Order Now</h3>
                        <div class="mb-3">
                            <label for="countries"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Select
                                Supplier</label>
                            <select id="countries"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                @foreach ($suppliers as $supplier)
                                    <option>{{ $supplier->sname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="message" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">
                                Your message</label>
                            <textarea id="message" rows="4" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Product quantity, rate etc" required></textarea>
                        </div>
                        <button type="submit"
                            class="mt-3 w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
