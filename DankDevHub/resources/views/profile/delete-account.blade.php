@extends('layouts.app')

@section('content')
    @if(auth()->user()->isAdmin())
        <h1>Unauthorized</h1>
        <p>For security reasons, you cannot delete an admin account.</p>
    @else
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
    @endif
@endsection
