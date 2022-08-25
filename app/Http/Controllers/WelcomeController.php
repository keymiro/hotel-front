<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){

        if (session()->has('user')) {
            return view('dashboard');
       }else{
            session()->forget('user');
            return view('welcome');
       }


    }
}
