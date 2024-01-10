@extends('layouts.app')

@section('content')
    <h1>Edit News</h1>

    <form method="POST" action="{{ route('news.update', ['id' => $newsItem->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $newsItem->title }}"><br>
        <input type="file" name="cover_image"><br>
        <textarea name="content">{{ $newsItem->content }}</textarea><br>
        <button type="submit">Update</button>
    </form>
@endsection