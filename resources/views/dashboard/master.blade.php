<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quick Inventory</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/datatable.css') }}"> --}}
</head>

<body>
    {{ View::make('dashboard.shared.dashboardNavbar') }}
    <div class="flex bg-white pt-14">
        {{ View::make('dashboard.shared.dashboardSideBar') }}
        <div id="main-content" class="relative h-full w-full overflow-y-auto bg-gray-100 lg:ml-64">
            <main>
                @yield('content')
            </main>
            {{-- {{ View::make('dashboard.shared.dashboardFooter') }} --}}
        </div>
    </div>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/datatable.js') }}"></script>
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
</body>

</html>
