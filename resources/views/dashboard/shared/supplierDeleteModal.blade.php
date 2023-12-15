 <!-- Delete Supplier Modal -->
 <div class="h-modal fixed top-4 left-0 right-0 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0"
     id="delete-supplier-modal">
     <div class="relative h-full w-full max-w-md px-4 md:h-auto">
         <!-- Modal content -->
         <div class="relative rounded-lg bg-white shadow">
             <!-- Modal header -->
             <div class="flex justify-end p-2">
                 <button type="button"
                     class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                     data-modal-toggle="delete-supplier-modal">
                     <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd"
                             d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </button>
             </div>
             <!-- Modal body -->
             <div class="p-6 pt-0 text-center">
                 <svg class="mx-auto h-20 w-20 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                 </svg>
                 <h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Are you sure you want to delete this supplier ?
                 </h3>
                 <form action="/deleteSupplierFormDatabase" method="POST"
                     class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-3 py-2.5 text-center text-base font-medium text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                     @csrf
                     <input type="hidden" name="id" id="supplierDeleteId">
                     <button type="submit">Yes, I'm sure</button>
                 </form>
                 <a href="#"
                     class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-3 py-2.5 text-center text-base font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200"
                     data-modal-toggle="delete-supplier-modal">
                     No, cancel
                 </a>
             </div>
         </div>
     </div>
 </div>
