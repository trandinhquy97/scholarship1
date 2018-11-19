<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
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
            $row = DB::table('taikhoan')->where('email','=',$email);
            if($row->first()->id_TrangThai!=0){
                $request->session()->put('currentname', Auth::user()->username);
                $request->session()->put('currentemail', Auth::user()->email);
                $request->session()->put('currenttoken', Auth::user()->remember_token);
                $request->session()->put('kt_quyen', Auth::user()->kt_Quyen);
                return Redirect::to('/');
            }
            else
                return Redirect::to('/login');
        } else {
            return Redirect::to('/login');
        }
    }
}
