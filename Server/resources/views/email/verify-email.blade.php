<!DOCTYPE html>
<html>
<head>
    <title>Verify Email Address</title>
</head>
<body>
    <h1>Hello {{ $userName }},</h1>
    <p>Please click the following link to verify your email address:</p>
    <a href="{{ $verificationUrl }}">Verify Email</a>
    <p>If you did not create an account, please ignore this email.</p>
</body>
</html>