@extends('layouts.app')

@section('content')
    @auth
    @if(auth()->user()->isAdmin())
        <h1>Create FAQ Category</h1>

        <form method="POST" action="{{ route('faq-categories.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Category Name"><br><br>
            <button type="submit">Create</button>
        </form>
    @else
        <h1>Unauthorized</h1>
        <p>You are not authorized to view this page.</p>
    @endif
    @else
        <h1>You must be logged in to view this page.</h1>
    @endauth
@endsection