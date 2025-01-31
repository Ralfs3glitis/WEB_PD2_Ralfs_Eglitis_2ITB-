<!doctype html>
<html lang="lv">

<head>
    <meta charset="utf-8">
    <title>Project 2 - {{ $title }}</title>
    <meta name="description" content="Web Technologies Project 2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h2 class="mb-0">Project 2 - {{ $title }}</h2>
                </a>

                <!-- Navbar Toggler (For Mobile) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="/authors">Authors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/books">Books</a>
                               </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/genres">Genres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main class="container">
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="text-bg-dark mt-3">
        <div class="kajene">
            <div class="container">
                <div class="row py-5">
                    <div class="col">
                        R. Eglītis 2ITB, 2025
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
