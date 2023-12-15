@extends('dashboard.master')
@section('content')
    <div class="px-4 pt-6">
        <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div class="group rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8 2xl:col-span-2">
                <div class="mb-4 flex items-center justify-between">
                    <div class="flex-shrink-0">
                        {{-- <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span> --}}
                        <h3
                            class="text-xl font-normal text-gray-500 transition ease-in-out group-hover:scale-105 group-hover:text-cyan-600 sm:text-2xl">
                            Sales in last 7
                            days</h3>
                    </div>
                    {{-- <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        12.5%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div> --}}
                </div>
                <div id="main-chart" style="min-height: 435px;">
                    {{-- Chart here --}}
                    {{ $chart->container() }}

                </div>
            </div>
            <div class="group rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <h3
                            class="text-xl font-normal text-gray-500 transition ease-in-out group-hover:scale-105 group-hover:text-cyan-600 sm:text-2xl">
                            Latest Transactions</h3>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="overflow-x-auto rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                                Transaction
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                                Date
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                                Cost
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                                Sale
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($salesRecord as $record)
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap p-4 text-sm font-normal capitalize text-gray-900">
                                                    {{ $record->remarks }}
                                                </td>
                                                <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">
                                                    {{ substr($record->salesdate, 0, 4) . '/' . substr($record->salesdate, 4, 2) . '/' . substr($record->salesdate, 6, 2) }}
                                                </td>
                                                <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">
                                                    {{ $record->costprice }}
                                                </td>
                                                <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">
                                                    {{ $record->sellingprice }}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-4">
        <div class="flex flex-col justify-around space-y-2 space-x-0 sm:flex-row sm:space-y-0 sm:space-x-3">
            <div class="w-full rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8">
                <div class="flex items-center justify-between">
                    <div class="flex-shrink-0">
                        <span class="text-xl font-semibold leading-none text-[#4a5fec] sm:text-2xl">
                            @if ($todaysRecord[0]->sp != null || $todaysRecord[0]->sp != '')
                                {{ $todaysRecord[0]->sp }}
                            @else
                                0
                            @endif
                            <span class="text-xl font-semibold">Rs</span>
                        </span>
                        <h3 class="text-base font-normal text-gray-500">Sales today</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="text-xl font-semibold leading-none text-[#31b536] sm:text-2xl">
                            @if ($todaysRecord[0]->cp != null || $todaysRecord[0]->cp != '')
                                {{ $todaysRecord[0]->cp }}
                            @else
                                0
                            @endif
                            <span class="text-xl font-semibold">Rs</span>
                        </span>
                        <h3 class="text-base font-normal text-gray-500">Cost today</h3>
                    </div>
                </div>
            </div>
            <div class="w-full rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8">
                <div class="flex items-center justify-between">
                    <div class="flex-shrink-0">
                        <span class="text-xl font-semibold leading-none text-[#4a5fec] sm:text-2xl">{{ $saleInSevenDays }}
                            <span class="text-xl font-semibold">Rs</span></span>
                        <h3 class="text-base font-normal text-gray-500">Sales in last 7 days</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="text-xl font-semibold leading-none text-[#31b536] sm:text-2xl">{{ $costInSevenDays }}
                            <span class="text-xl font-semibold">Rs</span></span>
                        <h3 class="text-base font-normal text-gray-500">Cost in last 7 days</h3>
                    </div>
                </div>
            </div>

            <div class="w-full rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8">
                <div class="flex items-center justify-between">
                    <div class="flex-shrink-0">
                        <span
                            class="text-xl font-semibold leading-none text-[#b631ce] sm:text-2xl">{{ $profitInSevenDays }}
                            <span class="text-xl font-semibold">Rs</span></span>
                        <h3 class="text-base font-normal text-gray-500">Profit in last 7 days</h3>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="text-xl font-semibold leading-none text-[#b631ce] sm:text-2xl">
                            <?php if ($todaysRecord[0]->sp - $todaysRecord[0]->cp != null) {
                                echo $todaysRecord[0]->sp - $todaysRecord[0]->cp;
                            } else {
                                echo 0;
                            } ?>
                            {{-- {{ $profitInSevenDays }} --}}
                            <span class="text-xl font-semibold">Rs</span></span>
                        <h3 class="text-base font-normal text-gray-500">Profit today</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 grid grid-cols-1 px-4 xl:gap-4 2xl:grid-cols-2">

        <div class="group group mb-4 h-full rounded-lg bg-white p-4 shadow sm:p-6">
            <div class="mb-4 flex items-center justify-between">
                <h3
                    class="text-xl font-normal text-gray-500 transition ease-in-out group-hover:scale-105 group-hover:text-cyan-600 sm:text-2xl">
                    Product Overview</h3>
                <a href="{{ route('productsList') }}"
                    class="inline-flex items-center rounded-lg p-2 text-sm font-medium text-cyan-600 hover:bg-gray-100">
                    Edit Product
                </a>
            </div>
            <div class="-mr-3 flow-root">
                <div class="mt-4 max-h-96 overflow-y-auto pr-6">
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach ($productList as $product)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-8 w-8 rounded-full" src="{{ asset($product->image) }}" alt="">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-sm font-medium text-gray-900">
                                            {{ $product->pname }}
                                        </p>
                                        <p class="truncate text-sm capitalize text-gray-500">
                                            {{ $product->pcategory }} > {{ $product->ptag }}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">

                                        <form action="{{ route('overview') }}" method="POST">
                                            @csrf
                                            <input type="number" value="{{ $product->id }}" name="productId" hidden>
                                            <input type="submit" value="Overview"
                                                class="rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

        <div class="group rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8">
            <h3
                class="text-xl font-normal text-gray-500 transition ease-in-out group-hover:scale-105 group-hover:text-cyan-600 sm:text-2xl">
                Profit Per Product</h3>
            <div class="mt-4 block w-full scale-95 overflow-x-auto">
                {{ $mspChart->container() }}
            </div>
        </div>
    </div>

    <div>
        <!-- component -->
        <div class="m-4 grid grid-cols-1 gap-4 sm:grid-cols-4">
            <div class="group relative bg-white transition hover:z-[1] hover:shadow-2xl">
                <div
                    class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                    <img src="{{ asset($mostSoldItem->image) }}" class="h-14 w-14" width="512" height="512"
                        alt="burger illustration">

                    <div class="space-y-2">
                        <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-cyan-600">Most Sold</h5>
                        <p class="text-base text-gray-600">"<span
                                class="capitalize group-hover:text-cyan-600">{{ $mostSoldItem->pname }}</span>" is the
                            most sold
                            product with
                            {{ $mostSoldItem->sold }} {{ $mostSoldItem->soldper }} sold.</p>
                    </div>
                    <form action="{{ route('overview') }}" method="POST" hidden>
                        @csrf
                        <input type="number" value="{{ $mostSoldItem->id }}" name="productId" hidden>
                        <input type="submit" id="mostSoldProduct"
                            class="rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">
                    </form>
                    <a onclick="$('#mostSoldProduct').click()"
                        class="flex cursor-pointer items-center justify-between group-hover:text-cyan-600">
                        <span class="text-sm">Read more</span>
                        <span
                            class="-translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">&RightArrow;</span>
                    </a>
                </div>
            </div>
            <div class="group relative bg-white transition hover:z-[1] hover:shadow-2xl">
                <div
                    class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                    <img src="{{ asset($leastSoldItem->image) }}" class="h-14 w-14" width="512" height="512"
                        alt="burger illustration">

                    <div class="space-y-2">
                        <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-cyan-600">Least Sold</h5>
                        <p class="text-base text-gray-600">"<span
                                class="capitalize group-hover:text-cyan-600">{{ $leastSoldItem->pname }}</span>" is the
                            least sold
                            product with
                            {{ $leastSoldItem->sold }} {{ $leastSoldItem->soldper }} sold.</p>
                    </div>
                    <form action="{{ route('overview') }}" method="POST" hidden>
                        @csrf
                        <input type="number" value="{{ $leastSoldItem->id }}" name="productId" hidden>
                        <input type="submit" id="leastSoldProduct"
                            class="rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">
                    </form>
                    <a onclick="$('#leastSoldProduct').click()"
                        class="flex cursor-pointer items-center justify-between group-hover:text-cyan-600">
                        <span class="text-sm">Read more</span>
                        <span
                            class="-translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">&RightArrow;</span>
                    </a>
                </div>
            </div>
            <div class="group relative bg-white transition hover:z-[1] hover:shadow-2xl">
                <div
                    class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                    <img src="{{ asset($mostProfitableItem->image) }}" class="h-14 w-14" width="512" height="512"
                        alt="burger illustration">

                    <div class="space-y-2">
                        <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-cyan-600">Most Profitable
                        </h5>
                        <p class="text-base text-gray-600">"<span
                                class="capitalize group-hover:text-cyan-600">{{ $mostProfitableItem->pname }}</span>" is
                            the
                            most profitable
                            product with profit
                            {{ $mostProfitableItem->sp - $mostProfitableItem->cp }}
                            Rs.</p>
                    </div>
                    <form action="{{ route('overview') }}" method="POST" hidden>
                        @csrf
                        <input type="number" value="{{ $mostProfitableItem->pid }}" name="productId" hidden>
                        <input type="submit" id="mostProfitableProduct"
                            class="rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">
                    </form>
                    <a onclick="$('#mostProfitableProduct').click()"
                        class="flex cursor-pointer items-center justify-between group-hover:text-cyan-600">
                        <span class="text-sm">Read more</span>
                        <span
                            class="-translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">&RightArrow;</span>
                    </a>
                </div>
            </div>
            <div class="group relative bg-white transition hover:z-[1] hover:shadow-2xl">
                <div
                    class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                    <img src="{{ asset($leastProfitableItem->image) }}" class="h-14 w-14" width="512" height="512"
                        alt="burger illustration">

                    <div class="space-y-2">
                        <h5 class="text-xl font-medium text-gray-800 transition group-hover:text-cyan-600">Least Profitable
                        </h5>
                        <p class="text-base text-gray-600">"<span
                                class="capitalize group-hover:text-cyan-600">{{ $leastProfitableItem->pname }}</span>"
                            is
                            the
                            least profitable
                            product with profit
                            {{ $leastProfitableItem->sp - $leastProfitableItem->cp }}
                            Rs.</p>
                    </div>
                    <form action="{{ route('overview') }}" method="POST" hidden>
                        @csrf
                        <input type="number" value="{{ $leastProfitableItem->pid }}" name="productId" hidden>
                        <input type="submit" id="leastProfitableProduct"
                            class="rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">
                    </form>
                    <a onclick="$('#leastProfitableProduct').click()"
                        class="flex cursor-pointer items-center justify-between group-hover:text-cyan-600">
                        <span class="text-sm">Read more</span>
                        <span
                            class="-translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">&RightArrow;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>




    {{-- <script src="{{ asset('js/charts.js') }}"></script> --}}
    <script src="{{ $chart->cdn() }}"></script>
    <script src="{{ $mspChart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $mspChart->script() }}
@endsection
