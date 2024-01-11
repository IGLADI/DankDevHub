@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <p>Contact US</p>
        <label>Message</label>
        <textarea tabindex="0" aria-label="leave a message" role="textbox" name="content"></textarea>
        <br>
        <br>
        <button>SUBMIT</button>
    </form>
@endsection
