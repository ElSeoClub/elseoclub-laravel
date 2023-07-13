<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema de legitimación - Siconecta</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}?v=12">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.css') }}?v=12">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}?v=12">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.js') }}" defer></script>
</head>

<body class="font-sans antialiased ">
<div class="min-h-screen bg-gray-100 relative">
        <div class="h-14 w-full bg-white items-center flex p-6 border-b z-50 text-2xl font-bold justify-between">
            <span class="truncate flex-grow">{{ $title }}</span>
            <div x-data="{dropdownMenu: false}" class="relative">
                <button @click="dropdownMenu = ! dropdownMenu" class="flex items-center rounded-md w-10 h-10 ">
                    <img src="{{asset('storage/'.Auth::user()->profile_photo_path)}}" width="40" height="40" class="border-4 border-orange-600 w-10 h-10 rounded-full object-fill ">
                </button>
                <div x-show="dropdownMenu" class="absolute right-0 py-2 mt-2 bg-white rounded-md shadow-xl w-44 z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <span onclick="event.preventDefault();this.closest('form').submit();"  class="cursor-pointer block px-4 py-2 text-sm  text-gray-700 hover:bg-gray-400 hover:text-white">
                        Cerrar sesión
                    </span>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full bg-white  h-14 flex justify-center  border-t z-40">
            <div class="w-full flex items-center justify-between max-w-[480px] mx-auto">
                <a href="{{route('home.index')}}" class="w-[25%] text-center h-14 flex items-center cursor-pointer justify-center border-t-4 relative @if(isset($active) && $active == 'home') border-red-400 bg-gray-100 @else border-white hover:bg-gray-100 hover:border-red-400 @endif"><img src="{{asset('svg/home.png')}}" width="26" alt=""></a>
                <a href="{{route('home.calendar')}}" class="w-[25%] text-center h-14 flex items-center cursor-pointer justify-center border-t-4 relative @if(isset($active) && $active == 'calendars') border-red-400 bg-gray-100 @else border-white hover:bg-gray-100 hover:border-red-400 @endif"><img src="{{asset('svg/calendar.png')}}" width="26" alt=""> <div class="px-1 bg-red-600 absolute text-xs rounded-full font-bold text-white top-2 right-5">12</div></a>
                <a href="{{route('home.bitacora')}}" class="w-[25%] text-center h-14 flex items-center cursor-pointer justify-center border-t-4 relative @if(isset($active) && $active == 'bitacora') border-red-400 bg-gray-100 @else border-white hover:bg-gray-100 hover:border-red-400 @endif"><img src="{{asset('svg/sticky-notes.png')}}" width="26" alt=""></a>
                <a href="{{route('activities.index')}}" class="w-[25%] text-center h-14 flex items-center cursor-pointer justify-center border-t-4 relative @if(isset($active) && $active == 'actividades') border-red-400 bg-gray-100 @else border-white hover:bg-gray-100 hover:border-red-400 @endif"><img src="{{asset('svg/approved.png')}}" width="26" alt=""></a>
            </div>
        </div>
    {{--            <!-- Page Heading -->--}}
    {{--            @if (isset($header))--}}
    {{--                <header class="bg-white shadow">--}}
    {{--                    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">--}}
    {{--                        {{ $header }}--}}
    {{--                    </div>--}}
    {{--                </header>--}}
    {{--            @endif--}}
    
    <!-- Page Content -->
    
    <main >
        {{ $slot }}
    </main>
    
</div>

@stack('modals')

@livewireScripts

<script>
    const appHeight = () => {
        const doc = document.documentElement
        doc.style.setProperty('--app-height', `${window.innerHeight}px`)
    }
    window.addEventListener('resize', appHeight)
    appHeight()
</script>
<script src="{{ asset('js/sweetalerts.js') }}?v=11"></script>
</body>
</html>
