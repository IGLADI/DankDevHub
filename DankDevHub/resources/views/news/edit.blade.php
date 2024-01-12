@extends('layouts.app')

@section('content')
    @if(auth()->user()->isAdmin())
        <h1>Edit News</h1>

        <form method="POST" action="{{ route('news.update', ['id' => $newsItem->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $newsItem->title }}"><br>
            <input type="text" name="content" value="{{ $newsItem->content }}"></input><br>
            <input type="file" name="cover_image"><br><br>
            <button type="submit">Update</button>
        </form>
    @else
        <h1>Unauthorized</h1>
        <p>You are not authorized to view this page.</p>
    @endif
@endsection