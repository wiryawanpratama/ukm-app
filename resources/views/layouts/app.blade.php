<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi UKM')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Aplikasi UKM</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a></li>
                        <li class="nav-item"><a href="{{ route('ukm.index') }}" class="nav-link">UKM</a></li>
                        <li class="nav-item"><a href="{{ route('anggota.index') }}" class="nav-link">Anggota</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-danger ms-2">Logout</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Content Section --}}
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>