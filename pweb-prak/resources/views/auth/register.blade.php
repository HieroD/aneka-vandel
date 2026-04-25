<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="register/user" method="post">
        @csrf
        <input type="text" name="name" id="name">

        <input type="email" name="email" id="email">

        <input type="password" name="password" id="password">

        <input type="password" name="password_confirmation" id="password_confirmation">

        <button type="submit">Submit</button>
    </form>
</body>
</html>