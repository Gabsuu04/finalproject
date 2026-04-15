<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'School Management') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">School</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('subjects.index') }}">Subjects</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('programs.index') }}">Programs</a></li>
                    @if(auth()->user()->account_type === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="{{ route('password.edit') }}">Change Password</a></li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <div class="text-white small">
                        {{ auth()->user()->username }} ({{ ucfirst(auth()->user()->account_type) }})
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        @include('partials.alerts')
        @yield('content')
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
