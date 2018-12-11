<?php

namespace App\Http\Controllers;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DatabaseController extends Controller
{

    /*=========================================================================
        Route for manage page
    =========================================================================*/
	public function routeDashBoard(Request $request){
		$user = $this->getCurrentUser($request);
        if(is_null($user))
            return Redirect::to('/');
		return view('dashboard');
	}

    public function routeBoardSide(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user))
            return Redirect::to('/');
        return view('dashpage',['type' => $user->kt_Quyen]);
    }

    /*=========================================================================
        Route for manage scholarship
    =========================================================================*/
    public function getAllScholar(Request $request){
    	$user = $this->getCurrentUser($request);
        if(is_null($user)){
            return Redirect::to('/');
        }
    	$articles = DB::table('hocbong')->leftjoin('trangthai', 'hocbong.id_TrangThaiHb', '=', 'trangthai.id_TrangThai')->where('id_NguoiDang', '=', $user->id)->orWhereRaw('\''.$user->kt_Quyen.'\' = 5')->paginate(10);
	    return view('scholartable', ['articles' =>$articles]);
    }
    public function delScholar(Request $request, $id){
    	$currentname = $request->session()->get('currentname');
    	DB::delete('delete from hocbong where id_HocBong ='.$id.' and (id_NguoiDang = (SELECT id FROM taikhoan WHERE taikhoan.username LIKE "'.$currentname.'") OR 5 = (SELECT taikhoan.kt_Quyen FROM taikhoan WHERE taikhoan.username LIKE "'.$currentname.'"))');
    	return Redirect::to('/manage/scholarship');
    }

    public function deleteScholar(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user)){
            return "You must login to do this action";
        }

         $idi = $request->input('idi');
         DB::table('hocbong')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->where('id_HocBong', '=', $idi)->orWhere('id_NguoiDang','=', $user->id)->where('id_HocBong', '=', $idi)->delete();
        return response()->json([999,"Đã xóa bài học bổng thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    /*=========================================================================
        Route for manage account
    =========================================================================*/
    public function createAccount(Request $request){
        return $request->input('username');
    }

    public function getAllAccount(Request $request){
    	$user = $this->getCurrentUser($request);
        if(is_null($user))
            return Redirect::to('/');
        else{
            if($user->kt_Quyen != 5)
                return Redirect::to('');
        }
    	$listUsers = DB::table('taikhoan')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->leftjoin('quyentaikhoan', 'kt_Quyen', '=', 'id_QuyenTaiKhoan')->paginate(10);
    	return view('accounttable', ['accounts'=> $listUsers]);
    }

    public function changeAccount(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user)){
            return "You must login to do this action";
        }
        if($user->kt_Quyen == 5){
            $idUser = $request->input('idi');
            $userOp = $this->getUserById($idUser);
            if($userOp->id == $user->id){
                return response()->json([555,"Bạn không thể thực hiện hành động này trên tài khoản chính mình"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
            }
            $operator = (int)$request->input('op');
            $dtin = $request->input('data');
            switch ($operator) {
                case 1:
                    $dtin = (int)$dtin+1;
                    if($userOp->kt_Quyen == $dtin){
                        return response()->json([555, "Tài khoản <u>".$userOp->username."</u> hiện đã ở quyền này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
                    }
                    DB::table('taikhoan')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->where('id', '=', $idUser)->update(['kt_Quyen'=> $dtin]);
                    return response()->json([999, "Bạn đã thay đổi loại tài khoản cho <u>".$userOp->username."</u> thành công", $this->getPublicUserState($idUser)], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
                    break;
                case 2:
                    if(strlen($dtin) == 0){
                        return response()->json([555, "Không thể để trống mật khẩu"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
                    }
                    $hasspass = Hash::make($dtin);
                    DB::table('taikhoan')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->where('id', '=', $idUser)->update(['password'=>$hasspass]);
                    return response()->json([999, "Bạn đã đổi mật khẩu tài khoản <u>".$userOp->username."</u> thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
                    break;
                case 3:
                    DB::table('taikhoan')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->where('id', '=', $idUser)->update(['id_TrangThai'=> abs($dtin-1)]);
                    return response()->json([999,($dtin==1?"Bạn đã khóa tài khoản ":"Bạn đã mở khóa tài khoản ")."<u>".$userOp->username."</u> thành công",$this->getPublicUserState($idUser)], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
                    break;
            }
        }
        else{
            return response()->json([555,"Bạn không có quyền thực hiện hành động này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }
    }

    public function deleteAccount(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user)){
            return "You must login to do this action";
        }
        if($user->kt_Quyen == 5){
            $idUser = $request->input('idi');
            $userOp = $this->getUserById($idUser);
            if($userOp->id == $user->id){
                return response()->json([555,"Bạn không thể thực hiện hành động này trên tài khoản chính mình"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
            }
            DB::table('taikhoan')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->where('id', '=', $idUser)->delete();
            return response()->json([555,"Bạn đã xóa tài khoản <u>".$userOp->username."</u> thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }
        else{
            return response()->json([555,"Bạn không có quyền thực hiện hành động này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }
    }
    /*=========================================================================
    Route for manage post
    =========================================================================*/
    public function getAllPost(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user))
            return Redirect::to('/');
        else{
            if($user->kt_Quyen != 5)
                return Redirect::to('');
        }
        $listUsers = DB::table('sukien')->leftJoin('trangthai','id_TrangThaiTopic','=','id_TrangThai')
            ->leftJoin('loaisukien','sukien.id_LoaiSuKien','=','loaisukien.id_LoaiSuKien')->paginate(10);

        return view('posttable', ['posts'=> $listUsers]);
    }

    public function getOwnPost(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user))
            return Redirect::to('/');
        else{
            if($user->kt_Quyen != 2)
                return Redirect::to('');
        }
        $id = $request->session()->has('currentid');
        $listUsers = DB::table('sukien')->leftJoin('trangthai','id_TrangThaiTopic','=','id_TrangThai')
            ->leftJoin('loaisukien','sukien.id_LoaiSuKien','=','loaisukien.id_LoaiSuKien')
            ->where('id_NguoiDang','=',$id)->paginate(10);

        return view('posttable', ['posts'=> $listUsers]);
    }
    /*=========================================================================
        Helper
    =========================================================================*/
    public function getUser($username){
    	return DB::table('taikhoan')->where('username', '=', $username)->first();
    }

    public function getUserById($id){
        return DB::table('taikhoan')->where('id', '=', $id)->first();
    }

    public function getPublicUserState($id){
        return DB::table('taikhoan')->select('id', 'username', 'id_TrangThai', 'kt_Quyen')->where('id', '=', $id)->first();
    }

    public function getCurrentUser(Request $request){
    	if($request->session()->has('currentname')){
            $username = $request->session()->get('currentname');
            return $this->getUser($username); 
        }
        else{
            return null;
        }
    }

    public function getAllComments(Request $request){
        $quyen = $request->get("kt_Quyen");
        if($quyen=3||$quyen=5||$quyen=6){
            $commentsScholarship= DB::table('binhluan')->where("id_LoaiSuKien","=",0)
                ->leftJoin('hocbong','hocbong.id_HocBong','=','binhluan.id_DanhMucBinhLuan')
                ->paginate(10);
        }
        return view('commenttable',['commentsScholarship'=>$commentsScholarship]);
    }
    public function getAllCommentsEvent(Request $request){
        $quyen = $request->get("kt_Quyen");
        if($quyen=3||$quyen=5||$quyen=6) {
            $comments = DB::table('binhluan')->where("binhluan.id_LoaiSuKien", "<>", 0)
                ->leftJoin('sukien', 'sukien.id_SuKien', '=', 'binhluan.id_DanhMucBinhLuan')
                ->paginate(10);
        }
        return view('commenteventtable',['comments'=>$comments]);
    }
    public function  delComment($id){
        DB::delete('delete from binhluan where id_BinhLuan ='.$id);
       return Redirect::back();
    }


    /*=========================================================================
        Test functions
    =========================================================================*/

    public function test1(Request $request){
        $value = 1;
        $this->test2($request, "Tring");

        // return 'test1'.$value;
    }

    public function test2(Request $request, $str){
        // return Redirect::to('');
        return response()->json([555,"B2222222".$str], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        // return 'test2';
    }
}
