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
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
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
            $articles = DB::table('hocbong')
                ->select('*', DB::raw('count(dangkyhocbong.id_HocBong) as people_count'), 'hocbong.id_HocBong as id_HB')
                ->leftjoin('trangthai', 'hocbong.id_TrangThaiHb', '=', 'trangthai.id_TrangThai')
                ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
                ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
                ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
                ->leftjoin('dangkyhocbong', 'hocbong.id_HocBong','=','dangkyhocbong.id_HocBong')
                ->where('hocbong.TenHocBong', 'like', '%'.$search.'%')
                ->groupBy('hocbong.id_HocBong')
                ->paginate(10);
        }else{
            $articles = DB::table('hocbong')
                ->select('*', DB::raw('count(dangkyhocbong.id_HocBong) as people_count'), 'hocbong.id_HocBong as id_HB')
                ->leftjoin('trangthai', 'hocbong.id_TrangThaiHb', '=', 'trangthai.id_TrangThai')
                ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
                ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
                ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
                ->leftjoin('dangkyhocbong', 'hocbong.id_HocBong','=','dangkyhocbong.id_HocBong')
                ->whereRaw($user->kt_Quyen.'<>2')->orWhere('id_NguoiDang','=',$user->id)
                ->groupBy('hocbong.id_HocBong')
                ->paginate(10);
            // return view('scholartable', ['articles' =>$articles]);
        }

	    return view('scholartable', ['articles' =>$articles->appends(Input::except('page')), 'search'=>$search]);
    }

    public function getAllRegist(Request $request, $id){
        $name = DB::table('hocbong')->where('id_HocBong','=', $id)->first();
        $registedperson = DB::table('dangkyhocbong')
            ->leftJoin('taikhoan','taikhoan.email','=','dangkyhocbong.EmailDangKy')
            ->leftJoin('thongtintaikhoan', 'taikhoan.id', '=', 'thongtintaikhoan.id_TaiKhoan')
            ->where('dangkyhocbong.id_HocBong', '=', $id)
            ->paginate(50);
        return view('watchregisted', ['registedperson' =>$registedperson, 'name'=>$name]);
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

    public function newScholar(Request $request){
        $levelscholar = DB::table('bachoc')->get();
        $typescholar = DB::table('loaihocbong')->get();
        $majorscholar = DB::table('nganhhoc')->get();
        $school = DB::table('truonghoc')->get();
        $quocgia = DB::table('quocgia')->get();
        $unit = DB::table('donvitien')->get();
        $certificate = DB::table('chungchingoaingu')->get();
        return view('newpost', ['typescholar'=>$typescholar, 'majorscholar'=>$majorscholar, 'levelscholar'=>$levelscholar, 'school'=>$school, 'unit'=>$unit, 'certificate'=>$certificate]);
    }

    public function createScholar(Request $request){
        if ($request->hasFile('Fichier1')) {
            $file = $request->file('Fichier1');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('upload', $fileName);
            $filePath = 'upload/'.$fileName;
            $nameScholar = $request->input('namescholar');
            $typescholar = $request->input('typescholar');
            $majorscholar = $request->input('majorscholar');
            $levelscholar = $request->input('levelscholar');
            $schoolID = $request->input('school');
            $minval = $request->input('minval');
            $maxval = $request->input('maxval');
            $unit = $request->input('unit');
            $numscholar = $request->input('numscholar');
            $deadline = $request->input('deadline');
            $split = explode('/', $deadline);
            $deadline = $split[2].'-'.$split[1].'-'.$split[0];
            $require = $request->input('require');
            $pro = $request->input('pro');
            $user = $this->getCurrentUser($request);
            $linkreg = $request->input('linkreg');
            $linkvia = $request->input('linkvia');
            $mytime = Carbon::now();
            $mytime->toDateTimeString();
            DB::table('giatrihocbong')->insert(['PhanTramHb'=>0, 'SoTienMin'=>$minval, 'SoTienMax'=>$maxval, 'id_DonViTien'=>$unit, 'MoTa'=>'']);
            $idGiaTri = DB::table('giatrihocbong')->orderBy('id_GiaTriHb', 'desc')->first();
            DB::table('hocbong')->insert([
                'id_NguoiDang'=>$user->id, 
                'NgayTao'=>$mytime, 
                'AnhBia'=>$filePath,
                'TenHocBong'=>$nameScholar,
                'id_LoaiHb'=>$typescholar,
                'deadline'=>$deadline,
                'id_TruongHoc'=>$schoolID,
                'id_BacHoc'=>$levelscholar,
                'id_NganhHoc'=>$majorscholar,
                'id_GiaTriHb'=>$idGiaTri->id_GiaTriHb,
                'SoLuong'=>$numscholar,
                'YeuCau'=>$require,
                'ThuTucNop'=>$pro,
                'LinkDangKy'=>$linkreg,
                'NguonThongTin'=>$linkvia,
                'SoLuotQuanTam'=>0,
                'id_TrangThaiHb'=>2
            ]);

            $idHb = DB::table('hocbong')->orderBy('id_HocBong', 'desc')->first();


            $numCer = (int)$request->input('numCerti');
            for($i = 1; $i <= $numCer; $i++){
                $idCer = $request->input('certificate'.$i);
                $num = $request->input('langpoint'.$i);
                DB::table('dieukienngoaingu')->insert(['id_HocBong'=>$idHb->id_HocBong, 'id_ChungChi'=>$idCer, 'Diem'=>$num]);
            }
            $levelscholar = DB::table('bachoc')->get();
            $typescholar = DB::table('loaihocbong')->get();
            $majorscholar = DB::table('nganhhoc')->get();
            $school = DB::table('truonghoc')->get();
            $quocgia = DB::table('quocgia')->get();
            $unit = DB::table('donvitien')->get();
            $certificate = DB::table('chungchingoaingu')->get();
            return view('newpost', ['typescholar'=>$typescholar, 'majorscholar'=>$majorscholar, 'levelscholar'=>$levelscholar, 'school'=>$school, 'unit'=>$unit, 'certificate'=>$certificate,'status'=>1, 'mes'=>'Đã tạo thành công bài đăng '.$idHb->id_HocBong]);
        }else{
            return 'null file';
        }
    }

    public function editScholar(Request $request, $id){
        $levelscholar = DB::table('bachoc')->get();
        $typescholar = DB::table('loaihocbong')->get();
        $majorscholar = DB::table('nganhhoc')->get();
        $school = DB::table('truonghoc')->get();
        $quocgia = DB::table('quocgia')->get();
        $unit = DB::table('donvitien')->get();
        $certificate = DB::table('chungchingoaingu')->get();
        $scholar = DB::table('hocbong')->where('id_HocBong', '=', $id)->first();
        $split = explode('-', $scholar->deadline);
        $deadline = $split[2].'/'.$split[1].'/'.$split[0];
        $value = DB::table('giatrihocbong')->where('id_GiaTriHb', '=', $scholar->id_GiaTriHb)->first();
        $cer = DB::table('dieukienngoaingu')->where('id_HocBong', '=', $scholar->id_HocBong)->get();
        return view('editScholar', ['typescholar'=>$typescholar, 'majorscholar'=>$majorscholar, 'levelscholar'=>$levelscholar, 'school'=>$school, 'unit'=>$unit, 'certificate'=>$certificate, 'scholar'=>$scholar, 'deadline'=>$deadline, 'value'=>$value, 'cert'=>$cer]);
    }

    public function saveEditScholar(Request $request, $id){
        if ($request->hasFile('Fichier1')) {
            $file = $request->file('Fichier1');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('upload', $fileName);
            $filePath = 'upload/'.$fileName;
            DB::table('hocbong')->where('id_HocBong', '=', $id)->update(['AnhBia'=>$filePath]);
        }   
        $scholarship = DB::table('hocbong')->where('id_HocBong', '=', $id)->first();
        $nameScholar = $request->input('namescholar');
        $typescholar = $request->input('typescholar');
        $majorscholar = $request->input('majorscholar');
        $levelscholar = $request->input('levelscholar');
        $schoolID = $request->input('school');
        $minval = $request->input('minval');
        $maxval = $request->input('maxval');
        $unit = $request->input('unit');
        $numscholar = $request->input('numscholar');
        $deadline = $request->input('deadline');
        $split = explode('/', $deadline);
        $deadline = $split[2].'-'.$split[1].'-'.$split[0];
        $require = $request->input('require');
        $pro = $request->input('pro');
        $user = $this->getCurrentUser($request);
        $linkreg = $request->input('linkreg');
        $linkvia = $request->input('linkvia');
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        DB::table('giatrihocbong')->where('id_GiaTriHb', '=', $scholarship->id_GiaTriHb)->delete();
        DB::table('giatrihocbong')->insert(['PhanTramHb'=>0, 'SoTienMin'=>$minval, 'SoTienMax'=>$maxval, 'id_DonViTien'=>$unit, 'MoTa'=>'']);
        $idGiaTri = DB::table('giatrihocbong')->orderBy('id_GiaTriHb', 'desc')->first();
        DB::table('hocbong')->where('id_HocBong', '=', $id)->update([
            'TenHocBong'=>$nameScholar,
            'id_LoaiHb'=>$typescholar,
            'deadline'=>$deadline,
            'id_TruongHoc'=>$schoolID,
            'id_BacHoc'=>$levelscholar,
            'id_NganhHoc'=>$majorscholar,
            'id_GiaTriHb'=>$idGiaTri->id_GiaTriHb,
            'SoLuong'=>$numscholar,
            'YeuCau'=>$require,
            'ThuTucNop'=>$pro,
            'LinkDangKy'=>$linkreg,
            'NguonThongTin'=>$linkvia,
        ]);

        // $idHb = DB::table('hocbong')->orderBy('id_HocBong', 'desc')->first();

        DB::table('dieukienngoaingu')->where('id_HocBong', '=', $scholarship->id_HocBong)->delete();
        $numCer = (int)$request->input('numCerti');
        for($i = 1; $i <= $numCer; $i++){
            $idCer = $request->input('certificate'.$i);
            $num = $request->input('langpoint'.$i);
            DB::table('dieukienngoaingu')->insert(['id_HocBong'=>$scholarship->id_HocBong, 'id_ChungChi'=>$idCer, 'Diem'=>$num]);
        }
        // return view('newpost', ['typescholar'=>$typescholar, 'majorscholar'=>$majorscholar, 'levelscholar'=>$levelscholar, 'school'=>$school, 'unit'=>$unit, 'certificate'=>$certificate,'status'=>1, 'mes'=>'Chỉnh sửa thành công bài đăng '.$scholarship->id_HocBong]);
        $levelscholar = DB::table('bachoc')->get();
        $typescholar = DB::table('loaihocbong')->get();
        $majorscholar = DB::table('nganhhoc')->get();
        $school = DB::table('truonghoc')->get();
        $quocgia = DB::table('quocgia')->get();
        $unit = DB::table('donvitien')->get();
        $certificate = DB::table('chungchingoaingu')->get();
        $scholar = DB::table('hocbong')->where('id_HocBong', '=', $id)->first();
        $split = explode('-', $scholar->deadline);
        $deadline = $split[2].'/'.$split[1].'/'.$split[0];
        $value = DB::table('giatrihocbong')->where('id_GiaTriHb', '=', $scholar->id_GiaTriHb)->first();
        $cer = DB::table('dieukienngoaingu')->where('id_HocBong', '=', $scholar->id_HocBong)->get();
        return view('editScholar', ['typescholar'=>$typescholar, 'majorscholar'=>$majorscholar, 'levelscholar'=>$levelscholar, 'school'=>$school, 'unit'=>$unit, 'certificate'=>$certificate, 'scholar'=>$scholar, 'deadline'=>$deadline, 'value'=>$value, 'cert'=>$cer,'status'=>1, 'mes'=>'Chỉnh sửa thành công bài đăng '.$scholarship->id_HocBong]);
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

        DB::table("thongtintaikhoan")->insert(["id_TaiKhoan"=>$user->id,"HoVaTen"=>'',"NgaySinh"=>'0001-01-01',"SDT"=>'',"GioiTinh"=>1,"QueQuan"=>'VietNam',"DiaChi"=>'VietNam',"id_TrangThai"=>0, "LinkCV"=>'']);
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
            $listUsers = DB::table('taikhoan')
            ->where('username', 'like', '%'.$search.'%')
            ->whereRaw('\''.$user->kt_Quyen.'\' = 5')
            ->leftjoin('quyentaikhoan', 'kt_Quyen', '=', 'id_QuyenTaiKhoan')
            ->orderBy('id')
            ->paginate(10);
        }else{
           $listUsers = DB::table('taikhoan')
           ->whereRaw('\''.$user->kt_Quyen.'\' = 5')
           ->leftjoin('quyentaikhoan', 'kt_Quyen', '=', 'id_QuyenTaiKhoan')
           ->orderBy('id')
           ->paginate(10); 
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

    public function createNewEvent(Request $request){
        $typeevent = DB::table('loaisukien')->get();
        $cities = DB::table('thanhpho')->where('id_QuocGia', '=', 238)->get();
        return view('newevent', ['typeevent'=>$typeevent, 'cities'=>$cities]);
    }

    public function createPostNewEvent(Request $request){
        if ($request->hasFile('Fichier1')) {
            $file = $request->file('Fichier1');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('upload', $fileName);
            $filePath = 'upload/'.$fileName;

            $user = $this->getCurrentUser($request);
            $name = $request->input('nameevent');
            $namePost = $request->input('nameevent');
            $typeEvent = $request->input('typeevent');
            $city = $request->input('city');
            $daterange = $request->input('daterange');
            $date = explode(" - ", $daterange);
            $startdate=$date[0]; // piece1
            $stopdate = $date[1];

            $datetimerange = $request->input('datetime');
            $datetime = explode(" - ", $datetimerange);;
            $startdatetime=$datetime[0]; // piece1
            $stopdatetime = $datetime[1];

            $address = $request->input('address');
            $award = $request->input('award');

            $content = $request->input('content');
            $link = $request->input('link');
            $source = $request->input('source');


            DB::table('sukien')->insert([
                'id_NguoiDang'=>$user->id,
                'NgayTao'=>Carbon::now(),
                'AnhBia'=>$filePath,
                'TenSuKien'=>$name,
                'TieuDeBaiDang'=>$namePost,
                'id_LoaiSuKien'=>$typeEvent,
                'id_ThanhPho'=>$city,
                'ThoiGianBatDauDangKy'=>date("Y-m-d", strtotime($startdate)),
                'ThoiGianKetThucDangKy'=>date("Y-m-d", strtotime($stopdate)),
                'ThoiGianBatDauSuKien'=>date("Y-m-d H-i-s", strtotime($startdatetime)),
                'ThoiGianKetThucSuKien'=>date("Y-m-d H-i-s", strtotime($stopdatetime)),
                'DiaDiem'=>$address,
                'GiaiThuong'=>$award,
                'NoiDung'=>$content,
                'LinkDangKy'=>$link,
                'NguonThongTin'=>$source,
                'id_MucBinhLuan'=>2,
                'SoLuotQuanTam'=>0,
                'id_TrangThaiTopic'=>2
            ]);

//            return $nameScholar.$pro.$mytime;
        }else{
            return 'null file';
        }
    }

    public function editEvent(Request $request, $id){
        $user = $this->getCurrentUser($request);
        $event = DB::table('sukien')->where('id_SuKien', '=', $id)->first();

        $typeevent = DB::table('loaisukien')->get();
        $cities = DB::table('thanhpho')->where('id_QuocGia', '=', 238)->get();
        return view('editevent', ['typeevent'=>$typeevent, 'cities'=>$cities, 'event'=>$event, 'id'=>$id]);
    }

    public function editPostEvent(Request $request, $id){
            $user = $this->getCurrentUser($request);
            $name = $request->input('nameevent');
            $namePost = $request->input('nameevent');
            $typeEvent = $request->input('typeevent');
            $city = $request->input('city');
            $daterange = $request->input('daterange');
            $date = explode(" - ", $daterange);
            $startdate=$date[0]; // piece1
            $stopdate = $date[1];

            $datetimerange = $request->input('datetime');
            $datetime = explode(" - ", $datetimerange);;
            $startdatetime=$datetime[0]; // piece1
            $stopdatetime = $datetime[1];

            $address = $request->input('address');
            $award = $request->input('award');

            $content = $request->input('content');
            $link = $request->input('link');
            $source = $request->input('source');

            DB::table('sukien')->where('id_SuKien','=',$id)->update([
                'id_NguoiDang'=>$user->id,
                'TenSuKien'=>$name,
                'TieuDeBaiDang'=>$namePost,
                'id_LoaiSuKien'=>$typeEvent,
                'id_ThanhPho'=>$city,
                'ThoiGianBatDauDangKy'=>date("Y-m-d", strtotime($startdate)),
                'ThoiGianKetThucDangKy'=>date("Y-m-d", strtotime($stopdate)),
                'ThoiGianBatDauSuKien'=>date("Y-m-d H-i-s", strtotime($startdatetime)),
                'ThoiGianKetThucSuKien'=>date("Y-m-d H-i-s", strtotime($stopdatetime)),
                'DiaDiem'=>$address,
                'GiaiThuong'=>$award,
                'NoiDung'=>$content,
                'LinkDangKy'=>$link,
                'NguonThongTin'=>$source,
                'id_MucBinhLuan'=>2,
                'SoLuotQuanTam'=>0,
                'id_TrangThaiTopic'=>2
            ]);

//            return $nameScholar.$pro.$mytime;
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

    public function try(Request $req){
        DB::table('hocbong')->where('deadline','>',date("Y-m-d", time()))->update(['id_TrangThaiHb' => 4]);
        return "aaa";
    }
}
