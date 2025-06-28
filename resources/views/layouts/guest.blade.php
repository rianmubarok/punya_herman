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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen font-sans text-gray-900 antialiased transition-all duration-300">
        <div class="flex flex-col min-h-screen justify-center items-center bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 w-full min-h-screen">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
