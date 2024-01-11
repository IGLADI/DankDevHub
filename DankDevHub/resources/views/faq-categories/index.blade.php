@extends('layouts.app')

@section('content')
    <h1>FAQ</h1>
    @foreach ($faqCategories as $category)
        <h2>{{ $category->name }}</h2>
        <ul>
            @foreach ($category->faqQuestions()->where('is_faq', true)->get() as $question)
                <li>
                    <h3>Q: {{ $question->question }}</h3>
                    <p>A: {{ $question->answer }}</p>
                </li>
                @if(auth()->user()->isAdmin())
                    <form method="POST" action="{{ route('faq-questions.destroy', ['faq_question' => $question->id]) }}">
                        <a href="{{ route('faq-questions.edit', ['faq_question' => $question->id]) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger">Delete</button>
                    </form>
                    <form method="POST" action="{{ route('faq-questions.answer', ['faq_question' => $question->id]) }}">
                        @csrf
                        <input type="text" name="answer" placeholder="Your answer...">
                        <button type="submit">Answer</button>
                    </form>
                    <form action="{{ route('faq-questions.demote', ['faq_question' => $question->id]) }}" method="post">
                        @csrf
                        <button type="submit">Remove from FAQ</button>
                    </form>
                @endif
            @endforeach
            </ul>
            @if(auth()->user()->isAdmin())
                <form method="POST" action="{{ route('faq-categories.edit', ['faq_category' => $category->id]) }}">
                    @csrf
                    <button type="submit">Edit Category</button>
                </form>
                <form method="POST" action="{{ route('faq-categories.delete', ['faq_category' => $category->id]) }}">
                    @csrf
                    <button type="submit" class="btn-danger">Delete Category</button>
                </form>
            @endif
            <a href="{{ route('faq-categories.show', ['faq_category' => $category->id]) }}">View All Questions</a>
            @endforeach
            @if(auth()->user()->isAdmin())
                <br>
                <br>
                <br>
                <a href="{{ route('faq-categories.create') }}">Create FAQ Category</a>
            @endif
@endsection
