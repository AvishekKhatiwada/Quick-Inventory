@extends ("dashboard.master")
@section('content')
    <style>
        .dataTables_filter,
        .dataTables_info {
            display: none;
        }

    </style>
    @if (Session::has('productSuccessFlashSession'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-green-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-green-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-green-700">
                {{ Session::get('productSuccessFlashSession') }}</div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif
    @if (Session::has('productUnsuccessFlashSession'))
        <div id="flashAlert" class="absolute top-5 right-5 mb-4 flex w-max rounded-lg bg-red-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-red-700">
                {{ Session::get('productUnsuccessFlashSession') }}</div>
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
                                    aria-current="page">Products</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">All products</h1>
            </div>
            <div class="block items-center sm:flex md:divide-x md:divide-gray-100">
                <form class="mb-4 sm:mb-0 sm:pr-3" autocomplete="off">
                    @csrf
                    <label for="products-search" class="sr-only">Search</label>
                    <div class="relative mt-1 sm:w-64 xl:w-96">
                        <input type="text" id="products_search"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                            placeholder="Search for products">
                    </div>
                </form>
                <div class="flex w-full items-center sm:justify-end">
                    {{-- <div class="hidden md:flex pl-2 space-x-1">
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </a>
                    </div> --}}
                    {{-- <button type="button" data-modal-toggle="add-product-modal"
                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2 text-center sm:ml-auto">
                        <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add product
                    </button> --}}
                    <a href="/home/products/addProduct">
                        <button type="button"
                            class="inline-flex items-center rounded-lg bg-cyan-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 sm:ml-auto">
                            <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add product
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5 flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full table-fixed divide-y divide-gray-200" id="productTable">
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
                                    Category <span><img src="{{ asset('images/staticImages/sorting.ico') }}"
                                            class="float-right transition ease-in-out hover:scale-125 hover:cursor-pointer"
                                            width="15"></span>
                                </th>
                                <th scope="col" class="p-4 text-left text-xs font-medium uppercase text-gray-500">
                                    Product Action
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
                                            <img src="{{ asset($item->image) }}" class="w-10 hover:animate-pulse" alt=""
                                                data-modal-toggle="imgModal"
                                                onclick="showImageZoomModal('{{ asset($item->image) }}','{{ $item->pname }}','{{ $item->pcategory }}','{{ $item->ptag }}','{{ $item->pcolor }}','{{ $item->plength }}','{{ $item->soldper }}','{{ $item->pweight }}','{{ $item->psize }}' )">
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
                                        </td>
                                        <td class="whitespace-nowrap p-4 text-base font-medium capitalize text-gray-900">
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
                                        <td class="space-x-2 whitespace-nowrap p-4">
                                            <a href="/home/products/editProduct/{{ $item->id }}">
                                                <button type="button"
                                                    class="inline-flex items-center rounded-lg bg-cyan-600 px-3 py-2 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200">
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
                                            </a>
                                            <button type="button" data-modal-toggle="delete-product-modal"
                                                onclick='showProductDeleteModal( "{{ $item->id }}","{{ $item->pname }}")'
                                                class="inline-flex items-center rounded-lg bg-red-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                                <svg class="mx-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg><span>Delete</span>
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
    {{-- <div
        class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
        <div class="flex items-center mb-4 sm:mb-0">
            <a href="#"
                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#"
                class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <span class="text-sm font-normal text-gray-500">Showing <span class="text-gray-900 font-semibold">1-20</span> of
                <span class="text-gray-900 font-semibold">2290</span></span>
        </div>
        <div class="flex items-center space-x-3">
            <a href="#"
                class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                <svg class="-ml-1 mr-1 h-5 w-5" fill=" currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
                Previous
            </a>
            <a href="#"
                class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                Next
                <svg class="-mr-1 ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div> --}}

    {{-- Edit Product Modal --}}
    {{-- {{ View::make('dashboard.shared.productEditModal') }} --}}

    {{-- < !--Add Product Modal--> --}}
    {{-- {{ View::make('dashboard.shared.productAddModal') }} --}}

    {{ View::make('dashboard.shared.productDeleteModal') }}
    {{ View::make('dashboard.shared.productZoomImageModal') }}
    <script>
        function showProductDeleteModal(id, name) {
            document.getElementById("productDeleteId").value = id;
            document.getElementById("productDeleteName").innerText = name;
        }

        function showImageZoomModal(imgSrc, name, category, tag, color, length, soldPer, weight, size) {
            tempImage = imgSrc;
            document.getElementById("imageZoomModalImageSrc").src = tempImage;
            console.log("{{ asset('"+imgSrc+"') }}")
            document.getElementById("imageZoomModalProductName").innerText = name;
            document.getElementById("imageZoomModalProductCategory").innerText = category;
            document.getElementById("imageZoomModalProductTag").innerText = tag;

            if (!(color === "" || color === null)) {
                document.getElementById("imageZoomModalProductColor").innerText = color;
            } else {
                document.getElementById("imageZoomModalProductColor").innerText = "-";
            }

            if (!(length === "" || length === null)) {
                document.getElementById("imageZoomModalProductLength").innerText = length;
            } else {
                document.getElementById("imageZoomModalProductLength").innerText = "-";
            }

            if (!(weight === "" || weight === null)) {
                document.getElementById("imageZoomModalProductWeight").innerText = weight + " " + soldPer;
            } else {
                document.getElementById("imageZoomModalProductWeight").innerText = "-";
            }

            if (size !== "") {
                document.getElementById("imageZoomModalProductSize").innerText = size;
            } else {
                document.getElementById("imageZoomModalProductSize").innerText = "-";
            }
        }

        $(document).ready(function() {
            var table = $('#productTable').DataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false,
            });

            $('#products_search').on('keyup', function() {
                table.search(this.value).draw();
            });

        });
    </script>
@endsection
