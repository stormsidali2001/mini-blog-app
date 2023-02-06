@extends("layouts.app")
@section("content")
    dashboard
    @auth
        we are logged in!
    @endauth

    @guest
        we are not logged in!
    @endguest
@endsection