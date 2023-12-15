 @extends('dashboard.master')
 @section('content')
     <div class="block items-center justify-between bg-white p-4 sm:flex lg:mt-1.5">
         <div class="w-full">
             <div class="">
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
                                 <span class="ml-1 md:ml-2" aria-current="page">Suppliers</span>
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
                                     Supplier</span>
                             </div>
                         </li>
                     </ol>
                 </nav>
                 <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Edit supplier</h1>
             </div>
         </div>
     </div>
     {{-- <form action="/updateSuppliersToDatabase" method="POST" enctype="multipart/form-data" class="ml-2 w-1/2 bg-white">
         @csrf
         <input type="hidden" name="id" id="id" value="{{ $item->id }}">
         <div class="ml-2">
             <label for="name" class="mb-2 block text-sm font-medium">Full Name<span class="text-red-500">*</span></label>
             <input type="text" name="name" id="name"
                 class="block w-full rounded-lg border border-gray-300 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                 value="{{ $item->sname }}" required>

             <label for="email" class="mb-2 mt-2 block text-sm font-medium text-gray-900">Email<span
                     class="text-red-500">*</span></label>
             <input type="email" name="email" id="email"
                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                 value="{{ $item->semail }}" required>

             <label for="phonenumber" class="mb-2 mt-2 block text-sm font-medium text-gray-900">Phone
                 Number<span class="text-red-500">*</span></label>
             <input type="number" name="phonenumber" id="phonenumber"
                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                 value="{{ $item->sphone }}" required>

             <label for="address" class="mb-2 mt-2 block text-sm font-medium text-gray-900">Address<span
                     class="text-red-500">*</span></label>
             <input type="text" name="address" id="address"
                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                 value="{{ $item->saddress }}" required>

             <label class="mb-2 mt-2 block text-sm font-medium text-gray-900 dark:text-gray-300"
                 for="user_avatar">Upload/Drop
                 Image</label>
             <input
                 class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:border-transparent focus:outline-none"
                 aria-describedby="user_avatar_help" id="user_avatar" type="file" name="image" id="image"
                 accept="image/png,image/jpeg,image/jpg">
         </div>
         <button type="submit"
             class="my-5 ml-2 items-center rounded-lg rounded-b border-t border-gray-200 bg-cyan-600 p-6 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200">Update</button>
     </form> --}}
     <div class="bg-white px-4 py-4 pt-6">
         <form action="/updateSuppliersToDatabase" method="POST" enctype='multipart/form-data'>
             @csrf
             <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                 <div class="rounded-lg bg-white p-2 shadow-md sm:p-4 xl:p-6">
                     <div class="mb-2 flex items-center justify-between">
                         <div>
                             <h3 class="text-xl font-normal text-gray-500 sm:text-2xl">Supplier Picture</h3>
                         </div>
                     </div>
                     <div class="mt-8 flex flex-col">
                         <div class="rounded-lg">
                             <div class="inline-block min-w-full align-middle">
                                 <div class=""> <img src="{{ asset($item->simage) }}"
                                         alt="{{ asset($item->sname) }}"
                                         class="mx-auto h-72 rounded-lg object-cover object-center">
                                 </div>
                             </div>
                             <div class=""> <button style=""
                                     class="my-3 w-full overflow-x-hidden rounded-lg border border-cyan-600 px-5 py-2.5 text-sm font-medium text-cyan-600 hover:bg-cyan-700 hover:text-white focus:ring-4 focus:ring-blue-300"
                                     onclick="changePictureClicked()" id="changePicture">Change
                                     Picture</button>
                                 <input type='file' id="getFile" style="display:none" name="simage"
                                     accept=".png, .jpg, .jpeg" name="simage">
                                 <script>
                                     let imgfile = document.getElementById('getFile');
                                     let imgBtn = document.getElementById('changePicture');

                                     function changePictureClicked() {

                                         event.preventDefault();
                                         imgfile.click()
                                     }

                                     imgfile.onchange = function() {

                                         let myArray = this.value.split("\\");
                                         imgBtn.innerText = myArray[myArray.length - 1];
                                     };
                                 </script>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-span-2 rounded-lg bg-white p-2 shadow-md sm:p-4 xl:p-6">
                     <div class="mb-4 flex items-center justify-between">
                         <div>
                             <h3 class="text-xl font-normal text-gray-500 sm:text-2xl">Supplier Details</h3>
                         </div>
                     </div>
                     <div class="mt-8 flex flex-col">
                         <div class="rounded-lg">
                             <div class="inline-block min-w-full align-middle">
                                 <div class="sm:rounded-lg">
                                     <div class="mb-6 grid grid-cols-1 gap-2 sm:grid-cols-2">
                                         <div class="" hidden> <label for="email"
                                                 class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">
                                                 Name</label>
                                             <input type="name" id="uname"
                                                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                 placeholder="User Name" required="" name="id" value="{{ $item->id }}">
                                         </div>
                                         <div class=""> <label for="email"
                                                 class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">
                                                 Name</label>
                                             <input type="name" id="uname"
                                                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                 placeholder="User Name" required="" name="sname"
                                                 value="{{ $item->sname }}">
                                         </div>
                                         <div class="">
                                             <label for="password"
                                                 class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">
                                                 Number</label>
                                             <input type="number" id="uphone" name="sphone"
                                                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                 required="" value="{{ $item->sphone }}">
                                         </div>

                                     </div>

                                     <div class="mb-5 grid">
                                         <div class="mb-5"> <label for="email"
                                                 class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">
                                                 Email</label>
                                             <input type="email" id="email" name="semail"
                                                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                 placeholder="dipeshgupta@gmail.com" required=""
                                                 value="{{ $item->semail }}">
                                         </div>
                                         <div class="col mb-1">
                                             <label for="password"
                                                 class="mb-2 block text-base font-medium text-gray-900 dark:text-gray-300">
                                                 Address</label>
                                             <input type="text" id="password" name="saddress"
                                                 class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                 required="" value="{{ $item->saddress }}">
                                         </div>
                                     </div>
                                     <div class="mb-6 grid grid-cols-1 sm:grid-cols-3">
                                         <input type="submit"
                                             class="my-2 w-full overflow-x-hidden rounded-lg border border-cyan-600 bg-cyan-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-blue-300"
                                             id="submit" value="Update">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </form>
     </div>
 @endsection
