<?php
/**
 * Created by PhpStorm.
 * User: LAPTOPZIN.VN
 * Date: 12/14/2018
 * Time: 3:02 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomResetPasswordController
{
    function getView(){
        return view('changepasswordwithmailfirst');
    }

    function sendToken(Request $request){
        $user = $request->get('email');
        $dbget = DB::table('taikhoan')->where('email','=',$user);
        if($dbget->count()>0){
            $token = $dbget->first()->password;
            $link = 'laravel.local/resetpassword/'.$user.'/'.$token;
            $data = array('name'=>"Scholarship",
                'link'=>$link);
            $text = 'Your Link To Reset Password: <a href="'.$link.'"/a>';
            Mail::send('linkpasswordreset', $data, function($message) use ($user){
                $message->to($user, 'Khách Hàng')->subject('Laravel HTML Testing Mail');
                $message->from('ivielateam@gmail.com','Scholarship');
            });
            return Redirect('reset')
                ->with('message', 'Hãy kiểm tra lại email để đổi mật khẩu!');
        }
//
        else{
            return Redirect::route('resetpassword')
            ->with('message', 'Email không tồn tại!');
        }
    }
    function validateToken(Request $request){
        $dbget = DB::table('taikhoan')->where('email','=',$request->email)->where('password','=',$request->token);
        if($dbget->count()>0) {
            return view('changepasswordwithmail')->with('email', $request->email);
        }
        else
            return Redirect::route('getIndex');
    }
    function resetPassword(Request $request){
        $newpassword = $request->input("password");
        $validnewpassword = $request->input("validatepassword");
        $email = $request->input('email');
        echo $newpassword;
        echo $validnewpassword;
        $email = $request->input("email");
        if(DB::table('taikhoan')->where('email','=',$email)->count()>0&&$newpassword==$validnewpassword){
            DB::table('taikhoan')->where('email','=',$email)->update(['password'=> Hash::make($newpassword)]);
            Auth::logout();
            Session::flush();
            return Redirect::route('getLogin');
        };
    }
}