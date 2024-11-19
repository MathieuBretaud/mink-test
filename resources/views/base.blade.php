<!doctype html>
<html data-theme="light" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') | Mink-test </title>
</head>
<body>
<div class="navbar bg-base-300">
    <div class="flex-1">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">Mink-test</a>
    </div>
    @php
        $route = request()->route()->getName();
    @endphp
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li>
                <a href="{{ route('login') }}" @class(['nav-link', 'active' => str_contains($route, 'login')])>Connexion</a>
            </li>
        </ul>
    </div>
</div>
<div class="flex-grow container mx-auto px-4 py-8" id="app">

    @yield('content')
</div>
</body>
</html>
