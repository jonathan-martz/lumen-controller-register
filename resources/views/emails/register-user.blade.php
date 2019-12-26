<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Register User Activation Email - hetzner.jmartz.de</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
@component('hetzner::header') @endcomponent
<main>
    <p><strong>Register User Activation Email</strong></p>
    <p>
        You create a new Account with Username {{ $username }} on <a
                href="https://hetzner.jmartz.de/">hetzner.jmartz.de</a>.<br><br>

        If you doesnt create an Account on this Website, you can securly ignore this email.<br>
        If no you can Click to <a href="https://hetzner.jmartz.de/user/activate?token={{$token}}">hetzner.jmartz.de</a>
        <br>
        your email Account of {{ $email }} on <a href="https://hetzner.jmartz.de/">hetzner.jmartz.de</a>.<br>
    </p>
</main>
@component('hetzner::footer') @endcomponent
</body>
</html>
