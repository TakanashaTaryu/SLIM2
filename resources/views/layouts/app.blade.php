<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Management')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="@yield('body_class')">
    @include('components.navbar')

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <footer class="text-center py-4">
        <p>&copy; 2024 School Management System</p>
    </footer>
</body>
</html>
