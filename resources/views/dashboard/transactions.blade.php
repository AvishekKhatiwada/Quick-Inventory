@extends('dashboard.master')
@section('content')
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
                                    aria-current="page">Transactions</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">All transactions</h1>
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
                                    Product
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Date
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Quantity
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Costprice
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Sellingprice
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Remarks
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php $sn = 1;
                            ?>
                            @foreach ($records as $item)
                                <tr class="hover:bg-gray-100">
                                    <td class="whitespace-nowrap p-4 text-base font-normal text-gray-900">
                                        {{ $sn++ }}</td>
                                    <td
                                        class="flex flex-row space-x-3 whitespace-nowrap p-3 text-base font-normal text-gray-900">
                                        <div class="flex-shrink-0">
                                            <img class="w-10" src="{{ asset($item->image) }}" alt="">
                                        </div>
                                        <div class="flex items-center justify-center text-center">
                                            <p class="truncate text-lg font-normal capitalize text-gray-900">
                                                {{ $item->pname }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                        <div class="text-base font-normal capitalize text-gray-900">
                                            {{ substr($item->salesdate, 0, 4) . '/' . substr($item->salesdate, 4, 2) . '/' . substr($item->salesdate, 6, 2) }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                        <div class="text-base font-normal capitalize text-gray-900">
                                            {{ $item->quantity }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                        <div class="text-base font-normal capitalize text-gray-900">
                                            {{ $item->costprice }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                        <div class="text-base font-normal capitalize text-gray-900">
                                            {{ $item->sellingprice }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                        <div class="text-base font-normal capitalize text-gray-900">
                                            {{ $item->remarks }}.
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <span>{{ $records->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
