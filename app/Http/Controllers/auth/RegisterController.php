<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function __construct(){
        // $this->middleware([ "guest"]);
    }
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        //validation
        $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username'=>'required|max:255',
            'password'=>'required|confirmed|min:6', // confirmed : password_confirmation
        ]);
        //store user
        $user = [
            'email' => $request->email,
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'password' => Hash::make($request->password)
        ];
        User::create($user);
        //sign the user in
        auth()->attempt($request->only('email', 'password'));
        //redirect
        return redirect()->route('dashboard');
    }
}
