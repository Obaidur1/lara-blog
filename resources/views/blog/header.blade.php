<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Blog Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body style="font-family: Montserrat" class="bg-white">


    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-5">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-4xl" href="{{ route('home') }}">
                Lara Blog
            </a>
        </div>
    </header>
    <!-- Topic Nav -->
    <nav class="w-full py-1 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#"
                class="md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block' : 'hidden'" class="container flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="container mx-auto flex flex-col sm:flex-row items-center justify-center text-md font-bold  mt-0 px-6 py-1">
                <a href="/category/technology" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Technology</a>
                <a href="/category/automotive" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
                <a href="/category/finance" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Finance</a>
                <a href="/category/politics" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Politics</a>
                <a href="/category/culture" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Culture</a>
                <a href="/category/sports" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Sports</a>
                <div class="flex flex-wrap justify-center">
                    @auth
                        <a href="{{ Route('dashboard') }}"
                            class="hover:text-white  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm w-fit  px-5 py-2.5 text-center"><i
                                class="fas fa-arrow-right"></i> Dashboard
                        </a>
                    @endauth
                    @guest
                        <a href="{{ Route('login') }}"
                            class="hover:text-white  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  rounded-lg text-sm w-fit  px-5 py-2.5 text-center"><i
                                class="fas fa-arrow-right"></i> Login</a>
                    @endguest

                </div>
            </div>

        </div>
    </nav>
