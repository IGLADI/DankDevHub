@extends('profile.default')

@section('profile-content')
@if (auth()->user()->id === $user->id)
<a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
<a href="{{ route('profile.delete-account') }}" class="btn-danger">Delete Account</a>
    @endif
@endsection
