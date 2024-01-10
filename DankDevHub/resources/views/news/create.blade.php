@extends('layouts.app')

@section('content')
    <h1>Create News</h1>

    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title"><br>
        <input type="file" name="cover_image"><br>
        <textarea name="content" placeholder="Content"></textarea><br>
        <button type="submit">Submit</button>
    </form>
@endsection
