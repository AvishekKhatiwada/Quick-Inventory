@extends('dashboard.master')
@section('content')
    <div class="block items-center justify-between bg-white p-4 sm:flex lg:mt-1.5">
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
                                    aria-current="page">Report</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Select Report</h1>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-around space-y-3 bg-white px-5 pb-20 sm:flex-row sm:space-y-0 sm:space-x-3">

        <div class="group relative w-full rounded-lg bg-white shadow-2xl transition hover:z-[1] sm:w-1/4">
            <div
                class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                <div class="flex justify-center">
                    <img src="{{ asset('images/staticImages/reportIcon.png') }}" class="h-20 w-20 group-hover:scale-105"
                        height="512" alt="burger illustration" />
                </div>

                <div class="space-y-2">
                    <h5 class="text-center text-xl font-medium text-gray-800 transition group-hover:text-blue-700">
                        Todays Report</h5>
                    <p class="text-center text-base text-gray-600">Includes the sales record of an entire day
                        (sales,cost,quantity sold etc)</p>
                </div>

                <div class="flex justify-center">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <a href="/home/report/todaysReport/pdf">
                            <button type="button"
                                class="inline-flex items-center rounded-l-lg border border-gray-200 bg-blue-500 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:z-10">
                                <img src="{{ asset('images/staticImages/pdf.png') }}" class="mr-1 w-5">
                                PDF
                            </button>
                        </a>
                        <a href="/home/report/todaysReport/excel">
                            <button type="button"
                                class="inline-flex items-center rounded-r-md border border-gray-200 bg-purple-500 py-2 px-4 text-sm font-medium text-white hover:bg-purple-700 focus:z-10">
                                <img src="{{ asset('images/staticImages/excel.png') }}" class="mr-1 w-5">
                                Excel
                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="group relative w-full rounded-lg bg-white shadow-2xl transition hover:z-[1] sm:w-1/4">
            <div
                class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                <div class="flex justify-center">
                    <img src="{{ asset('images/staticImages/reportIcon.png') }}" class="h-20 w-20 group-hover:scale-105"
                        height="512" alt="burger illustration" />
                </div>

                <div class="space-y-2">
                    <h5 class="text-center text-xl font-medium text-gray-800 transition group-hover:text-blue-700">
                        Weekly Report</h5>
                    <p class="text-center text-base text-gray-600">Includes the sales record of last 7 days
                        (sales,cost,quantity sold, weekly profit etc)</p>
                </div>

                <div class="flex justify-center">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <a href="/home/report/weeklyReport/pdf">
                            <button type="button"
                                class="inline-flex items-center rounded-l-lg border border-gray-200 bg-blue-500 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:z-10">
                                <img src="{{ asset('images/staticImages/pdf.png') }}" class="mr-1 w-5">
                                PDF
                            </button>
                        </a>
                        <a href="/home/report/weeklyReport/excel">
                            <button type="button"
                                class="inline-flex items-center rounded-r-md border border-gray-200 bg-purple-500 py-2 px-4 text-sm font-medium text-white hover:bg-purple-700 focus:z-10">
                                <img src="{{ asset('images/staticImages/excel.png') }}" class="mr-1 w-5">
                                Excel
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="group relative w-full rounded-lg bg-white shadow-2xl transition hover:z-[1] sm:w-1/4">
            <div
                class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                <div class="flex justify-center">
                    <img src="{{ asset('images/staticImages/reportIcon.png') }}" class="h-20 w-20 group-hover:scale-105"
                        height="512" alt="burger illustration" />
                </div>

                <div class="space-y-2">
                    <h5 class="text-center text-xl font-medium text-gray-800 transition group-hover:text-blue-700">
                        Total Report</h5>
                    <p class="text-center text-base text-gray-600">Includes the sales record from the begining of
                        business
                        (sales,cost,quantity sold etc)</p>
                </div>

                <div class="flex justify-center">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <a href="/home/report/totalReport/pdf">
                            <button type="button"
                                class="inline-flex items-center rounded-l-lg border border-gray-200 bg-blue-500 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:z-10">
                                <img src="{{ asset('images/staticImages/pdf.png') }}" class="mr-1 w-5">
                                PDF
                            </button>
                        </a>
                        <a href="/home/report/totalReport/excel">
                            <button type="button"
                                class="inline-flex items-center rounded-r-md border border-gray-200 bg-purple-500 py-2 px-4 text-sm font-medium text-white hover:bg-purple-700 focus:z-10">
                                <img src="{{ asset('images/staticImages/excel.png') }}" class="mr-1 w-5">
                                Excel
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="group relative w-full rounded-lg bg-white shadow-2xl transition hover:z-[1] sm:w-1/4">
            <div
                class="relative h-full space-y-8 rounded-lg p-8 shadow transition ease-in-out hover:scale-105 hover:rounded-lg hover:shadow-none">
                <div class="flex justify-center">
                    <img src="{{ asset('images/staticImages/reportIcon.png') }}" class="h-20 w-20 group-hover:scale-105"
                        height="512" alt="burger illustration" />
                </div>

                <div class="space-y-2">
                    <h5 class="text-center text-xl font-medium text-gray-800 transition group-hover:text-blue-700">
                        More Report</h5>
                    <p class="text-center text-base text-gray-600">This will be included in future updates including
                        report per product, annual report etc</p>
                </div>

                <div class="flex justify-center">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button type="button" disabled
                            class="inline-flex items-center rounded-l-lg border border-gray-200 bg-blue-500 py-2 px-4 text-sm font-medium text-white hover:bg-blue-700 focus:z-10">
                            <img src="{{ asset('images/staticImages/pdf.png') }}" class="mr-1 w-5">
                            PDF
                        </button>
                        <button type="button" disabled
                            class="inline-flex items-center rounded-r-md border border-gray-200 bg-purple-500 py-2 px-4 text-sm font-medium text-white hover:bg-purple-700 focus:z-10">
                            <img src="{{ asset('images/staticImages/excel.png') }}" class="mr-1 w-5">
                            Excel
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
