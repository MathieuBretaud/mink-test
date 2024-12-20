<!doctype html>
<html data-theme="light" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') | Administration </title>
</head>
<body>

@include('shared.navbar')
<h1 class="text-2xl text-center">Administration</h1>

<div class="container mx-auto mt-4" id="app">
    @include('shared.flash')

    @yield('content')
</div>
</body>
</html>
