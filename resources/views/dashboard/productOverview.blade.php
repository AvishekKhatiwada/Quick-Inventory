@extends("dashboard.master")
@section('content')
    <div class="grid grid-cols-1 gap-0 sm:grid-cols-2">
        <div class="col-auto mx-3 my-5 rounded-lg bg-white p-5 shadow">
            <img alt="" class="mx-auto h-96 rounded object-cover object-center" src="{{ asset($product[0]->image) }}">
        </div>
        <div class="col-auto mx-3 my-5 rounded-lg bg-white object-center p-10 shadow">
            <h2 class="title-font text-sm tracking-widest text-gray-500">{{ $product[0]->pbrand }}</h2>
            <h1 class="title-font mb-4 text-3xl font-medium text-gray-900">{{ $product[0]->pname }}</h1>
            <div class="flex justify-start text-base sm:text-lg md:text-xl">
                <h3 class="title-font capitalize tracking-widest text-gray-500">{{ $product[0]->pcategory }}
                </h3>
                <svg class="h-7 w-7 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                <h3 class="title-font capitalize tracking-widest text-gray-500">{{ $product[0]->ptag }}</h3>
            </div>
            <div class="mt-4 flex py-2">
                <span class="text-gray-500">Color</span>
                <span class="ml-auto text-gray-900">
                    @if ($product[0]->pcolor)
                        {{ $product[0]->pcolor }}
                    @else
                        -
                    @endif
                </span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Size</span>
                <span class="ml-auto text-gray-900">
                    @if ($product[0]->psize)
                        {{ $product[0]->psize }}
                    @else
                        -
                    @endif
                </span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Length</span>
                <span class="ml-auto text-gray-900">
                    @if ($product[0]->plength)
                        {{ $product[0]->plength }}
                    @else
                        -
                    @endif
                </span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Weight</span>
                <span class="ml-auto text-gray-900">
                    @if ($product[0]->pweight)
                        {{ $product[0]->pweight }}
                    @else
                        -
                    @endif
                </span>
            </div>
            <div class="flex border-t border-gray-200 py-2">
                <span class="text-gray-500">Available</span>

            </div>
            <div class="flex justify-between">
                <span class="text-xl font-medium text-gray-900">Rs {{ $product[0]->costprice }}</span>
                <span class="text-xl font-medium text-gray-900">{{ $product[0]->quantity }} <span
                        class="text-xl font-normal">{{ $product[0]->soldper }}</span></span>
            </div>
            @if (count($product) == 2)
                <div class="mt-1 flex justify-between">
                    <span class="text-xl font-medium text-gray-900">Rs {{ $product[1]->costprice }}</span>
                    <span class="text-xl font-medium text-gray-900">{{ $product[1]->quantity }} <span
                            class="text-xl font-normal">{{ $product[1]->soldper }}</span></span>
                </div>
            @endif
        </div>
    </div>

    <section class="body-font mx-5 my-1 rounded-lg bg-white p-5 text-gray-600 shadow">
        <div class="container mx-auto px-5 py-16">
            <div class="-m-4 flex flex-wrap text-center">
                <div class="w-1/2 p-4 sm:w-1/4">
                    <h2 class="title-font text-3xl font-medium text-gray-900 sm:text-4xl">
                        @if ($productBasicInfo->sp)
                            {{ $productBasicInfo->sp }}
                        @else
                            0
                        @endif
                    </h2>
                    <p class="leading-relaxed">Total Sales</p>
                </div>
                <div class="w-1/2 p-4 sm:w-1/4">
                    <h2 class="title-font text-3xl font-medium text-gray-900 sm:text-4xl">
                        @if ($productBasicInfo->cp)
                            {{ $productBasicInfo->cp }}
                        @else
                            0
                        @endif
                    </h2>
                    <p class="leading-relaxed">Total Cost</p>
                </div>
                <div class="w-1/2 p-4 sm:w-1/4">
                    <h2 class="title-font text-3xl font-medium text-gray-900 sm:text-4xl">
                        @if ($productBasicInfo->qty)
                            {{ $productBasicInfo->qty }}
                        @else
                            0
                        @endif
                    </h2>
                    <p class="leading-relaxed">Quantity Sold</p>
                </div>
                <div class="w-1/2 p-4 sm:w-1/4">
                    <h2 class="title-font text-3xl font-medium text-gray-900 sm:text-4xl">
                        {{ $productBasicInfo->sp - $productBasicInfo->cp }}</h2>
                    <p class="leading-relaxed">Total Profit</p>
                </div>
            </div>
        </div>
    </section>

    <section class="body-font m-5 rounded-lg bg-white px-5 text-gray-600 shadow">

        <div class="container mx-auto px-5 py-16">
            <h3 class="mb-3 -mt-6 text-xl font-normal text-gray-500 sm:text-2xl">{{ $product[0]->pname }} sales
                prediction</h3>
            {{ $pdChart->container() }}
        </div>
    </section>

    <script src="{{ $pdChart->cdn() }}"></script>

    {{ $pdChart->script() }}
@endsection
