@extends('layouts.app')

@section('content')
<div class="registration-login-form">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
            </div>

            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
    </form>
    <div class="hint-text">Already have an account? <a href="{{ route('login') }}">Login here</a></div>
</div>
@endsection
