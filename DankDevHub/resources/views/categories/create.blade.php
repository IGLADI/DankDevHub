@extends('layouts.app')

@section('content')
    @auth
    <h1>Create New Thread</h1>
    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name">Thread Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
        <br>
        <br>
        <button type="submit">Create Thread</button>
    </form>
    @else
        <h1>You must be logged in to view this page.</h1>
    @endauth
@endsection
