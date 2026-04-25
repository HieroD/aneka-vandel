<!DOCTYPE html>
<html lang="en">
<head>              
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>
    @guest
        <a href="/register">Register</a>
        <a href="/login">Login</a>      
    @endguest
    

    @auth
        <form action="/logout" method="post">
            @method('delete')
            @csrf
            <button type="submit">Logout</button>
        </form>

        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif    
    @endauth
    
</body>
</html>