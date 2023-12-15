<div id="imgModal" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full scale-90 sm:scale-75 md:inset-0 mt-28 sm:mt-0 transition ease-linear delay-1000">
    <div class="relative px-4 w-full max-w-3xl h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex flex-col justify-center items-center">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 mr-2 mt-2 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="imgModal">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="w-4/6 rounded-lg justify-center flex">
                    <img id="imageZoomModalImageSrc" class="object-contain p-2 max-w-full h-auto" alt="">
                </div>
                <div class="w-full m:w-2/6 p-2 h-auto rounded-lg text-center mb-3">
                    <h3 class="text-3xl" id="imageZoomModalProductName"></h3>
                    <span id="imageZoomModalProductCategory"></span> > <span id="imageZoomModalProductTag"></span>
                    <div class="flex space-x-1 justify-around mt-3">
                        <div class="flex flex-col">
                            <span class="whitespace-nowrap text-xl font-medium text-gray-900">Color</span>
                            <span id="imageZoomModalProductColor"
                                class="whitespace-nowrap text-lg font-medium text-gray-900"> - </span>
                        </div>
                        <div class="flex flex-col">
                            <span class="whitespace-nowrap text-xl font-medium text-gray-900">Length</span>
                            <span id="imageZoomModalProductLength"
                                class="whitespace-nowrap text-lg font-medium text-gray-900"> - </span>
                        </div>
                        <div class="flex flex-col">
                            <span class="whitespace-nowrap text-xl font-medium text-gray-900 capitalize">Weight</span>
                            <span id="imageZoomModalProductWeight"
                                class="whitespace-nowrap text-lg font-medium text-gray-900"> - </span>
                        </div>
                        <div class="flex flex-col">
                            <span class="whitespace-nowrap text-xl font-medium text-gray-900">Size</span>
                            <span id="imageZoomModalProductSize"
                                class="whitespace-nowrap text-lg font-medium text-gray-900"> - </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
