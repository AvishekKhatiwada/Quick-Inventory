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
<div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
    id="add-stock-modal">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Add Stock
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="add-stock-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="/addProductStockToDatabase" method="POST" autocomplete="off">
                    @csrf
                    <div class="grid grid-cols-6 gap-6 mb-5">
                        <div class="col-span-6 sm:col-span-3 hidden">
                            <label for="ProductId"
                                class="text-sm font-medium text-gray-900 block mb-2">ProductId</label>
                            <input type="text" name="productId" id="productId"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Lot
                                Name/No.<span class="text-red-500">*</span></label>
                            <input type="text" name="lot" id="lot"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                required value="{{ 'Lot_' . date('Md') }}">
                            @error('lot')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="category" class="text-sm font-medium text-gray-900 block mb-2">Quantity (in
                                <span id="stockSoldPerId"></span>)<span class="text-red-500">*</span></label>
                            <input type="number" name="quantity" id="quantity"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                required>
                            @error('quantity')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Cost (per
                                unit <span id="stockSoldPerId1"></span>)<span class="text-red-500">*</span></label>
                            <input type="number" name="costprice" id="costprice"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                required>
                            @error('costprice')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Minimum quantity for
                                warning<span class="text-red-500">*</span></label>
                            <input type="number" name="warningquantity" id="warningquantity"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                required>
                            @error('warningquantity')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="p-6 py-3 border-t border-gray-200 rounded-b">
                        <button
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
