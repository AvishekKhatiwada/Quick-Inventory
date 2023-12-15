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
                                <span class="ml-1 md:ml-2" aria-current="page">Products</span>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2" aria-current="page">Add
                                    Product</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Add product</h1>
            </div>
        </div>
    </div>
    <div class="space-y-6 bg-white p-6">
        <form enctype="multipart/form-data" action="/addProductDetailsToDatabase" method="POST" autocomplete="off">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Product
                        Name<span class="text-red-500">*</span></label>
                    <input type="text" name="pname" id="pname"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        required>
                    @error('pname')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="mb-2 block text-sm font-medium text-gray-900">Category <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="pcategory" id="pcategory"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('pcategory') }}" required>
                    @error('pcategory')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="mb-2 block text-sm font-medium text-gray-900">Tag<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="ptag" id="ptag"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('ptag') }}" required>
                    @error('ptag')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Brand</label>
                    <input type="text" name="pbrand" id="pbrand"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('pbrand') }}">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Length
                    </label>
                    <input type="text" name="plength" id="plength"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('plength') }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="mb-2 block text-sm font-medium text-gray-900">Weight</label>
                    <input type="text" name="pweight" id="pweight"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('pweight') }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Color</label>
                    <input type="text" name="pcolor" id="pcolor"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('pcategory') }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="mb-2 block text-sm font-medium text-gray-900">Size</label>
                    <input type="text" name="psize" id="psize"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('psize') }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Selling Unit<span
                            class="text-red-500">*</span>
                    </label>
                    <input type="text" name="soldper" id="soldper"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        value="{{ old('soldper') }}" required>
                    @error('soldper')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">

                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="user_avatar">Upload/Drop
                        Image<span class="text-red-500">*</span></label>
                    <input
                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-transparent focus:outline-none"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file" name="image" id="image"
                        accept="image/png,image/jpeg,image/jpg" required>
                    @error('image')
                        <div class="text-red-500">Product Image is required</div>
                    @enderror
                </div>
            </div>
            <div class="my-6 grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Add Product Lot</h1>
                </div>


                {{-- <div class="col-span-6 sm:col-span-3 hidden">
                    <label for="ProductId" class="text-sm font-medium text-gray-900 block mb-2">ProductId</label>
                    <input type="text" name="productId" id="productId"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                </div> --}}
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Lot
                        Name/No.<span class="text-red-500">*</span></label>
                    <input type="text" name="lot" id="lot"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        required value="{{ 'Lot_' . date('Md') }}">
                    @error('lot')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="mb-2 block text-sm font-medium text-gray-900">Quantity (in
                        <span id="addstockSoldPerId"> </span>)<span class="text-red-500">*</span></label>
                    <input type="number" name="quantity" id="quantity"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        required>
                    @error('quantity')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Cost (per
                        unit <span id="addstockSoldPerId1"></span>)<span class="text-red-500">*</span></label>
                    <input type="number" name="costprice" id="costprice"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        required>
                    @error('costprice')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Minimum quantity for
                        warning<span class="text-red-500">*</span></label>
                    <input type="number" name="warningquantity" id="warningquantity"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        required>
                    @error('warningquantity')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="my-5 mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">Add
                Product</button>
        </form>
    </div>
    <script>
        let unit = $('#soldper');
        $('#soldper').keyup(function() {
            document.getElementById("addstockSoldPerId").innerText = unit.val();
            document.getElementById("addstockSoldPerId1").innerText = unit.val();
        })
    </script>
@endsection
