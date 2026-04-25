<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="login/user" method="post">
        @csrf
        <input type="email" name="email" id="email">

        <input type="password" name="password" id="password">

        <button type="submit">Submit</button>
    </form>
    @error('match')
        <p> {{ $message }} </p>
    @enderror
</body>
</html>