@extends('layouts.app')

@section('content')
    @auth
    <h1>Create FAQ Question</h1>

    <form method="POST" action="{{ route('faq-questions.store') }}">
        @csrf
        <select name="faq_category_id">
            @foreach($faqCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>
        <input type="text" name="question" placeholder="Question"><br><br>
        <button type="submit">Create</button>
    </form>
    @else
        <h1>You must be logged in to view this page.</h1>
    @endauth
@endsection