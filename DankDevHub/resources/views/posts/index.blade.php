@extends('layouts.app')

@section('content')
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
            @auth
                @if (Auth::id() === $post->user_id || Auth::user()->isAdmin())
                <a href="{{ route('category.posts.edit', ['category' => $category->id, 'post' => $post->id]) }}">Edit</a>
                <!-- shocase a different confirm for deleting posts here, in a normal situation I would ask my client what he prefers this or the new page with confirmation -->
                    <form method="post" action="{{ route('category.posts.destroy', ['category' => $category->id, 'post' => $post->id]) }}" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <br>
                        <button type="submit" class="alert">Delete</button>
                    </form>
                @endif
            @endauth
            </li>
        @endforeach
    </ul>

    @auth
        <a href="{{ route('category.posts.create', ['category' => $category->id]) }}">Create New Post</a>
    @endauth
@endsection
