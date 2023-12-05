<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    @livewireStyles
    @livewireScripts
</head>

<body class="bg-gray-100">
    <div class="p-2 bg-indigo-600 shadow-md">
        <h1 class="text-2xl md:text-3xl text-white font-bold text-center">
            Lara Blog Administration
        </h1>
    </div>
    <div class="container mx-auto bg-white rounded-lg">
        <div class="flex justify-between text-lg md:text-xl lg:text-2xl p-3 m-3 ">

            <ul class="flex gap-10">
                <li class= "hover: hover:text-indigo-600 rounded-md"><a
                        href="{{ Route('admin_overview') }}">Overview</a>
                </li>
                <li class= "hover: hover:text-indigo-600 rounded-md"><a href="{{ Route('admin_users') }}">Users</a></li>
                <li class= "hover: hover:text-indigo-600 rounded-md"><a href="{{ Route('admin_blogs') }}">Blogs</a></li>
            </ul>
            <ul class="flex gap-10">
                <li class= "hover: hover:text-indigo-600 rounded-md"><a href="{{ Route('home') }}">Home</a></li>
                <li class= "hover: hover:text-indigo-600 rounded-md"><a href="http://">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="container mx-auto">
        @yield('content')
    </div>

    @livewire('wire-elements-modal')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>
