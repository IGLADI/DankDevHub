@extends('layouts.app')

@section('content')
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
@endsection