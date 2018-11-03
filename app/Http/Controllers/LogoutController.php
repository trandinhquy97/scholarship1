<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function getLogout(){
       Auth::logout();
       Session::flush();
       return Redirect::to('/');
    }
}

