@extends('layouts.app')

@section('content')
@auth
    <h1>{{ $faqCategory->name }}</h1>

    @foreach ($faqQuestions as $question)
        <h3>Q: {{ $question->question }}</h3>
        <p>A: {{ $question->answer }}</p>

        @if(auth()->user()->isAdmin())
            <!-- following requirements the admin can edit everyones questions??? -->
            <form method="POST" action="{{ route('faq-questions.destroy', ['faq_question' => $question->id]) }}" onsubmit="return confirm('Are you sure you want to delete this question?');">
                <a href="{{ route('faq-questions.edit', ['faq_question' => $question->id]) }}">Edit Question</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Delete Question</button>
            </form>
            <form method="POST" action="{{ route('faq-questions.answer', ['faq_question' => $question->id]) }}">
                @csrf
                <input type="text" name="answer" placeholder="Your answer...">
                <button type="submit">Answer</button>
            </form>
            @if($question->is_faq == 0)
                <form method="POST" action="{{ route('faq-questions.promote', ['faq_question' => $question->id]) }}">
                    @csrf
                    <button type="submit">Pin Question</button>
                </form>
            @else
                <form action="{{ route('faq-questions.demote', ['faq_question' => $question->id]) }}" method="post">
                    @csrf
                    <button type="submit">Unpin Question</button>
                </form>
            @endif
        @endif

    @endforeach

    <a href="{{ route('faq-questions.create') }}">Add New Question</a>
@else
    <h1>You must be logged in to view this page.</h1>
@endauth
@endsection
