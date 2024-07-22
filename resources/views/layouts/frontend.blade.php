{{-- resources/views/layouts/frontend.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Blog')</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Additional Scripts or Styles -->
    @yield('styles')
</head>
<body class="dark:bg-gray-900 bg-white">
<div class="antialiased bg-gray-50 dark:bg-gray-900">
    @include('frontend.components.navbar')

    <main class="p-4">
        <div class="container mx-auto p-4">
            @yield('content')
        </div>
    </main>

    @include('frontend.components.footer')
</div>

<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

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

