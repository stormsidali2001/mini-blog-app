<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
     function __construct(){
        // $this->middleware([ "guest"]);
    }
    function index(){
        return view('auth.login');
    }
    function store(Request $request){
       
          //validation
          $this->validate($request, [
            'email' => 'required|email',
            'password'=>'required',
        ]);
          //sign the user in
          if(!auth()->attempt($request->only('email', 'password'),$request->remember)){
            return back()->with('status', 'Invalid login details');
          };
        return redirect("/dashboard");

    }
}
