<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/fqvi.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <title>{{ config('app.name', 'Orvo') }}</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/css/theme.css')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/11c0589eb4.js" crossorigin="anonymous"></script>

    <script>
        // Dark mode toggle with icon switch
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
@php
    $user = Auth::user();
@endphp
<body class="bg-[#d1d1d1] dark:bg-gray-900 text-gray-800 bg-surface dark:text-gray-200 min-h-screen flex flex-col">
    <main>
        <!--start the project-->
        <div id="main-wrapper " class=" flex p-5 xl:pr-0 min-h-screen">
            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full dark:bg-[#262F3F] transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-[#ebe7e4] left-sidebar   transition-all duration-300">
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="p-4">

                    <a href="../" class="text-nowrap flex justify-center items-center">
                        <img id="dark-logo" src="{{ asset('images/logo.png') }}" class="block w-18 h-16" alt="Dark Mode Logo" style="display: none;">
                        <img id="light-logo" src="{{ asset('images/logo.png') }}" class="block w-18 h-16" alt="Light Mode Logo" style="display: none;">
                    </a>


                </div>
                <div class="scroll-sidebar" data-simplebar="">
                    <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
                        <ul id="sidebarnav" class="text-sm">
                            <li class="text-xs font-bold pb-[5px]">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs font-semibold">HOME</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative rounded-md  w-full {{ Request::is('dashboard') ? 'active' : '' }}""
                                    href="{{ route('dashboard') }}">
                                    <i class="fa-solid fa-border-all pstypes-2  text-2xl"></i> <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="text-xs font-bold mb-4 mt-6">
                                <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                                <span class="text-xs font-semibold">Menu</span>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md  w-full {{ Request::is('types') ? 'active' : '' }}"
                                    href="{{ route('types.index') }}">
                                    <i class="fa-solid fa-laptop-file ps-2 text-2xl"></i> <span>Types</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md  w-full {{ Request::is('devices') ? 'active' : '' }}"
                                    href="{{ route('devices.index') }}">
                                    <i class="fa-solid fa-desktop ps-2 text-2xl"></i> <span>Devices</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- </aside> -->
            </aside>
            <div class=" w-full page-wrapper xl:px-6 px-0">

                <!-- Main Content -->
                <main class="h-full  max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <!--  Header Start -->
                        <header class=" bg-[#ebe7e4] dark:bg-[#262F3F] shadow-md rounded-md w-full text-sm py-4 px-6">
                            <!-- ========== HEADER ========== -->
                            <nav class=" w-ful flex items-center justify-between" aria-label="Global">
                                <ul class="icon-nav flex items-center gap-4">
                                    <li class="relative xl:hidden">
                                        <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                                            data-hs-overlay="#application-sidebar-brand"
                                            aria-controls="application-sidebar-brand" aria-label="Toggle navigation"
                                            href="javascript:void(0)">
                                            <i class="fa-solid fa-bars"></i>
                                        </a>
                                    </li>
                                    <li class="relative ">
                                        <div
                                            class="hs-dropdown  relative inline-flex [--placement:bottom-left] sm:[--trigger:hover] ">
                                            <a class="relative hs-dropdown-toggle inline-flex hover:text-gray-500 "
                                                href="#">
                                                <i class="fa-solid fa-bell"></i>
                                                <div
                                                    class="absolute inline-flex items-center justify-center   text-[11px] font-medium  bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]">
                                                </div>
                                            </a>
                                            <div class="card dark:bg-gray-700 hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[300px] hidden z-[12]"
                                                aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                <div>
                                                    <h3 class=" font-semibold text-base px-6 py-3">
                                                        Notification</h3>
                                                    <ul class="list-none  flex flex-col">
                                                        <li>
                                                            <a href="#"
                                                                class="py-3 px-6 block hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                                <p class="text-sm font-medium">Roman
                                                                    Joined the Team!</p>
                                                                <p class="text-xs font-medium">
                                                                    Congratulate him</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="py-3 px-6 block hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                                <p class="text-sm font-medium">New
                                                                    message received</p>
                                                                <p class="text-xs font-medium">Salma sent
                                                                    you new message</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="py-3 px-6 block hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                                <p class="text-sm font-medium">New
                                                                    Payment received</p>
                                                                <p class="text-xs font-medium">Check your
                                                                    earnings</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="py-3 px-6 block hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                                <p class="text-sm font-medium">Jolly
                                                                    completed tasks</p>
                                                                <p class="text-xs font-medium">Assign her
                                                                    new tasks</p>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#"
                                                                class="py-3 px-6 block hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                                <p class="text-sm font-medium">Roman
                                                                    Joined the Team!</p>
                                                                <p class="text-xs font-medium">
                                                                    Congratulate him</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                                <div class="flex items-center gap-4">
                                    <button id="theme-toggle" class="focus:outline-none" onclick="toggleDarkMode()">
                                        <i id="theme-icon" class='text-xl fa-solid'></i>
                                    </button>
                                    <div
                                        class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                                        <a
                                            class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                                            <span class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-500 text-white font-bold text-sm">
                                                {{ strtoupper(substr($user->name, 0, 1)) }}
                                            </span>
                                        </a>
                                        <div class="card dark:bg-gray-700 hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                            <div class="card-body  p-0 py-2">
                                                <a href=""
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                    <i class="ti ti-user  text-xl "></i>
                                                    <p class="text-sm ">My Profile</p>
                                                </a>
                                                <a href=""
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                    <i class="ti ti-mail  text-xl"></i>
                                                    <p class="text-sm ">My Account</p>
                                                </a>
                                                <a href=""
                                                    class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-[#e4ebeb] dark:hover:bg-[#8576ff]">
                                                    <i class="ti ti-list-check  text-xl "></i>
                                                    <p class="text-sm ">My Task</p>
                                                </a>
                                                <div class="px-4 mt-[7px] grid">
                                                    <form action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button class="text-base font-semibold hover:bg-blue-700 btn" type="submit">Log out</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </nav>

                            <!-- ========== END HEADER ========== -->
                        </header>
                        <!--  Header End -->
                        @yield('content')
                    </div>

            </div>
        </div>
        <!--end of project-->
    </main>
    <script>

    </script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                timer: 2000
            });
        @endif
    </script>
    <script>
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: '{{ $errors->first() }}', // Display the first error message
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>

    @vite('resources/js/libs/jquery/dist/jquery.min.js')
    @vite('resources/js/libs/simplebar/dist/simplebar.min.js')
    @vite('resources/js/libs/iconify-icon/dist/iconify-icon.min.js')
    @vite('resources/js/libs/@preline/dropdown/index.js')
    @vite('resources/js/libs/@preline/overlay/index.js')
    @vite('resources/js/sidebarmenu.js')




</body>

</html>
