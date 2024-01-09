<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>DankDevHub</title>
</head>
<body>

    <nav>
        <ul>
            @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @else
            <li><a href="{{ route('welcome') }}">Profile</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
            <li><a href="{{ route('profile.delete-account') }}">Delete Account</a></li>
            @endguest
            <li><a href="{{ route('about') }}">About</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
