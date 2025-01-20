<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Calender -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased bg-white">

<div class="min-h-screen bg-white">
    <div>
        @livewire('admin-navigation')
    </div>

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    @if (isset($header2))
        <header class="bg-white dark:bg-gray-800 shadow-xl mb-4">
            <div class="max-w-7xl mx-auto pt-2 pb-4 px-4 sm:px-6 lg:px-8">
                {{ $header2 }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <div class="h-auto">
        <main class=" mx-auto max-w-7xl py-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>


</div>
<div>
    @livewire('footer-menu')
</div>

@livewireScripts
@livewireCalendarScripts
</body>
</html>
