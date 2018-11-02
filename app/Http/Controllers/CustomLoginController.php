<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class CustomLoginController extends Controller
{
    public function getLogin(){
        return view('login');
    }
    public function postLogin(LoginRequest $request) {

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            return Redirect::to('/');
        } else {
            return Redirect::to('/login');
        }
    }
}
