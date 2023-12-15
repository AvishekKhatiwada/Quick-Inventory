@extends('dashboard.master')
@section('content')
    <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }

    </style>
    @if (Session::has('Successfull'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-green-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-green-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-green-700">
                {{ Session::get('Successfull') }}</div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif
    @if (Session::has('Failed'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-red-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-red-700">
                {{ Session::get('Failed') }}</div>
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
                                    aria-current="page">Stocks</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">All stocks</h1>
            </div>
            <div class="block items-center sm:flex md:divide-x md:divide-gray-100">
                <form class="mb-4 sm:mb-0 sm:pr-3" autocomplete="off">
                    @csrf
                    <label for="stocks_search" class="sr-only">Search</label>
                    <div class="relative mt-1 sm:w-64 xl:w-96">
                        <input type="text" name="email" id="stocks_search"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                            placeholder="Search for stocks">
                    </div>
                </form>
                <div class="flex w-full items-center sm:justify-end">
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full table-fixed divide-y divide-gray-200" id="stockTable">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Sn
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
                                    Stock <span><img src="{{ asset('images/staticImages/sorting.ico') }}"
                                            class="float-right transition ease-in-out hover:scale-125 hover:cursor-pointer"
                                            width="15"></span>
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Stock Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <?php $sn = 1; ?>
                            @if ($items->count() == 0)
                                <tr>
                                    <td colspan="5" class="border-b border-gray-200 py-5 text-center text-2xl"> No Data</td>
                                </tr>
                            @else
                                @foreach ($items as $item)
                                    <tr class="hover:bg-gray-100">
                                        <td class="whitespace-nowrap p-4 text-base font-medium text-gray-900">
                                            {{ $sn++ }}</td>
                                        <td class="whitespace-nowrap p-4 text-base font-medium text-gray-900">
                                            <img src="{{ asset($item->image) }}" class="w-14 hover:animate-pulse" alt=""
                                                data-modal-toggle="imgModal">
                                        </td>
                                        <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                            <div class="text-base font-semibold capitalize text-gray-900">
                                                {{ $item->pname }}
                                                <span class="text-sm font-medium">
                                                    @if (!($item->pbrand == '' || $item->pbrand == null))
                                                        ({{ $item->pbrand }})
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="flex text-sm font-normal capitalize text-gray-500">
                                                {{ $item->pcategory }}
                                                <span>
                                                    <svg class="h-6 w-4 text-gray-400" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                                {{ $item->ptag }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-4 text-base font-medium capitalize text-gray-900">
                                            @if ($stocks)
                                                @if ($stocks[$item->id])
                                                    @foreach ($stocks[$item->id] as $availableStock)
                                                        @if ($availableStock->quantity <= $availableStock->warningquantity)
                                                            <span
                                                                class="text-base font-normal">{{ $availableStock->lot }}
                                                            </span> <span
                                                                class="text-xs font-normal text-red-500">({{ $availableStock->quantity . ' ' . $item->soldper }}
                                                                @
                                                                {{ $availableStock->costprice . '  रु' }} )</span>
                                                            <br>
                                                        @else
                                                            <span
                                                                class="text-base font-normal">{{ $availableStock->lot }}
                                                            </span> <span
                                                                class="text-xs font-normal">({{ $availableStock->quantity . ' ' . $item->soldper }}
                                                                @
                                                                {{ $availableStock->costprice . '  रु' }} )</span>
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        </td>
                                        <td class="space-x-2 whitespace-nowrap p-4">
                                            <button type="button" data-modal-toggle="add-stock-modal"
                                                onclick="onAddStockClick('{{ $item->id }}','{{ $item->soldper }}')"
                                                class="inline-flex items-center rounded-lg bg-cyan-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-300">
                                                <svg class="mx-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9.941,4.515h1.671v1.671c0,0.231,0.187,0.417,0.417,0.417s0.418-0.187,0.418-0.417V4.515h1.672c0.229,0,0.417-0.187,0.417-0.418c0-0.23-0.188-0.417-0.417-0.417h-1.672V2.009c0-0.23-0.188-0.418-0.418-0.418s-0.417,0.188-0.417,0.418V3.68H9.941c-0.231,0-0.418,0.187-0.418,0.417C9.522,4.329,9.71,4.515,9.941,4.515 M17.445,15.479h0.003l1.672-7.52l-0.009-0.002c0.009-0.032,0.021-0.064,0.021-0.099c0-0.231-0.188-0.417-0.418-0.417H5.319L4.727,5.231L4.721,5.232C4.669,5.061,4.516,4.933,4.327,4.933H1.167c-0.23,0-0.418,0.188-0.418,0.417c0,0.231,0.188,0.418,0.418,0.418h2.839l2.609,9.729h0c0.036,0.118,0.122,0.214,0.233,0.263c-0.156,0.254-0.25,0.551-0.25,0.871c0,0.923,0.748,1.671,1.67,1.671c0.923,0,1.672-0.748,1.672-1.671c0-0.307-0.088-0.589-0.231-0.836h4.641c-0.144,0.247-0.231,0.529-0.231,0.836c0,0.923,0.747,1.671,1.671,1.671c0.922,0,1.671-0.748,1.671-1.671c0-0.32-0.095-0.617-0.252-0.871C17.327,15.709,17.414,15.604,17.445,15.479 M15.745,8.275h2.448l-0.371,1.672h-2.262L15.745,8.275z M5.543,8.275h2.77L8.5,9.947H5.992L5.543,8.275z M6.664,12.453l-0.448-1.671h2.375l0.187,1.671H6.664z M6.888,13.289h1.982l0.186,1.671h-1.72L6.888,13.289zM8.269,17.466c-0.461,0-0.835-0.374-0.835-0.835s0.374-0.836,0.835-0.836c0.462,0,0.836,0.375,0.836,0.836S8.731,17.466,8.269,17.466 M11.612,14.96H9.896l-0.186-1.671h1.901V14.96z M11.612,12.453H9.619l-0.186-1.671h2.18V12.453zM11.612,9.947H9.34L9.154,8.275h2.458V9.947z M14.162,14.96h-1.715v-1.671h1.9L14.162,14.96z M14.441,12.453h-1.994v-1.671h2.18L14.441,12.453z M14.72,9.947h-2.272V8.275h2.458L14.72,9.947z M15.79,17.466c-0.462,0-0.836-0.374-0.836-0.835s0.374-0.836,0.836-0.836c0.461,0,0.835,0.375,0.835,0.836S16.251,17.466,15.79,17.466 M16.708,14.96h-1.705l0.186-1.671h1.891L16.708,14.96z M15.281,12.453l0.187-1.671h2.169l-0.372,1.671H15.281z">
                                                    </path>

                                                </svg><span>Add</span>
                                            </button>
                                            <button type="button" data-modal-toggle="edit-stock-modal"
                                                onclick="onEditStockClick('{{ $stocks[$item->id] }}')"
                                                class="inline-flex items-center rounded-lg bg-purple-500 px-3 py-2 text-center text-sm font-medium text-white hover:bg-purple-600 focus:ring-4 focus:ring-cyan-200">
                                                <svg class="mx-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg><span>Edit</span>
                                            </button>
                                            <button type="button" data-modal-toggle="stock-sold-modal"
                                                onclick="onSoldStockClick('{{ $stocks[$item->id] }}')"
                                                class="inline-flex items-center rounded-lg bg-green-500 px-3 py-2 text-center text-sm font-medium text-white hover:bg-green-600 focus:ring-4 focus:ring-green-200">
                                                <svg class="mx-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4.319,8.257c-0.242,0-0.438,0.196-0.438,0.438c0,0.243,0.196,0.438,0.438,0.438c0.242,0,0.438-0.196,0.438-0.438C4.757,8.454,4.561,8.257,4.319,8.257 M7.599,10.396c0,0.08,0.017,0.148,0.05,0.204c0.034,0.056,0.076,0.104,0.129,0.144c0.051,0.04,0.112,0.072,0.182,0.097c0.041,0.015,0.068,0.028,0.098,0.04V9.918C7.925,9.927,7.832,9.958,7.747,10.02C7.648,10.095,7.599,10.22,7.599,10.396 M15.274,6.505H1.252c-0.484,0-0.876,0.392-0.876,0.876v7.887c0,0.484,0.392,0.876,0.876,0.876h14.022c0.483,0,0.876-0.392,0.876-0.876V7.381C16.15,6.897,15.758,6.505,15.274,6.505M1.69,7.381c0.242,0,0.438,0.196,0.438,0.438S1.932,8.257,1.69,8.257c-0.242,0-0.438-0.196-0.438-0.438S1.448,7.381,1.69,7.381M1.69,15.269c-0.242,0-0.438-0.196-0.438-0.438s0.196-0.438,0.438-0.438c0.242,0,0.438,0.195,0.438,0.438S1.932,15.269,1.69,15.269M14.836,15.269c-0.242,0-0.438-0.196-0.438-0.438s0.196-0.438,0.438-0.438s0.438,0.195,0.438,0.438S15.078,15.269,14.836,15.269M15.274,13.596c-0.138-0.049-0.283-0.08-0.438-0.08c-0.726,0-1.314,0.589-1.314,1.314c0,0.155,0.031,0.301,0.08,0.438H2.924c0.049-0.138,0.081-0.283,0.081-0.438c0-0.726-0.589-1.314-1.315-1.314c-0.155,0-0.3,0.031-0.438,0.08V9.053C1.39,9.103,1.535,9.134,1.69,9.134c0.726,0,1.315-0.588,1.315-1.314c0-0.155-0.032-0.301-0.081-0.438h10.678c-0.049,0.137-0.08,0.283-0.08,0.438c0,0.726,0.589,1.314,1.314,1.314c0.155,0,0.301-0.031,0.438-0.081V13.596z M14.836,8.257c-0.242,0-0.438-0.196-0.438-0.438s0.196-0.438,0.438-0.438s0.438,0.196,0.438,0.438S15.078,8.257,14.836,8.257 M12.207,13.516c-0.242,0-0.438,0.196-0.438,0.438s0.196,0.438,0.438,0.438s0.438-0.196,0.438-0.438S12.449,13.516,12.207,13.516 M8.812,11.746c-0.059-0.043-0.126-0.078-0.199-0.104c-0.047-0.017-0.081-0.031-0.117-0.047v1.12c0.137-0.021,0.237-0.064,0.336-0.143c0.116-0.09,0.174-0.235,0.174-0.435c0-0.092-0.018-0.17-0.053-0.233C8.918,11.842,8.87,11.788,8.812,11.746 M18.78,3.875H4.757c-0.484,0-0.876,0.392-0.876,0.876V5.19c0,0.242,0.196,0.438,0.438,0.438c0.242,0,0.438-0.196,0.438-0.438V4.752H18.78v7.888h-1.315c-0.242,0-0.438,0.196-0.438,0.438c0,0.243,0.195,0.438,0.438,0.438h1.315c0.483,0,0.876-0.393,0.876-0.876V4.752C19.656,4.268,19.264,3.875,18.78,3.875 M8.263,8.257c-1.694,0-3.067,1.374-3.067,3.067c0,1.695,1.373,3.068,3.067,3.068c1.695,0,3.067-1.373,3.067-3.068C11.33,9.631,9.958,8.257,8.263,8.257 M9.488,12.543c-0.062,0.137-0.147,0.251-0.255,0.342c-0.108,0.092-0.234,0.161-0.378,0.209c-0.123,0.041-0.229,0.063-0.359,0.075v0.347H8.058v-0.347c-0.143-0.009-0.258-0.032-0.388-0.078c-0.152-0.053-0.281-0.128-0.388-0.226c-0.108-0.098-0.191-0.217-0.25-0.359c-0.059-0.143-0.087-0.307-0.083-0.492h0.575c-0.004,0.219,0.046,0.391,0.146,0.518c0.088,0.109,0.207,0.165,0.388,0.185v-1.211c-0.102-0.031-0.189-0.067-0.3-0.109c-0.136-0.051-0.259-0.116-0.368-0.198c-0.109-0.082-0.198-0.183-0.265-0.306c-0.067-0.123-0.101-0.275-0.101-0.457c0-0.159,0.031-0.298,0.093-0.419c0.062-0.121,0.146-0.222,0.252-0.303S7.597,9.57,7.735,9.527C7.85,9.491,7.944,9.474,8.058,9.468V9.134h0.438v0.333c0.114,0.005,0.207,0.021,0.319,0.054c0.134,0.04,0.251,0.099,0.351,0.179c0.099,0.079,0.178,0.18,0.237,0.303c0.059,0.122,0.088,0.265,0.088,0.427H8.916c-0.007-0.169-0.051-0.297-0.134-0.387C8.712,9.968,8.626,9.932,8.496,9.919v1.059c0.116,0.035,0.213,0.074,0.333,0.118c0.145,0.053,0.272,0.121,0.383,0.203c0.111,0.083,0.2,0.186,0.268,0.308c0.067,0.123,0.101,0.273,0.101,0.453C9.581,12.244,9.549,12.406,9.488,12.543">
                                                    </path>

                                                </svg><span>Sold</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div>
                        <span>{{ $items->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ View::make('dashboard.shared.stockAddModal') }}
    {{ View::make('dashboard.shared.stockEditModal') }}
    {{ View::make('dashboard.shared.stockSoldModal') }}

    <script>
        function onAddStockClick(id, soldper) {
            $("#productId").val(id);
            $("#stockSoldPerId").text(soldper);
            $("#stockSoldPerId1").text(soldper);
        }

        function onEditStockClick(stocks) {
            let result = JSON.parse(stocks);
            if (result.length == 1) {
                result.forEach((element) => {
                    $('#l1stockId').val(element.id);
                    $('#l1lot').val(element.lot);
                    $('#l1quantity').val(element.quantity);
                    $('#l1costprice').val(element.costprice);
                    $('#l1warningquantity').val(element.warningquantity);
                    $('#lot2check').hide();
                    $('#lot1delete').hide();
                    // console.log(element.lot)
                })
            } else {
                $('#lot2check').show();
                $('#lot1delete').show();

                let obj1 = result[0];
                $('#l1stockId').val(obj1.id);
                $('#l1lot').val(obj1.lot);
                $('#l1quantity').val(obj1.quantity);
                $('#l1costprice').val(obj1.costprice);
                $('#l1warningquantity').val(obj1.warningquantity);
                $('#l1stockIdToDelete').val(obj1.id);

                let obj2 = result[1];
                $('#l2stockId').val(obj2.id);
                $('#l2lot').val(obj2.lot);
                $('#l2quantity').val(obj2.quantity);
                $('#l2costprice').val(obj2.costprice);
                $('#l2warningquantity').val(obj2.warningquantity);
                $('#l2stockIdToDelete').val(obj2.id);
            }
        }



        function onSoldStockClick(totalLots) {
            let availableLots = JSON.parse(totalLots);
            let sliderQuantityValue = 1;
            if (availableLots.length == 1) {
                $('#resetStockSellForm').click();
                cleanUpSalesForm();
                availableLots.forEach((element) => {
                    $('#stockId').val(element.id);
                    $('#salesOption1').text(element.lot);
                    $('#salesOption2').hide();

                    $('#stockRangeInput').attr('max', element.quantity);
                    $('#stockNumberInput').attr('max', element.quantity - 1);
                    $('#stockNumberInput').attr('min', 1);
                    $('#maxStockQuantity').text(element.quantity);
                    $('#totalCostAmount').val(element.costprice);

                    $('#stockNumberInput').on('keydown keyup change', (e) => {
                        if ($('#stockNumberInput').val() == 0) {
                            $('#confirmSales').addClass("bg-red-500");
                            $('#confirmSales').attr("disabled", "disabled");
                        } else {
                            $('#confirmSales').removeClass("bg-red-500");
                            $("#confirmSales").removeAttr("disabled", "disabled");
                            $('#confirmSales').addClass("bg-cyan-600");
                        }
                        if ($('#stockNumberInput').val() > element.quantity - 1 && e.keyCode !== 46 && e
                            .keyCode !== 8) {
                            e.preventDefault();
                        } else {
                            document.getElementById("stockRangeInput").value = Number.parseInt($(
                                '#stockNumberInput').val());
                            sliderQuantityValue = Number.parseInt($(
                                '#stockNumberInput').val());
                            // $('#stockNumberInput').val($('#stockRangeInput').val());
                            $('#totalCostAmount').val(calculateTotalCostPrice(sliderQuantityValue, element
                                .costprice));
                            $('#totalSalesAmount').val($('#totalCostAmount').val())
                            $('#remainingQuantity').val(calculateRemainingQuantity(element.quantity,
                                sliderQuantityValue, element.warningquantity));
                            $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                                '#totalSalesAmount').val()));
                        }
                    });


                    $('#stockRangeInput').change(() => {
                        sliderQuantityValue = Number.parseInt($('#stockRangeInput').val());
                        $('#stockNumberInput').val($('#stockRangeInput').val());
                        $('#totalCostAmount').val(calculateTotalCostPrice(sliderQuantityValue, element
                            .costprice));
                        $('#totalSalesAmount').val($('#totalCostAmount').val())
                        $('#remainingQuantity').val(calculateRemainingQuantity(element.quantity,
                            sliderQuantityValue, element.warningquantity));
                        $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                            '#totalSalesAmount').val()));
                    });

                    $('#totalSalesAmount').keyup(() => {
                        $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                            '#totalSalesAmount').val()));
                    });

                })
            } else {
                cleanUpSalesForm();
                $('#resetStockSellForm').click();
                $('#salesOption2').show();
                let obj1 = availableLots[0];
                let obj2 = availableLots[1];
                $('#salesOption1').text(obj1.lot);
                $('#salesOption2').text(obj2.lot);

                $('#sellingLots').val(obj1.lot);
                calculateResultForMultipleResult(obj1, obj2);
                $('#sellingLots').change(() => {
                    cleanUpSalesForm();
                    calculateResultForMultipleResult(obj1, obj2);
                })
            }
        }

        function calculateResultForMultipleResult(obj1, obj2) {
            if ($('#sellingLots').val() == obj1.lot) {
                cleanUpSalesForm();
                $('#stockId').val(obj1.id);
                $('#stockRangeInput').attr('max', obj1.quantity);
                $('#stockNumberInput').attr('max', obj1.quantity - 1);
                $('#maxStockQuantity').text(obj1.quantity);
                $('#totalCostAmount').val(obj1.costprice);


                $('#stockNumberInput').on('keydown keyup change', (e) => {
                    if ($('#stockNumberInput').val() == 0) {
                        $('#confirmSales').addClass("bg-red-500");
                        $('#confirmSales').attr("disabled", "disabled");
                    } else {
                        $('#confirmSales').removeClass("bg-red-500");
                        $("#confirmSales").removeAttr("disabled", "disabled");
                        $('#confirmSales').addClass("bg-cyan-600");
                    }
                    if ($('#stockNumberInput').val() > obj1.quantity - 1 && e.keyCode !== 46 && e
                        .keyCode !== 8) {
                        e.preventDefault();
                    } else {
                        document.getElementById("stockRangeInput").value = Number.parseInt($(
                            '#stockNumberInput').val());
                        sliderQuantityValue = Number.parseInt($(
                            '#stockNumberInput').val());
                        // $('#stockNumberInput').val($('#stockRangeInput').val());
                        $('#totalCostAmount').val(calculateTotalCostPrice(sliderQuantityValue, obj1
                            .costprice));
                        $('#totalSalesAmount').val($('#totalCostAmount').val())
                        $('#remainingQuantity').val(calculateRemainingQuantity(obj1.quantity,
                            sliderQuantityValue, obj1.warningquantity));
                        $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                            '#totalSalesAmount').val()));
                    }
                });

                $('#stockRangeInput').change(() => {
                    sliderQuantityValue = Number.parseInt($('#stockRangeInput').val());
                    $('#stockNumberInput').val($('#stockRangeInput').val());
                    $('#totalCostAmount').val(calculateTotalCostPrice(sliderQuantityValue, obj1
                        .costprice));
                    $('#totalSalesAmount').val($('#totalCostAmount').val())
                    $('#remainingQuantity').val(calculateRemainingQuantity(obj1.quantity,
                        sliderQuantityValue, obj1.warningquantity));
                    $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                        '#totalSalesAmount').val()));
                });

                $('#totalSalesAmount').keyup(() => {
                    $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                        '#totalSalesAmount').val()));
                });

            } else {
                cleanUpSalesForm();
                $('#stockId').val(obj2.id);
                $('#stockRangeInput').attr('max', obj2.quantity);
                $('#stockNumberInput').attr('max', obj2.quantity - 1);
                $('#maxStockQuantity').text(obj2.quantity);
                $('#totalCostAmount').val(obj2.costprice);

                $('#stockNumberInput').on('keydown keyup change', (e) => {
                    if ($('#stockNumberInput').val() == 0) {
                        $('#confirmSales').addClass("bg-red-500");
                        $('#confirmSales').attr("disabled", "disabled");
                    } else {
                        $('#confirmSales').removeClass("bg-red-500");
                        $("#confirmSales").removeAttr("disabled", "disabled");
                        $('#confirmSales').addClass("bg-cyan-600");
                    }
                    if ($('#stockNumberInput').val() > obj2.quantity - 1 && e.keyCode !== 46 && e
                        .keyCode !== 8) {
                        e.preventDefault();
                    } else {
                        document.getElementById("stockRangeInput").value = Number.parseInt($(
                            '#stockNumberInput').val());
                        sliderQuantityValue = Number.parseInt($(
                            '#stockNumberInput').val());
                        // $('#stockNumberInput').val($('#stockRangeInput').val());
                        $('#totalCostAmount').val(calculateTotalCostPrice(sliderQuantityValue, obj2
                            .costprice));
                        $('#totalSalesAmount').val($('#totalCostAmount').val())
                        $('#remainingQuantity').val(calculateRemainingQuantity(obj2.quantity,
                            sliderQuantityValue, obj2.warningquantity));
                        $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                            '#totalSalesAmount').val()));
                    }
                });

                $('#stockRangeInput').change(() => {
                    sliderQuantityValue = Number.parseInt($('#stockRangeInput').val());
                    $('#stockNumberInput').val($('#stockRangeInput').val());
                    $('#totalCostAmount').val(calculateTotalCostPrice(sliderQuantityValue, obj2
                        .costprice));
                    $('#totalSalesAmount').val($('#totalCostAmount').val())
                    $('#remainingQuantity').val(calculateRemainingQuantity(obj2.quantity,
                        sliderQuantityValue, obj2.warningquantity));
                    $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                        '#totalSalesAmount').val()));
                });

                $('#totalSalesAmount').keyup(() => {
                    $("#profitloss").val(calculateProfitOrLoss($('#totalCostAmount').val(), $(
                        '#totalSalesAmount').val()));
                });
            }
        }



        function calculateTotalCostPrice(qty, cp) {
            return qty * cp;
        }

        function calculateRemainingQuantity(total, sold, min) {
            let remainingqty = total - sold;
            if (remainingqty > 0) {
                $("#lowQuantity").addClass("hidden");
                $('#remainingQuantity').removeClass("text-red-500");
                $('#lowStock').val("no");
                $('#confirmSales').addClass("bg-cyan-600");
                $('#confirmSales').removeClass("bg-red-500");
                $("#confirmSales").removeAttr("disabled", "disabled");

                if (remainingqty <= min) {
                    $("#lowQuantity").removeClass("hidden");
                    $('#remainingQuantity').addClass("text-red-500");
                    $('#lowStock').val("yes");
                } else {
                    $("#lowQuantity").addClass("hidden");
                    $('#remainingQuantity').removeClass("text-red-500");
                    $('#lowStock').val("no");
                }
            } else {
                $("#lowQuantity").removeClass("hidden");
                $('#remainingQuantity').addClass("text-red-500");
                $('#lowStock').val("yes");
                $('#confirmSales').removeClass("bg-cyan-600");
                $('#confirmSales').addClass("bg-red-500");
                $('#confirmSales').attr("disabled", "disabled");
            }
            return remainingqty;
        }

        function calculateProfitOrLoss(cp, sp) {

            let pl = (sp - cp);
            if (pl < 0) {
                $("#profitTag").removeClass("text-green-500");
                $("#lossTag").addClass("text-red-500");
                $("#profitloss").addClass("text-red-500");
                $("#profitloss").addClass("border border-red-500");
                $("#profitloss").removeClass("text-green-500");
                $("#profitloss").removeClass("border border-green-500");
            } else if (pl > 0) {
                $("#profitTag").addClass("text-green-500");
                $("#lossTag").removeClass("text-red-500");
                $("#profitloss").removeClass("text-red-500");
                $("#profitloss").removeClass("border border-red-500");
                $("#profitloss").addClass("text-green-500");
                $("#profitloss").addClass("border border-green-500");
            } else {
                $("#profitTag").removeClass("text-green-500");
                $("#lossTag").removeClass("text-red-500");
                $("#profitloss").removeClass("text-red-500");
                $("#profitloss").removeClass("text-green-500");
                $("#profitloss").removeClass("border border-red-500");
                $("#profitloss").removeClass("border border-green-500");
            }
            return pl;
        }

        function cleanUpSalesForm() {
            $('#remainingQuantity').removeClass("text-red-500");
            $("#lowQuantity").addClass("hidden");
            $("#profitTag").removeClass("text-green-500");
            $("#lossTag").removeClass("text-red-500");
            $("#profitloss").removeClass("text-red-500");
            $("#profitloss").removeClass("text-green-500");
            $("#profitloss").removeClass("border border-red-500");
            $("#profitloss").removeClass("border border-green-500");
        }

        $(document).ready(function() {
            var table = $('#stockTable').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
            });

            $('#stocks_search').on('keyup', function() {
                table.search(this.value).draw();
            });

        });
    </script>
@endsection
