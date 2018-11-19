<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DatabaseController extends Controller
{
	public function routeDashBoard(Request $request){
		$user = $this->getCurrentUser($request);
		return view('dashpage',['type' => $user->kt_Quyen]);

	}
    public function getAllScholar(Request $request){
    	$user = $this->getCurrentUser($request);
    	$articles = DB::table('hocbong')->leftjoin('trangthai', 'hocbong.id_TrangThaiHb', '=', 'trangthai.id_TrangThai')->where('id_NguoiDang', '=', $user->id)->orWhereRaw('\''.$user->kt_Quyen.'\' = 5')->paginate(10);
	    return view('scholartable', ['articles' =>$articles]);
    }
    public function delScholar(Request $request, $id){
    	$currentname = $request->session()->get('currentname');
    	DB::delete('delete from hocbong where id_HocBong ='.$id.' and (id_NguoiDang = (SELECT id FROM taikhoan WHERE taikhoan.username LIKE "'.$currentname.'") OR 5 = (SELECT taikhoan.kt_Quyen FROM taikhoan WHERE taikhoan.username LIKE "'.$currentname.'"))');
    	return Redirect::to('/manage/scholarship');
    }


    public function getAllAccount(Request $request){
    	$user = $this->getCurrentUser($request);
    	$listUsers = DB::table('taikhoan')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->paginate(10);
    	return view('accounttable', ['accounts'=> $listUsers]);
    }
    public function getUser($username){
    	return DB::table('taikhoan')->where('username', 'like', $username)->first();
    }

    public function getCurrentUser($request){
    	$currentname = $request->session()->get('currentname');
    	return $this->getUser($currentname);
    }

    public function banAccount(Request $request, $id){
        $user = $this->getCurrentUser($request);
        if($user->kt_Quyen == 5){
            DB::table("taikhoan")->whereRaw('\''.$user->kt_Quyen.'\' = 5')->where('id', '=', $id)->update(['id_TrangThai'=>0]);
            return response()->json([999,"Bạn đã khóa tài khoản ".$id." thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json([555,"Bạn không có quyền thực hiện hoạt động này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }
    }

    public function delAccount(Request $request, $id){
        $user = $this->getCurrentUser($request);
        if($user->kt_Quyen == 5){
            DB::table("taikhoan")->whereRaw('\''.$user->kt_Quyen.'\' = 5')->where('id', '=', $id)->delete();
            return response()->json([999,"Bạn đã xóa thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }else{
            return response()->json([555,"Bạn không có quyền thực hiện hoạt động này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }
    }
}
