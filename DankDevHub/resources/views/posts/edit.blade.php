@extends('layouts.app')

@section('content')
@auth
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('category.posts.update', ['category' => $category->id, 'post' => $post->id]) }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Post Title:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        <label for="content">Post Content:</label>
        <input type="text" id="content" name="content" value="{{ $post->content }}">
        <label for="image">Post Image (optional):</label>
        <input type="file" id="image" name="image"><br>
        <button type="submit">Update Post</button>
    </form>
@else
    <h1>You must be logged in to view this page.</h1>
@endauth
@endsection
