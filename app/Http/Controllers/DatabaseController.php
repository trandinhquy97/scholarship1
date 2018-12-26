<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\SignupRequest;
use App\TaiKhoan;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

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
        $search = $request->input('search_query');
        if($search){
            $articles = DB::table('hocbong')->leftjoin('trangthai', 'hocbong.id_TrangThaiHb', '=', 'trangthai.id_TrangThai')->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')->where('hocbong.TenHocBong', 'like', '%'.$search.'%')->paginate(10);
        }else{
            $articles = DB::table('hocbong')->leftjoin('trangthai', 'hocbong.id_TrangThaiHb', '=', 'trangthai.id_TrangThai')->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')->whereRaw($user->kt_Quyen.'<>2')->orWhere('id_NguoiDang','=',$user->id)->paginate(10);    
           // return view('scholartable', ['articles' =>$articles]);
        }
        return view('scholartable', ['articles' =>$articles->appends(Input::except('page')), 'search'=>$search]);
        
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

    public function getAllSchlConf(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user)){
            return "You must login to do this action";
        }
        if($user->kt_Quyen == 1){
            return Redirect::to("/");
        }
        $articles = DB::table('hocbong')->leftjoin('trangthai', 'hocbong.id_TrangThaiHb', '=', 'trangthai.id_TrangThai')->where('id_TrangThaiHb', '=', 2)->whereRaw('\''.$user->kt_Quyen.'\' >= 3')->whereRaw($user->kt_Quyen.'<>4')->paginate(10);
        return view('scholarapproval', ['articles' =>$articles]);
    }

    public function confirmArticle(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user)){
            return "You must login to do this action";
        }
        if($user->kt_Quyen != 3 && $user->kt_Quyen != 5 && $user->kt_Quyen != 6){
            return response()->json([555,"Bạn không có quyền thực hiện hành động này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE); 
        }
        $id = $request->input('idi');
        DB::table('hocbong')->where('id_HocBong', '=', $id)->update(['id_TrangThaiHb'=>1]);
        return response()->json([999,"Xác nhận bài đăng thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    public function ignoreArticle(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user)){
            return "You must login to do this action";
        }
        if($user->kt_Quyen != 3 && $user->kt_Quyen != 5 && $user->kt_Quyen != 6){
            return response()->json([555,"Bạn không có quyền thực hiện hành động này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE); 
        }
        $id = $request->input('idi');
        DB::table('hocbong')->where('id_HocBong', '=', $id)->update(['id_TrangThaiHb'=>5]);
        return response()->json([999,"Không xét duyệt  bài đăng ".$id], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    /*=========================================================================
        Route for manage account
    =========================================================================*/
    public function createAccount(Request $request){
        return $request->input('username');
    }

    public function getCreateNewAccount(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user))
            return "You must login to do this action";
        else{
            if($user->kt_Quyen != 5)
                return Redirect::to('');
        }
        $listRole = DB::table("quyentaikhoan")->get();
        return view('newemployee', ['roles'=>$listRole]);
    }

    public function createNewAccount(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user))
            return "You must login to do this action";
        else{
            if($user->kt_Quyen != 5)
                return Redirect::to('');
        }
        $listRole = DB::table("quyentaikhoan")->get();
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $roleId = $request->input('role');
        $checkUn = DB::table('taikhoan')->where('username', 'like', $username)->first();
        if(!is_null($checkUn)){
            return view('newemployee', ['status'=>2, 'mes'=>$username.' đã tồn tại trong hệ thống','roles'=>$listRole]);
        }
        $user = TaiKhoan::create([
                    'id'=>null,
                    'username'=>$username,
                    'email'=>$email,
                    'password'=>Hash::make($password),
                    'kt_Quyen'=>$roleId,
                    'id_TrangThai'=>1
                ]);

        DB::table("thongtintaikhoan")->insert(["id_TaiKhoan"=>$user->id,"HoVaTen"=>'',"NgaySinh"=>'0001-01-01',"SDT"=>'',"GioiTinh"=>1,"QueQuan"=>'VietNam',"DiaChi"=>'VietNam',"id_TrangThai"=>0]);
        return view('newemployee', ['status'=>1, 'mes'=>'Đã tạo thành công tài khoản '.$username,'roles'=>$listRole]);
    }

    public function getAllAccount(Request $request){
    	$user = $this->getCurrentUser($request);
        if(is_null($user))
            return Redirect::to('/');
        else{
            if($user->kt_Quyen != 5)
                return Redirect::to('');
        }
        $search = $request->input('search_query');
        if($search){
            $listUsers = DB::table('taikhoan')->where('username', 'like', '%'.$search.'%')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->leftjoin('quyentaikhoan', 'kt_Quyen', '=', 'id_QuyenTaiKhoan')->paginate(10);
        }else{
    	   $listUsers = DB::table('taikhoan')->whereRaw('\''.$user->kt_Quyen.'\' = 5')->leftjoin('quyentaikhoan', 'kt_Quyen', '=', 'id_QuyenTaiKhoan')->paginate(10); 
        }
    	return view('accounttable', ['accounts'=> $listUsers->appends(Input::except('page')), 'search'=>$search]);
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
            return response()->json([999,"Bạn đã xóa tài khoản <u>".$userOp->username."</u> thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
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
            return "You must login to do this action";
        else{
            if($user->kt_Quyen == 1)
                return Redirect::to('');
        }
        $search = $request->input('search_query');
        if($search){
            $posts = DB::table('sukien')->leftJoin('trangthai','id_TrangThaiTopic','=','id_TrangThai')->leftJoin('loaisukien','sukien.id_LoaiSuKien','=','loaisukien.id_LoaiSuKien')->where('TenSuKien', 'like', '%'.$search.'%')->paginate(10);
        }else{
            $posts = DB::table('sukien')->leftJoin('trangthai','id_TrangThaiTopic','=','id_TrangThai')->leftJoin('loaisukien','sukien.id_LoaiSuKien','=','loaisukien.id_LoaiSuKien')->whereRaw($user->kt_Quyen.'<>2')->orWhere('id_NguoiDang','=',$user->id)->paginate(10);
        }
        return view('posttable', ['posts'=> $posts->appends(Input::except('page')), 'search'=>$search]);
    }

    public function getAllPostConf(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user))
            return "You must login to do this action";
        else{
            if($user->kt_Quyen == 1 || $user->kt_Quyen == 2 || $user->kt_Quyen == 4)
                return Redirect::to('');
        }
        $posts = DB::table('sukien')->leftJoin('trangthai','id_TrangThaiTopic','=','id_TrangThai')
            ->leftJoin('loaisukien','sukien.id_LoaiSuKien','=','loaisukien.id_LoaiSuKien')->where('sukien.id_TrangThaiTopic','=',2)->whereRaw($user->kt_Quyen.'<>1')->whereRaw($user->kt_Quyen.'<>2')->whereRaw($user->kt_Quyen.'<>4')->paginate(10);

        return view('postapproval', ['posts'=> $posts]);
    }

    public function deletePost(Request $request){
        $user = $this->getCurrentUser($request);
        if(is_null($user)){
            return "You must login to do this action";
        }
        if($user->kt_Quyen == 3 || $user->kt_Quyen == 5 || $user->kt_Quyen == 6){
            $idi = $request->input('idi');
            DB::table('sukien')->where('id_SuKien', '=', $idi)->delete();
            return response()->json([999,"Bạn đã bài đăng <u>".$idi."</u> thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }
        else{
            return response()->json([555,"Bạn không có quyền thực hiện hành động này"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
        }
    }



    public function confirmPost(Request $request){
        $id = $request->input('idi');
        DB::table('sukien')->where('id_SuKien', '=', $id)->update(['id_TrangThaiTopic'=>1]);
        return response()->json([999,"Xác nhận bài đăng thành công"], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
    }

    public function ignorePost(Request $request){
        $id = $request->input('idi');
        DB::table('sukien')->where('id_SuKien', '=', $id)->update(['id_TrangThaiTopic'=>5]);
        return response()->json([999,"Không xét duyệt  bài đăng ".$id], 200,['Content-Type' => 'application/json;charset=utf-8', 'Charset' => 'utf-8'],JSON_UNESCAPED_UNICODE);
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

    public function upFile(Request $req){
        $file = $req->file;
        $file->move(public_path('/upload'), end($file));
        return "aaa";
    }
}
