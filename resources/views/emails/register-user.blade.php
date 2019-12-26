<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Register User Activation Email - hetzner.jmartz.de</title>
</head>
<body>
@component('header')
    <main>
        <p><strong>Register User Activation Email</strong></p>
        <p>
            You create a new Account with {{ $username }} on {{ config('APP_URL')  }}.<br><br>

            If you doesnt create an Account on this Website, you can securly ignore this email.<br>
            If no you can Click to <a href="{{ URL::to('/user/activate?token='.$token) }}">activate</a> <br>
            your email Account of {{ $email }} on {{ config('APP_URL')  }}.<br>
        </p>
    </main>
    @component('footer')
</body>
</html>
