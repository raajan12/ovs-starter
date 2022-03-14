<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') ?? 'Akash' }}</title>

    {{-- Icons --}}

    <!-- CSS only -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: #e0e3e6;">
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(20, 170, 113);">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"> {{ config('app.name') ?? 'OVS' }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/myvotes') }}" class="nav-link">My Vote History</a>
                        </li>
                    @endauth

                </ul>
                <div class="d-flex">
                    @auth
                        <div class="dropdown flex-shrink-0">
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="mdo"
                                    width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1"
                                style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34px);">
                                <li class=" border-b-2">
                                    <p class="text-center mx-2">{{ auth()->user()->name }}</p>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="nav-link px-2 link-secondary">Login</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link px-2 link-secondary">Register</a>
                        @endif

                    @endauth
                </div>
            </div>
        </div>
    </nav>


    <div class="  m-3 rounded p-2 ">
        @yield('content')
    </div>
</body>

</html>
