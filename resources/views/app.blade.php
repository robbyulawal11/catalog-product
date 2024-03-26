<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <header class="container">
        @include('partials.navbar')
    </header>
    <main class="container" style="min-height: 100vh">
        @yield('content')
    </main>
    @include('partials/footer')
</body>

</html>
