<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal z ofertami pracy</title>
    <link rel="icon" href="favicon.ico" />
    <script src="{{ asset('js/alpine.js')}}" defer></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
    </script> --}}
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css')}}">
    {{--<link rel="stylesheet" href="{{ asset('css/original.bootstrap.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body class="mb-12r">
    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-between items-center mb-3">
        <a href="/">
            <img class="w-6r" src="{{asset('images/logo.png')}}" alt="" class="logo" />
        </a>
        <ul class="d-flex ms-4 me-4 text-lg list-item-no-symbol">
            @auth()
            <li class="nav-item">
                <span class=" fw-bold text-uppercase">
                    Witaj {{auth()->user()->name}}
                </span>
            </li>
            <li class="nav-item">
                <a href="/listings/manage" class="nav-link ms-4 pl-5 hover:text-php">
                    <i class="fa-solid fa-gear"></i> Zarządzanie ogłoszeniami
                </a>
            </li>
            <li class="nav-item bg-white">
                <form class="d-inline ms-2 hover:text-php" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="bg-white hover:text-php">
                        <i class="fa-solid fa-door-closed"></i> Wyloguj
                    </button>
                </form>
            </li>
            @else
            <li class="nav-item">
                <a href="/register" class="nav-link hover:text-php">
                    <i class="fa-solid fa-user-plus"></i>
                    Rejestracja
                </a>
            </li>
            <li class="nav-item">
                <a href="/login" class="nav-link ms-4 pl-5 hover:text-php">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Logowanie
                </a>
            </li>
            @endauth
        </ul>
    </nav>
    {{-- tutaj będą widoki --}}
    <main>
        {{-- @yield('content') --}}
        {{$slot}}
    </main>

    <footer class="position-fixed bottom-0 start-0 w-100 d-flex items-center justify-flex-start 
        fw-bold bg-php text-white h-6r mt-6r opacity-90 justify-content-center-md">
        <p class="ms-2">Copyright &copy; 2023, All Rights reserved</p>
        <a href="/listings/create" class="position-absolute top-1/3 right-10 
        bg-black text-white py-2 px-3 hover:text-php">
            Opublikuj ofertę pracy
        </a>
    </footer>

    <x-flash-message />
</body>

</html>