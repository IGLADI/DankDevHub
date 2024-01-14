@extends('layouts.app')

@section('content')
@auth
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <h2>Contact US</h2>
        <label>Message</label>
        <input type="text" tabindex="0" aria-label="leave a message" role="textbox" name="content"></input>
        <br>
        <br>
        <button>SUBMIT</button>
    </form>
@else
    <h1>You must be logged in to view this page.</h1>
@endauth
@endsection
