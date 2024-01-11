@extends('layouts.app')

@section('content')
    <h1>Create Post in {{ $category->name }}</h1>
    <form method="POST" action="{{ route('category.posts.store', ['category' => $category->id]) }}" enctype="multipart/form-data">
        @csrf
        <label for="title">Post Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="content">Content:</label>
        <textarea id="content" name="content"></textarea>
        <label for="image">Image (optional):</label>
        <input type="file" id="image" name="image">
        <button type="submit">Create Post</button>
    </form>
@endsection
