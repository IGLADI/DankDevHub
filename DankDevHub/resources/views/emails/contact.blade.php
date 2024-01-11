<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>DankDevHub</title>
</head>
<body>
    <p>
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
    </p>
</body>
</html>
