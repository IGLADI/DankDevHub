@extends('layouts.app')

@section('content')
    @if(auth()->user()->isAdmin())
        <h1>Edit FAQ Category</h1>

        <form method="POST" action="{{ route('faq-categories.update', ['faq_category' => $faqCategory->id]) }}">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $faqCategory->name }}"><br><br>
            <button type="submit">Update</button>
        </form>
    @else
        <h1>Unauthorized</h1>
        <p>You are not authorized to view this page.</p>
    @endif
@endsection