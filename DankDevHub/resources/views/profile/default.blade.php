@extends('layouts.app')

@section('content')

    <div class="user-profile">
        @if ($user)
            <div class="profile-info">
                <h1>
                @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="profile-picture">
                @endif
                <strong>{{ $user->name }}</strong>
                @if ($user->is_admin)
                    <img src="{{ asset('images/admin.svg') }}" alt="Admin" class="admin-icon">
                @endif
                </h1>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Created:</strong> {{ $user->created_at }}</p>
                @if ($user->birthday)
                    <p><strong>Birthday:</strong> {{ $user->birthday }}</p>
                @endif
                @if ($user->about_me)
                    <p><strong>About Me:</strong> {{ $user->about_me }}</p>
                @endif
                <div class="profile-extra">
                    @yield('profile-content')
                </div>
            </div>
@else
            <p>User profile not found.</p>
        @endif
    </div>

@endsection
