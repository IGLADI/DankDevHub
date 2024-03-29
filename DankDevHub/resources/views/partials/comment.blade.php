<p><strong><a href="{{ route('users.show', ['user' => $comment->user_id]) }}">{{ $comment->user->name }}</a></strong>: {{ $comment->content }}</p>
<br>
@auth
@if (Auth::id() === $post->user_id || Auth::user()->isAdmin())
<form method="post" action="{{ route('category.posts.comments.destroy', ['category' => $category->id, 'post' => $post->id, 'comment' => $comment->id]) }}" onsubmit="return confirm('Are you sure you want to delete this comment?');">
    <a href="{{ route('category.posts.comments.edit', ['category' => $category->id, 'post' => $post->id, 'comment' => $comment->id]) }}">Edit Comment</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="alert">Delete Comment</button>
    </form>
@endif
    <form method="POST" action="{{ route('category.posts.comments.store', ['category' => $category->id, 'post' => $post->id, 'parentComment' => $comment->id]) }}" enctype="multipart/form-data">
        @csrf
        <label for="content">Add Reply:</label>
        <input type="text" id="content" name="content" required>
        <button type="submit">Add Reply</button>
    </form>
@endauth

@foreach ($comment->comments as $nestedComment)
    <div style="margin-left: 20px;">
        @include('partials.comment', ['comment' => $nestedComment, 'parentCommentId' => $comment->id])
    </div>
@endforeach

<br>
