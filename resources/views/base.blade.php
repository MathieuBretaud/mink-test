<!doctype html>
<html data-theme="light" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') | Mink-test </title>
</head>
<body>

@include('shared.navbar')

<div class="flex-grow container mx-auto px-4 py-8" id="app">

    @yield('content')
</div>
</body>
</html>
