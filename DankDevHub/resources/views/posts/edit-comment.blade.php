
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Comment</h1>
        <form action="{{ route('comments.update', ['category' => $category, 'post' => $post, 'comment' => $comment->id]) }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" id="content" name="content" rows="3" value="{{ $comment->content }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Comment</button>
        </form>
    </div>
@endsection
