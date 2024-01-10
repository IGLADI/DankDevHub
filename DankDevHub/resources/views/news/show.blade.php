@extends('layouts.app')

@section('content')
    <h1>{{ $newsItem->title }}</h1>
    <img src="{{ $newsItem->cover_image }}" alt="{{ $newsItem->title }}" style="max-width: 500px;">
    <p>{{ $newsItem->content }}</p>
    <p>Publishing Date: {{ $newsItem->publishing_date }}</p>

@endsection
