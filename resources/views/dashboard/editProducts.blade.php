@extends("dashboard.master")
@section('content')
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
                                <span class="ml-1 text-sm font-medium text-gray-400 md:ml-2" aria-current="page">Edit
                                    Product</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Edit product</h1>
            </div>
        </div>
    </div>
    <div class="space-y-6 bg-white p-6">
        <form enctype="multipart/form-data" action="/updateProductDetailsToDatabase" method="POST">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 hidden sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Product
                        Id</label>
                    <input type="text" name="id" id="id"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->id }}" readonly hidden>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Product
                        Name<span class="text-red-500">*</span></label>
                    <input type="text" name="pname" id="pname"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->pname }}">
                    @error('pname')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="mb-2 block text-sm font-medium text-gray-900">Category<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="pcategory" id="pcategory"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->pcategory }}">
                    @error('pcategory')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="mb-2 block text-sm font-medium text-gray-900">Tag<span
                            class="text-red-500">*</span></label>
                    <input type="text" name="ptag" id="ptag"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->ptag }}">
                    @error('ptag')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Brand</label>
                    <input type="text" name="pbrand" id="pbrand"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->pbrand }}">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Length
                    </label>
                    <input type="text" name="plength" id="plength"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->plength }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="category" class="mb-2 block text-sm font-medium text-gray-900">Weight</label>
                    <input type="text" name="pweight" id="pweight"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->pweight }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Color</label>
                    <input type="text" name="pcolor" id="pcolor"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->pcolor }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="price" class="mb-2 block text-sm font-medium text-gray-900">Size</label>
                    <input type="text" name="psize" id="psize"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->psize }}">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Selling Unit<span
                            class="text-red-500">*</span>
                    </label>
                    <input type="text" name="soldper" id="soldper"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                        req value="{{ $item->soldper }}">
                    @error('soldper')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">

                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300"
                        for="user_avatar">Upload/Drop New
                        Image</label>
                    <input
                        class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-transparent focus:outline-none"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file" name="image" id="image"
                        accept="image/png,image/jpeg,image/jpg">
                    @error('image')
                        <div class="text-red-500">Product Image is required</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <button type="submit"
                        class="my-5 mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">Update
                        Product
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
