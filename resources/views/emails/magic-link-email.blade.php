<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Link Email</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>You have requested to log in with a magic link. Please click the following link to log in:</p>
    <a href="{{ $magicLink }}">Login with Magic Link</a>
    <p>If you didn't request this, you can safely ignore this email.</p>
</body>
</html>
