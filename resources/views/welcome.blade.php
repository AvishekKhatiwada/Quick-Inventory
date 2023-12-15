<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quick Inventory</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    @if (Session::has('LoginUnsuccessfull'))
        <div id="flashAlert" class="fixed bottom-5 right-5 z-50 mb-4 flex w-max rounded-lg bg-red-200 p-4" role="alert">
            <svg class="h-6 w-6 flex-shrink-0 text-red-700" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div class="text-md mx-3 ml-3 text-red-700">
                {{ Session::get('LoginUnsuccessfull') }}
            </div>
            <script>
                setTimeout(() => {
                    document.getElementById("flashAlert").remove();
                }, 3000);
            </script>
        </div>
    @endif
    {{ View::make('shared.loginNavbar') }}
    {{ View::make('shared.loginContent') }}
    {{ View::make('shared.loginFooter') }}

    <script src="{{ asset('js/flowbite.js') }}"></script>
</body>

</html>
