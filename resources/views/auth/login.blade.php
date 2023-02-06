@extends("layouts.app")
@section("content")
  <div class="container">
 
  
    <h2><h2>
    <form class="auth_form" action="{{ route("login") }}" method="POST">
        @csrf
   
        <h2 class="title">Login</h2>
        <div class="error">
            @if(session("status"))
            {{@session("status")}}
            @endif
        </div>
        <div class='form_field'>
            <label>Email </label>
            <input name="email" placeholder="Email" value="{{old("email")}}" class='@error('email')input-error @enderror' />
            @error("email")
            <div class="error">
                {{$message}}
            </div>
            @enderror

        </div>
        <div class='form_field'>
            <label>Password </label>
            <input class='@error('password')input-error @enderror' name="password" placeholder="password" type="password" />
            @error("password")
            <div class="error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class='form_field_remember'>
            <input name='remember' type='checkbox' name="password" placeholder="Last name" />
            <label>Remember me </label>
        </div>
       
        <button type='submit'>Login</button>

    </form>
</div>
@endsection
@section('head')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection