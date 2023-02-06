<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <title>Document</title>
    @yield("head")
</head>
<body>
    <nav>
        <div class="left">
            <div class="item">Home</div>
            <form action="{{route("dashboard")}}" method="GET">
                @csrf
                <button type="submit" class="item">Dashboard</button>
            </form>
            <form action="{{route("posts")}}" method="GET">
                @csrf
                <button type="submit" class="item">Posts</button>
            </form>
        </div>
        <div class="right">
          @auth
            <div class="username">{{auth()->user()->firstName." ".strtoupper(auth()->user()->lastName[0])."."}}</div>
            <form action="{{route("logout")}}" method="POST">
                @csrf
                <button type="submit" class="item">Logout</button>
            </form>
          @endauth
          @guest
            <form action="{{route("login")}}" method="GET">
                @csrf
                <button class='button login'>Login</button>
            </form>
            <form action="{{route("register")}}" method="GET">
                @csrf
                <button class="button register">Register</button>
            </form>
           
           
          @endguest
        </div>
    </nav>
    @yield("content")
</body>
</html>