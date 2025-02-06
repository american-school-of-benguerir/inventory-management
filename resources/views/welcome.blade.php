<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/fqvi.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <title>{{ config('app.name', 'Inventory managamenet') }}</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/css/theme.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/11c0589eb4.js" crossorigin="anonymous"></script>

    <script>
        // Dark mode toggle
        function toggleDarkMode() {
            const htmlClasses = document.documentElement.classList;
            const themeIcon = document.getElementById('theme-icon');
            const darkLogo = document.getElementById('dark-logo');
            const lightLogo = document.getElementById('light-logo');

            if (htmlClasses.contains('dark')) {
                htmlClasses.remove('dark');
                localStorage.theme = 'light';
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
                darkLogo.style.display = 'none';
                lightLogo.style.display = 'block';
            } else {
                htmlClasses.add('dark');
                localStorage.theme = 'dark';
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
                darkLogo.style.display = 'block';
                lightLogo.style.display = 'none';
            }
        }

        // Initial check for theme on load
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            document.addEventListener('DOMContentLoaded', () => {
                const themeIcon = document.getElementById('theme-icon');
                const darkLogo = document.getElementById('dark-logo');
                const lightLogo = document.getElementById('light-logo');

                themeIcon.classList.add('fa-moon');
                darkLogo.style.display = 'block';
                lightLogo.style.display = 'none';
            });
        } else {
            document.documentElement.classList.remove('dark');
            document.addEventListener('DOMContentLoaded', () => {
                const themeIcon = document.getElementById('theme-icon');
                const darkLogo = document.getElementById('dark-logo');
                const lightLogo = document.getElementById('light-logo');

                themeIcon.classList.add('fa-sun');
                darkLogo.style.display = 'none';
                lightLogo.style.display = 'block';
            });
        }
    </script>

</head>

<body class="min-h-screen flex flex-col bg-[#d1d1d1] dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Navbar -->
    <header class="bg-[#ebe7e4] dark:bg-[#262F3F] shadow-md py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center">
                <img id="light-logo" src="{{ asset('images/Asb-Logo-Website-1.png') }}" class="h-10" alt="Light Logo" style="display: none;">
                <img id="dark-logo" src="{{ asset('images/Asb-Logo-Website-1.png') }}" class="h-10" alt="Dark Logo" style="display: none;">
            </a>
            <nav class="flex items-center gap-6">
                <a href="" class="text-lg hover:text-[#4b776d] dark:hover:text-[#8576ff]">About Us</a>
                <a href="" class="text-lg hover:text-[#4b776d] dark:hover:text-[#8576ff]">Services</a>
                <a href="" class="text-lg hover:text-[#4b776d] dark:hover:text-[#8576ff]">Contact</a>
            </nav>
            <button id="theme-toggle" class="focus:outline-none" onclick="toggleDarkMode()">
                <i id="theme-icon" class='text-xl fa-solid'></i>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="cta-section bg-[#6ca296] dark:bg-[#8576ff] py-10 text-center text-white">
        <p>&copy; 2024 Orvo. All Rights Reserved.</p>
    </footer>

    <!-- Scripts -->
    @vite('resources/js/libs/jquery/dist/jquery.min.js')
    @vite('resources/js/libs/simplebar/dist/simplebar.min.js')
    @vite('resources/js/libs/iconify-icon/dist/iconify-icon.min.js')
    @vite('resources/js/libs/@preline/dropdown/index.js')
    @vite('resources/js/libs/@preline/overlay/index.js')

    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: '{{ $errors->first() }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>
</body>

</html>
