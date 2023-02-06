<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCOntroller extends Controller
{
    // function __construct(){
    //     $this->middleware(["auth", "guest"]);
    // }
    function index(){
        // dd(auth()->user());  connected user
        // dd(auth()->user()->posts);
        return view('dashboard');
    }
}
