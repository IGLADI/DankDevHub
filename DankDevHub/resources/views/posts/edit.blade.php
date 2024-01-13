@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('category.posts.update', ['category' => $category->id, 'post' => $post->id]) }}" enctype="multipart/form-data">
        @csrf

        <label for="title">Post Title:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        <label for="content">Post Content:</label>
        <input type="text" id="content" name="content">{{ $post->content }}</input>
        <label for="image">Post Image (optional):</label>
        <input type="file" id="image" name="image">
        <button type="submit">Update Post</button>
    </form>
@endsection
