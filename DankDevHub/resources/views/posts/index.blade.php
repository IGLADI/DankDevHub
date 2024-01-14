@extends('layouts.app')

@section('content')
@auth
    <h1>{{ $category->name }} Posts</h1>
    <?php $i=0; ?>
    <ul>
        @foreach ($posts as $post)
        <?php @$i++; ?>
        <li>
            <h3>{{ $post->title }}</h3>
            <p>By: <a href="{{ route('users.show', ['user' => $post->user_id]) }}">{{ $users[$i-1]->name }}</a></p>
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 300px;">
            @endif
            <p>{{ $post->content }}</p>
                @if (Auth::id() === $post->user_id || Auth::user()->isAdmin())
                <!-- shocase a different confirm for deleting posts here, in a normal situation I would ask my client what he prefers this or the new page with confirmation -->
                <form method="post" action="{{ route('category.posts.destroy', ['category' => $category->id, 'post' => $post->id]) }}" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    <a href="{{ route('category.posts.edit', ['category' => $category->id, 'post' => $post->id]) }}">Edit Post</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="alert">Delete Post</button>
                    </form>
                @endif

            <h2>Comments:</h2>
                @foreach ($post->comments as $comment)
                    @include('partials.comment', ['comment' => $comment, 'parentCommentId' => null])
                @endforeach

                    <form method="POST" action="{{ route('category.posts.comments.store', ['category' => $category->id, 'post' => $post->id, 'parentComment' => 0]) }}">
                        @csrf
                        <label for="content">Add Post Comment:</label>
                        <input type="text" id="content" name="content" required>
                        <button type="submit">Add Comment</button>
                    </form>

                <br>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('category.posts.create', ['category' => $category->id]) }}">Create New Post</a>
@else
    <h1>You must be logged in to view this page.</h1>
@endauth
@endsection
