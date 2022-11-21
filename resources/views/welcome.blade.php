<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.jpg" type="image/x-jpg">

    <title>Laravel</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="antialiased bg-gray-100">
    <div class="page d-flex">
        {{-- Start Sidebar  --}}
        <div class="sidebar bg-white p-10  p-relative">
            <h3 class="p-relative txt-c mt-0"></h3>
            <ul>
                <li>
                    <a class="d-flex justify-start align-center fs-14 c-black rad-6 p-10 
                    {{ 'tasks' == request()->path() ? 'active' : '' }}"
                        href="/">
                        <i class="fa-regular fa-chart-bar fa-fw"></i>
                        <span class="sidebarspan">Projects</span>
                    </a>
                </li>

                <li>
                    <a class="d-flex justify-start align-center fs-14 c-black rad-6 p-10
                        {{ 'projects/create' == request()->path() ? 'active' : '' }}"
                        href="/projects/create">
                        <i class=" fa-solid fa-folder-plus"></i>
                        <span class="sidebarspan">Add Project</span>
                    </a>
                </li>
            </ul>
        </div>
        {{-- end Sidebar --}}
        {{-- Start Content --}}
        <div class="content w-full">
            <!-- Start Head -->
            <div class="head bg-white p-15 between-flex">
                <div class="search p-relative">
                    <form action="">
                        <input class="p-10" type="text" name="search" placeholder="Type A Keyword" />


                        <button class="search-icon" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>

                </div>
                <div class="icons d-flex align-center">
                </div>
            </div>
            <!-- End Head -->
            @yield('content')
        </div>
        {{-- End Content --}}
    </div>
</body>
</html>
