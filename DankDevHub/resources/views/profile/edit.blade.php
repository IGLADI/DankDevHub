@extends('profile.default')

@section('profile-content')
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="edit">
        @csrf
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        <br>
        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" value="{{ $user->birthday }}">
        <br>
        <label for="avatar">Avatar:</label>
        <input type="file" id="avatar" name="avatar" value="{{ $user->avatar }}">
        <br>
        <label for="about-me">About Me:</label>
        <textarea id="about-me" name="about-me" cols="50">{{ $user->about_me }}</textarea>
        <br>

        <button type="submit">Update Profile</button>
    </form>

@endsection
