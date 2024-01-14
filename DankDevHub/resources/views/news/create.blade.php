@extends('layouts.app')

@section('content')
@auth
    @if(auth()->user()->isAdmin())
        <h1>Create News</h1>

        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title"><br>
            <input type="text" name="content" placeholder="Content"></input><br>
            <input type="file" name="cover_image"><br><br>
            <button type="submit">Submit</button>
        </form>
    @else
        <h1>Unauthorized</h1>
        <p>You are not authorized to view this page.</p>
    @endif
    @else
        <h1>You must be logged in to view this page.</h1>
    @endauth
@endsection
