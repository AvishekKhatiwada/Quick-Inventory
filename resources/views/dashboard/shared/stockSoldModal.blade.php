<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

</style>
<div class="h-modal fixed top-4 left-0 right-0 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0"
    id="stock-sold-modal">
    <div class="relative h-full w-full max-w-2xl px-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between rounded-t border-b p-5">
                <h3 class="text-xl font-semibold">
                    Sell Stock
                </h3>
                <button type="button"
                    class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                    data-modal-toggle="stock-sold-modal">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-6 p-6">
                <form action="/sellStock" method="POST" autocomplete="off" id="stockSalesForm">
                    @csrf
                    <div class="mb-5 grid grid-cols-6 gap-6">
                        <div class="col-span-6 hidden sm:col-span-3">
                            <label for="StockId" class="mb-2 block text-sm font-medium text-gray-900">StockId</label>
                            <input type="text" name="stockId" id="stockId"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm" />
                        </div>
                        <div class="col-span-6 hidden sm:col-span-3">
                            <label for="StockId" class="mb-2 block text-sm font-medium text-gray-900">lowStock</label>
                            <input type="text" name="lowStock" id="lowStock" value="no"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="countries" class="mb-2 block text-sm font-medium text-gray-900">Select Lot To
                                Sell</label>
                            <select id="sellingLots"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                                <option id="salesOption1"></option>
                                <option id="salesOption2"></option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Quantity
                                Sold</label>
                            <div class="relative flex w-full justify-around sm:justify-evenly">
                                <span class="mx-1 mt-1 text-base">1</span>
                                <input type="range" id="stockRangeInput"
                                    class="form-range app mt-2 h-4 w-3/4 rounded-md bg-gray-100 p-0 focus:shadow-none focus:outline-none focus:ring-0"
                                    min="1" max="100" value="1" />
                                <span class="mx-1 mt-1 text-base" id="maxStockQuantity">-</span>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <input type="number" name="stockNumberInput" id="stockNumberInput" min="1" max="100"
                                class="mt-0 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm outline-none focus:border-cyan-600 focus:ring-cyan-600 sm:mt-5 sm:text-sm"
                                value="1" />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Total
                                Sales</label>
                            <input type="number" name="totalSalesAmount" id="totalSalesAmount"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm outline-none focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                required />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="product-name" class="mb-2 block text-sm font-medium text-gray-900">Total Cost
                            </label>
                            <input type="text" name="totalCostAmount" id="totalCostAmount"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm outline-none focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                readonly />
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <label for="brand" class="mb-2 block text-sm font-medium text-gray-900"><span
                                    id="profitTag">Profit</span>/<span id="lossTag">Loss</span></label>
                            <input type="number" name="profitloss" id="profitloss"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                readonly />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Remaining <span
                                    class="hidden text-xs font-normal text-red-500" id="lowQuantity">(Low
                                    Quantity)</span></label>

                            <input type="number" name="remainingQuantity" id="remainingQuantity"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                readonly />
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Date</label>
                            <input type="text" name="salesDate" id="salesdDate"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                readonly value="{{ date('Y / m / d') }}" />
                        </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="brand" class="mb-2 block text-sm font-medium text-gray-900">Remarks</label>
                            <input type="text" name="remarks" id="remarks"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                                required />
                        </div>


                    </div>
                    <!-- Modal footer -->
                    <div class="rounded-b border-t border-gray-200 p-6 py-3">
                        <button
                            class="rounded-lg bg-cyan-600 px-5 py-2.5 text-center text-sm font-medium text-white focus:ring-4 focus:ring-cyan-200"
                            type="submit" id="confirmSales">Sell</button>
                        <input type="reset" value="Reset" hidden id="resetStockSellForm">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
