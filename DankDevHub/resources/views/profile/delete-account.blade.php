@extends('layouts.app')

@section('content')
    <div class="card-header">Delete Account</div>

    <div class="card-body">
        <p>Are you sure you want to delete your account? This action cannot be undone.</p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            <br>
            <button type="submit" class="btn btn-danger">
                {{ __('Delete Account') }}
            </button>
        </form>
    </div>
@endsection
