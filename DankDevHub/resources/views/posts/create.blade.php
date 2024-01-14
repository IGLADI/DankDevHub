@extends('layouts.app')

@section('content')
    @auth
    <h1>Create Post in {{ $category->name }}</h1>
    <form method="POST" action="{{ route('category.posts.store', ['category' => $category->id]) }}" enctype="multipart/form-data">
        @csrf
        <label for="title">Post Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="content">Content:</label>
        <input type="text" id="content" name="content"></input>
        <label for="image">Image (optional):</label>
        <input type="file" id="image" name="image"><br>
        <button type="submit">Create Post</button>
    </form>
    @else
        <h1>You must be logged in to view this page.</h1>
    @endauth
@endsection
