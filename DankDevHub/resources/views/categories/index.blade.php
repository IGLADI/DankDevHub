@extends('layouts.app')

@section('content')
    <h1>Threads</h1>
    <ul>
        @foreach ($categories as $category)
            <li class="thread">
                <a href="{{ route('category.posts', ['category' => $category->id]) }}">{{ $category->name }}</a>
                @if ($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" class="icon">
                @endif
                @auth
                    @if (Auth::id() === $category->user_id || Auth::user()->isAdmin())
                    <!-- choosed to not edit threads for preventing abuses but could be added like other edits in faq/posts/... -->
                    <!-- shocase a different confirm for deleting posts here, in a normal situation I would ask my client what he prefers this or the new page with confirmation -->
                        <form method="post" action="{{ route('categories.destroy', ['category' => $category->id]) }}" onsubmit="return confirm('Are you sure you want to delete this thread?');">
                            @csrf
                            @method('DELETE')
                            <br>
                            <button type="submit" class="alert">Delete</button>
                        </form>
                    @endif
                @endauth
            </li>
            <br>
            <br>
        @endforeach
    </ul>

    @auth
        <a href="{{ route('categories.create') }}">Create New Thread</a>
    @endauth
@endsection
