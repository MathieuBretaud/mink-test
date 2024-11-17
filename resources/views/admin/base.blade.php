<!doctype html>
<html data-theme="light" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') | Administration </title>
</head>
<body>
<div class="container mx-auto mt-4">
    @yield('content')
</div>
</body>
</html>
