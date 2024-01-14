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
            <li><a href="{{ route('categories.index') }}">Forum</a></li>
            <li><a href="{{ route('faq.index') }}">FAQ</a></li>
            <li><a href="{{ route('contact.show') }}">Contact</a></li>
            <li><a href="{{ route('welcome') }}">Profile</a></li>
            <!-- for dev, no confirm on logout, could be changed in prod -->
            <li><a href="{{ route('logout') }}">Logout</a></li>
            <li><a href="{{ route('news') }}">Latest News</a></li>
            @endguest
            <li><a href="{{ route('about') }}">About</a></li>
        </ul>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
        @endif
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        @yield('content')
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
