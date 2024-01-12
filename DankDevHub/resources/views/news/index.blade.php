    @extends('layouts.app')

    @section('content')
        <h1>Latest News</h1>

        @foreach($newsItems as $newsItem)
            <div class="news-item">
                <h2>{{ $newsItem->title }}</h2>
                @if ($newsItem->cover_image)
                    <img src="{{ asset('storage/' . $newsItem->cover_image) }}" alt="{{ $newsItem->title }}" style="max-width: 300px;">
                @endif
                <p>{{ $newsItem->content }}</p>
                <p>Publishing Date: {{ $newsItem->created_at }}</p>
                @auth
                    @if(auth()->user()->isAdmin())
                        <div class="news-item-actions">
                            <a href="{{ route('news.edit', ['id' => $newsItem->id]) }}">Edit</a><br><br>
                            <!-- shocase a different confirm for deleting posts here, in a normal situation I would ask my client what he prefers this or the new page with confirmation -->
                            <form method="post" action="{{ route('news.destroy', ['id' => $newsItem->id]) }}" onsubmit="return confirm('Are you sure you want to delete this news item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach

        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('news.create') }}">Create News</a>
            @endif
        @endauth

    @endsection
