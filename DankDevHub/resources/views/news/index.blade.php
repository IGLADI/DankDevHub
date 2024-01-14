@extends('layouts.app')

@section('content')
    @auth
    <h1>Latest News</h1>

    @foreach($newsItems as $newsItem)
        <div class="news-item">
            <h2>{{ $newsItem->title }}</h2>
            @if ($newsItem->cover_image)
                <img src="{{ asset('storage/' . $newsItem->cover_image) }}" alt="{{ $newsItem->title }}" style="max-width: 300px;">
            @endif
            <p>{{ $newsItem->content }}</p>
            <p>Publishing Date: {{ $newsItem->created_at }}</p>
                @if(auth()->user()->isAdmin())
                    <div class="news-item-actions">
                        <!-- shocase a different confirm for deleting posts here, in a normal situation I would ask my client what he prefers this or the new page with confirmation -->
                        <form method="post" action="{{ route('news.destroy', ['id' => $newsItem->id]) }}" onsubmit="return confirm('Are you sure you want to delete this news item?');">
                            <a href="{{ route('news.edit', ['id' => $newsItem->id]) }}">Edit News Item</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Delete News Item</button>
                        </form>
                    </div>
                @endif
        </div>
    @endforeach

        @if(auth()->user()->isAdmin())
            <a href="{{ route('news.create') }}">Create News</a>
        @endif
    @else
        <h1>You must be logged in to view this page.</h1>
    @endauth
@endsection
