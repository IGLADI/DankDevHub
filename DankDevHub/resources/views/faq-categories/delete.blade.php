@extends('layouts.app')

@section('content')
@auth
    @if(auth()->user()->isAdmin())
        <h1>Delete FAQ Category</h1>
        <p>Are you sure you want to delete this FAQ category?</p>
        <form action="{{ route('faq-categories.destroy', $faqCategory->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    @else
        <h1>Unauthorized</h1>
        <p>You are not authorized to view this page.</p>
    @endif
    @else
        <h1>You must be logged in to view this page.</h1>
    @endauth
@endsection
