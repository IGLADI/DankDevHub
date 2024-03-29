@extends('layouts.app')

@section('content')
@auth
    @if(auth()->user()->isAdmin())
        <h1>Edit FAQ Question</h1>

        <form method="POST" action="{{ route('faq-questions.update', ['faq_question' => $faqQuestion->id]) }}">
            @csrf
            @method('PUT')
            <select name="faq_category_id">
                @foreach($faqCategories as $category)
                    <option value="{{ $category->id }}" {{ $faqQuestion->faq_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select><br><br>
            <input type="text" name="question" value="{{ $faqQuestion->question }}"><br>
            <button type="submit">Update</button>
        </form>
    @else
        <h1>Unauthorized</h1>
        <p>You are not authorized to view this page.</p>
    @endif
@else
    <h1>You must be logged in to view this page.</h1>
@endauth
@endsection