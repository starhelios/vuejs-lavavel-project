<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/auth.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="w-full h-full m-0 p-0 ">
    <div id="app" class="w-full h-full overflow-x-hidden">
        <div class="w-full logo py-4 mx-8">
            <a href="{{ route('home') }}"> <img src=" {{ asset('assets/images/sanofi-logo.svg') }}" alt=""></a>
        </div>

        <main class="w-full pb-5  2xl:pb-8">
            @yield('content')
        </main>
        
        <div class="w-full bottom-footer  bottom-0 left-0 right-0 bg-gray-900   " >
            <div class="w-full flex justify-between items-center">
                <div class=" items-center px-10 py-5">
                    <p class="text-white text-sm">© Copyright <span id="year"></span> all rights reserved</p>
                </div>
                <div class=" items-center px-10 py-5 flex flex-row text-right">
                    <a class="text-white text-right text-sm px-2" href="{{ route('imprint') }}">Imprint</a>
                    <a class="text-white text-right text-sm px-2" href="{{ route('policy') }}">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function myFunction() {
        var date = new Date();
        var year = date.getFullYear();
        document.getElementById("year").innerHTML = year;
    }
    myFunction()
</script>
</html>
