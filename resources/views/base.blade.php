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
        <a class="btn btn-ghost text-xl">Mink-test</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li><a>Connexion</a></li>
        </ul>
    </div>
</div>
<div class="container mx-auto mt-4" id="app">

    @yield('content')
</div>
</body>
</html>
