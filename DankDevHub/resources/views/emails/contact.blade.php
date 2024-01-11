@extends('layouts.app')

@section('content')
    @component('mail::message')
    # Contact from {{ $name }}
    Sender's Email: {{ $email }}

    {{ $content }}

    

    @component('mail::button', ['url' => 'https://dankdevhub.com'])
        Visit us
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent
@endsection
