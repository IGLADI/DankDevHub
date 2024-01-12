@extends('layouts.app')

@section('content')
    <div class="registration-login-form">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <!-- can both be email/username -->
                <input type="text" name="login" placeholder="login" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>

            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    <div class="hint-text">Don't have an account? <a href="{{ route('register') }}">Register here</a></div><br>
    <div class="hint-text">Forgot your password? <a href="{{ route('password.request') }}">Reset password</a></div>
@endsection
