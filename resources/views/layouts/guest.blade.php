<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
         <title>@yield('title', 'My Blog')</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white dark:bg-gray-900">
         @include('layouts.components.navbar')
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 dark:bg-gray-900">

            <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
                {{ $slot }}
            </div>
            
        </div>
         @include('layouts.components.footer')

         <script>
    // Check if dark mode is enabled in localStorage
    if (localStorage.getItem('darkmode') === 'enabled') {
        document.documentElement.classList.add('dark');
    }

    document.addEventListener("DOMContentLoaded", function() {
        const themeToggleBtn = document.getElementById('theme-toggle');
        const darkIcon = document.getElementById('theme-toggle-dark-icon');
        const lightIcon = document.getElementById('theme-toggle-light-icon');

        function enableDarkMode() {
            document.documentElement.classList.add('dark');
            localStorage.setItem('darkmode', 'enabled');
            darkIcon.classList.add('hidden');
            lightIcon.classList.remove('hidden');
        }

        function disableDarkMode() {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('darkmode', 'disabled');
            darkIcon.classList.remove('hidden');
            lightIcon.classList.add('hidden');
        }

        // Check the current theme preference in localStorage
        if (localStorage.getItem('darkmode') === 'enabled') {
            enableDarkMode();
        } else {
            disableDarkMode();
        }

        themeToggleBtn.addEventListener('click', () => {
            if (localStorage.getItem('darkmode') !== 'enabled') {
                enableDarkMode();
            } else {
                disableDarkMode();
            }
        });
    });
</script>
    </body>
</html>
