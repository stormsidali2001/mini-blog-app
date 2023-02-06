@extends("layouts.app")
@section("content")
  <div class="container">
    <form class='auth_form' action="{{ route("register") }}" method="POST">
        @csrf
        <h2 class="title">Register</h2>
        <div class='form_field'>
            <label>First Name</label>
            <input name="firstName" value="{{old("firstName")}}" class='@error('firstName')input-error @enderror' placeholder="First name" />
            @error("firstName")
            <div class="error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class='form_field'>
            <label>Last Name </label>
            <input name="lastName" value="{{old("lastName")}}" placeholder="Last name" class='@error('lastName')input-error @enderror'/>
            @error("lastName")
            <div class="error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class='form_field'>
            <label>Username </label>
            <input name="username" value="{{old("username")}}" placeholder="Username" class='@error('username')input-error @enderror'/>
            @error("username")
            <div class="error">
                {{$message}}
            </div>
            @enderror
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
            <input type="password" class='@error('password')input-error @enderror' name="password" placeholder="password" type="password" />
            @error("password")
            <div class="error">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class='form_field'>
            <label>Confirm Password </label>
            <input type="password" name="password_confirmation" placeholder="confirm password" />
           
        </div>
        <button type='submit'>Register</button>

    </form>
</div>
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection