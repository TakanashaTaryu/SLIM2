<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-gray-800 text-white py-3">
    <div class="container mx-auto flex justify-between">
        <a href="{{ url('/') }}" class="text-lg font-bold">School System</a>
        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}" class="mr-4">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</nav>
