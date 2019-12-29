<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Register User Activation Email - hetzner-dev.jmartz.de</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
@component('general::header') @endcomponent
@php
    $baseurl = str_replace(['api-', 'https://'],'', URL::to('/'));
    $baselink = str_replace(['api-'],'', URL::to('/'))
@endphp
<main>
    <p><strong>Register User Activation Email</strong></p>
    <p>
        You create a new Account with Username {{ $username }} on <a
                href="{{ $baseurl  }}">{{ $baseurl  }}</a>.<br><br>

        If you doesnt create an Account on this Website, you can securly ignore this email.<br>
        If no you can Click to <a href="{{ $baselink  }}/user/activate?token={{$token}}">activate</a>
        <br>
        your email Account of {{ $email }} on <a href="{{ $baselink  }}">{{ $baseurl  }}</a>.<br>
    </p>
</main>
@component('general::footer') @endcomponent
</body>
</html>
