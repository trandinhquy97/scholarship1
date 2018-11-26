<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\SignupRequest;
use App\TaiKhoan;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SignupController extends Controller
{
    public function getSignup(){
        return view('signup');
    }

    public function postSignup(SignupRequest $request){
            $username = $request->username;
            $email = $request->email;
            $password = $request->password;
            $repassword = $request->repassword;
            $type = $request->type;
            if(strcmp($password,$repassword)==0){
                $user = TaiKhoan::create([
                    'id'=>null,
                    'username'=>$username,
                    'email'=>$email,
                    'password'=>Hash::make($password),
                    'kt_Quyen'=>$type
                ]);

                DB::table("thongtintaikhoan")->insert(["id_TaiKhoan"=>$user->id,"HoVaTen"=>'',"NgaySinh"=>'0001-01-01',"SDT"=>'',"GioiTinh"=>1,"QueQuan"=>'VietNam',"DiaChi"=>'VietNam']);
//                echo $user;
                Auth::login($user);
                return Redirect::to("login");
            }
            else{
                return Redirect::to("signup");
            }
    }
}
