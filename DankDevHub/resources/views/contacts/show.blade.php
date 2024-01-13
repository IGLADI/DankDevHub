@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <p>Contact US</p>
        <label>Message</label>
        <input type="text" tabindex="0" aria-label="leave a message" role="textbox" name="content"></input>
        <br>
        <br>
        <button>SUBMIT</button>
    </form>
@endsection
