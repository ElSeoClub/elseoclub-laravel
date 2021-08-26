<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/fontawesome/css/all.min.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.js') }}" defer></script>
</head>

<body class="bg-gray-100" style="overflow: hidden">

    <div class="flex bg-red-500 p-2 text-center text-white font-bold border-b-4 border-yellow-400">
        <div class="px-10">
            <a><img src="{{asset('svg/siconecta-txt.svg')}}" style="height:40px"></a>
        </div>
        <div class="text-3xl text-center w-full h-full align-middle">
            Legitimación del contrato colectivo de trabajo 2020
        </div>
    </div>
    <div class="m-6">
        {{ $slot }}
    </div>
    @livewireScripts
    <script src="{{ asset('js/sweetalerts.js') }}"></script>
</body>

</html>