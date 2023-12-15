<div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
    id="edit-stock-modal">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow relative">
            <!-- Modal header -->
            {{-- <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Edit Stock
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="edit-stock-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div> --}}
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="flex items-start justify-between rounded-t">
                    <h3 class="text-xl font-semibold">
                        Edit Stock
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm  inline-flex items-center"
                        data-modal-toggle="edit-stock-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                {{-- <div class="grid grid-cols-6 gap-6"> --}}
                <div class="">
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2" role="presentation">
                                <button
                                    class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 active"
                                    id="lot1-tab" data-tabs-target="#lot1" type="button" role="tab" aria-controls="lot1"
                                    aria-selected="true">lot 1</button>
                            </li>
                            <li class="mr-2" role="presentation" id="lot2check">
                                <button
                                    class="inline-block py-4 px-4 text-sm font-medium text-center text-gray-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300"
                                    id="lot2-tab" data-tabs-target="#lot2" type="button" role="tab" aria-controls="lot2"
                                    aria-selected="false">Lot 2</button>
                            </li>
                        </ul>
                    </div>
                    <div id="myTabContent">
                        <div class="p-4  rounded-lg dark:bg-gray-800" id="lot1" role="tabpanel"
                            aria-labelledby="lot1-tab">
                            <form action="/editProductLot1" method="POST">
                                @csrf
                                <div class="grid grid-cols-6 gap-6 mb-5">
                                    <div class="col-span-6 sm:col-span-3 hidden">
                                        <label for="ProductId"
                                            class="text-sm font-medium text-gray-900 block mb-2">stockId</label>
                                        <input type="text" name="l1stockId" id="l1stockId"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="product-name"
                                            class="text-sm font-medium text-gray-900 block mb-2">Lot
                                            Name/No.<span class="text-red-500">*</span></label>
                                        <input type="text" name="l1lot" id="l1lot"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('lot')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category"
                                            class="text-sm font-medium text-gray-900 block mb-2">Quantity (in
                                            <span id="l1stockSoldPerId"></span>)<span
                                                class="text-red-500">*</span></label>
                                        <input type="number" name="l1quantity" id="l1quantity" min="1"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('quantity')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Cost
                                            (per
                                            unit <span id="l1stockSoldPerId1"></span>)<span
                                                class="text-red-500">*</span></label>
                                        <input type="number" name="l1costprice" id="l1costprice" min="1"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('costprice')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Minimum
                                            quantity
                                            for
                                            warning<span class="text-red-500">*</span></label>
                                        <input type="number" name="l1warningquantity" id="l1warningquantity"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('warningquantity')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <button
                                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Update</button>
                            </form>
                            <form action="/deleteStock" method="POST">
                                @csrf
                                <input type="number" name="l1stockIdToDelete" id="l1stockIdToDelete" hidden>
                                <button
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center absolute right-10 bottom-10"
                                    type="submit" id="lot1delete">Delete</button>
                            </form>
                        </div>
                        <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="lot2" role="tabpanel"
                            aria-labelledby="lot2-tab">
                            <form action="/editProductLot2" method="POST" autocomplete="off">
                                @csrf
                                <div class="grid grid-cols-6 gap-6 mb-5">
                                    <div class="col-span-6 sm:col-span-3 hidden">
                                        <label for="ProductId"
                                            class="text-sm font-medium text-gray-900 block mb-2">l2stockId</label>
                                        <input type="text" name="l2stockId" id="l2stockId"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="product-name"
                                            class="text-sm font-medium text-gray-900 block mb-2">Lot
                                            Name/No.<span class="text-red-500">*</span></label>
                                        <input type="text" name="l2lot" id="l2lot"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('lot')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="category"
                                            class="text-sm font-medium text-gray-900 block mb-2">Quantity (in
                                            <span id="l2stockSoldPerId"></span>)<span
                                                class="text-red-500">*</span></label>
                                        <input type="number" name="l2quantity" id="l2quantity" min="1"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('quantity')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Cost
                                            (per
                                            unit <span id="l2stockSoldPerId1"></span>)<span
                                                class="text-red-500">*</span></label>
                                        <input type="number" name="l2costprice" id="l2costprice" min="1"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('costprice')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="brand" class="text-sm font-medium text-gray-900 block mb-2">Minimum
                                            quantity
                                            for
                                            warning<span class="text-red-500">*</span></label>
                                        <input type="number" name="l2warningquantity" id="l2warningquantity"
                                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            required>
                                        @error('warningquantity')
                                            <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <button
                                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Update</button>
                            </form>
                            <form action="/deleteStock" method="POST">
                                @csrf
                                <input type="number" name="l2stockIdToDelete" id="l2stockIdToDelete" hidden>
                                <button
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center absolute right-10 bottom-10"
                                    type="submit" id="lot1delete">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            {{-- <div class="p-6 border-t border-gray-200 rounded-b">
                <button
                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    type="submit">Save all</button>
            </div> --}}
        </div>
    </div>
</div>
