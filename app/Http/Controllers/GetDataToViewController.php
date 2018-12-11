<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\NewArticle;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class GetDataToViewController extends Controller
{
    function getIndex(){
        $scholarships = DB::table('hocbong')->where("id_TrangThaiHb","=",1)
            ->leftjoin('giatrihocbong','hocbong.id_HocBong','=','giatrihocbong.id_GiaTriHb')
            ->leftjoin('donvitien','giatrihocbong.id_DonViTien','=','donvitien.id_DonVi')
            ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
            ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->take(2)->get();
        $contests = DB::table('sukien')->where("id_LoaiSuKien","2")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->take(2)->get();
        $workshops = DB::table('sukien')->where("id_LoaiSuKien","1")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->take(2)->get();
        return view('index', ['scholarships' => $scholarships, 'contests' => $contests, 'workshops' => $workshops]);
    }
    function getScholarships(){
        $scholarships = DB::table('hocbong')->where("id_TrangThaiHb","=",1)
            ->leftjoin('giatrihocbong','hocbong.id_HocBong','=','giatrihocbong.id_GiaTriHb')
            ->leftjoin('donvitien','giatrihocbong.id_DonViTien','=','donvitien.id_DonVi')
            ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
            ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->paginate(4);
        return view('scholarship', ['scholarships' => $scholarships]);
    }
    function getContests(){
        $contests = DB::table('sukien')->where("id_LoaiSuKien","2")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->paginate(4);
        return view('contest', ['contests' => $contests]);
    }
    function getWorkshops(){
        $workshops = DB::table('sukien')->where("id_LoaiSuKien","1")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->paginate(4);
        return view('workshop', ['workshops' => $workshops]);
    }
    function getScholarshipDetail(Request $request, $id){
        $thisScholarship = DB::table('hocbong')->where("hocbong.id_HocBong",$id)
            ->leftjoin('giatrihocbong','hocbong.id_HocBong','=','giatrihocbong.id_GiaTriHb')
            ->leftjoin('donvitien','giatrihocbong.id_DonViTien','=','donvitien.id_DonVi')
            ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
            ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->leftjoin('taikhoan','taikhoan.id','=','hocbong.id_NguoiDang')
            ->leftjoin('bachoc','bachoc.id_BacHoc','=','hocbong.id_BacHoc')
            ->leftjoin('nganhhoc','nganhhoc.id_Nganhhoc','=','hocbong.id_NganhHoc')
            ->leftjoin('dieukienngoaingu','dieukienngoaingu.id_HocBong','=','hocbong.id_HocBong')
            ->leftjoin('chungchingoaingu','dieukienngoaingu.id_ChungChi','=','chungchingoaingu.id_ChungChi')
            ->take(1)->get();
        $thisForeignCirtifications = DB::table('dieukienngoaingu')->where("id_HocBong",$id)
            ->leftjoin('chungchingoaingu','chungchingoaingu.id_ChungChi','=','dieukienngoaingu.id_ChungChi')
            ->get();


//        LeftBar
        $scholarships = DB::table('hocbong')->where("id_TrangThaiHb","=",1)
            ->leftjoin('giatrihocbong','hocbong.id_HocBong','=','giatrihocbong.id_GiaTriHb')
            ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
            ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->leftjoin('nganhhoc','nganhhoc.id_Nganhhoc','=','hocbong.id_NganhHoc')
            ->take(8)->get();

        $comments = DB::table('binhluan')->where("id_DanhMucBinhLuan","=",$id)->where('id_LoaiSuKien','=','0')
            ->leftjoin('taikhoan','binhluan.id_TaiKhoan','=','taikhoan.id')
            ->get();

        $currentAccount = DB::table('taikhoan')->where('email','=',$request->session()->get('currentemail'))->first();
        $checkInDataBaseRegisted = false;
        $rows = DB::table('dangkyhocbong')->where('EmailDangKy','=',$request->session()->get('currentemail'))
            ->where('id_HocBong','=',$id)->get();;
        foreach ($rows as $row){
            $checkInDataBaseRegisted = true;
        }
        return view('detailscholarship',['scholarship'=>$thisScholarship[0],'ForeignCirtifications'=>$thisForeignCirtifications,'rightBarScholarships'=>$scholarships,'currentAccount'=>$currentAccount,'checkInDataBaseRegisted'=>$checkInDataBaseRegisted, 'comments'=>$comments,'id'=>$id]);
    }
    function getWorkshopDetail(Request $request, $id){
        $workshopDetail = DB::table('sukien')->where('id_SuKien','=',$id)
            ->leftjoin('taikhoan','sukien.id_NguoiDang','=','taikhoan.id')
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->first();
        $workshops = DB::table('sukien')->where("id_LoaiSuKien","1")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->take(8)->get();
        $comments = DB::table('binhluan')->where("id_DanhMucBinhLuan","=",$id)->where('id_LoaiSuKien','=','1')
            ->leftjoin('taikhoan','binhluan.id_TaiKhoan','=','taikhoan.id')
            ->get();
        return view('detailevent',['workshopDetail' => $workshopDetail,'workshops' => $workshops,'comments' => $comments,'id'=>$id]);
    }
    function getContestDetail(Request $request, $id){
        $contestDetail = DB::table('sukien')->where('id_SuKien','=',$id)
            ->leftjoin('taikhoan','sukien.id_NguoiDang','=','taikhoan.id')
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->first();
        $contest = DB::table('sukien')->where("id_LoaiSuKien","2")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->take(8)->get();
        $comments = DB::table('binhluan')->where("id_DanhMucBinhLuan","=",$id)->where('id_LoaiSuKien','=','2')
            ->leftjoin('taikhoan','binhluan.id_TaiKhoan','=','taikhoan.id')
            ->get();
        return view('detailcontest',['contestDetail' => $contestDetail,'contests' => $contest,'comments' => $comments,'id'=>$id]);
    }

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
    function getPersonal(Request $request){
        $user = $this->getCurrentUser($request);
        $id = $user->id;
        $email = $user->email;
        $profile = DB::table('thongtintaikhoan')->where('id_TaiKhoan','=',$id)->first();
        return view("personal_info", ['profile' => $profile],['email' => $email]);
    }
    function getPersonalEdit(Request $request){

        $user = $this->getCurrentUser($request);
        $id = $user->id;
        $email = $user->email;
        $profile = DB::table('thongtintaikhoan')->where('id_TaiKhoan','=',$id)->first();
        return view("personal_info_edit",['profile' => $profile],['email' => $email]);
    }
    function postInfoEdit(Request $request){
        $user = $this->getCurrentUser($request);
        $id = $user->id;

        $hovaten = $request->input("HoVaTen");
        $gioitinh = $request->input("GioiTinh");
        $ngaysinh = $request->input("NgaySinh");
        $quequan = $request->input("QueQuan");
        $diachi = $request->input("DiaChi");
        $sdt = $request->input("SDT");
        DB::table('thongtintaikhoan')->where('id_TaiKhoan','=',$id)->update(['HoVaTen'=> $hovaten,'GioiTinh'=> $gioitinh,'NgaySinh'=> $ngaysinh,'QueQuan'=> $quequan,'DiaChi'=> $diachi,'SDT'=> $sdt]);
        return redirect("/personal_info");
    }
    function getPasswordEdit(Request $request){
        return view("changepw");
    }
    function postPasswordEdit(Request $request){
        $oldpassword = $request->input("password");
        $newpassword = $request->input("passwordnew");
        $validnewpassword = $request->input("passwordconf");

        $currentid = $request->session()->get('currentid');
        $currentpass = DB::table('taikhoan')->where('id','=',$currentid)->first()->password;
        $passwordIsOk = password_verify( $oldpassword, $currentpass);
        if(DB::table('taikhoan')->where('id','=',$currentid)->count()>0&&$newpassword==$validnewpassword&&$passwordIsOk){
            DB::table('taikhoan')->where('id','=',$currentid)->update(['password'=> Hash::make($newpassword)]);
            Auth::logout();
            Session::flush();
            return "<script>window.top.location.href = \"/login\";</script>";
        };
        return view("changepw");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function postPosthb(Request $request){
        $user = $this->getCurrentUser($request);
        $id = $user->id;
        $tenhb = $request->input("tenhb");
        $idloaihb = $request->input("loaihb");
        $idnganhhoc = $request->input("nganhhoc");
        $idbachoc = $request->input("bachoc");
        $idtruonghoc = $request->input("truonghoc");
        $iddonvitien = $request->input("donvitien");
        $deadline = $request->input("deadline");
        $link = $request->input("link");
        $sotenmin=$request->input("sotienmin");
        $sotenmax=$request->input("sotienmax");
        $coverimage = $request->file("coverimage");
        $ext = $coverimage->getClientOriginalExtension();
        $urlimage = "css/pictures/".$coverimage;
        $savefile = microtime().'.'.$ext;
        $coverimage->move("css/pictures/",$savefile);
        $soluong = $request->input("soluong");
        $yeucau = $request->input("yeucau");
        $thutuc = $request->input("thutuc");
        $giatrihocbongnew = DB::table('giatrihocbong')->insert(['SoTienMin'=> $sotenmin,'SoTienMax'=> $sotenmax,'id_DonViTien'=> $iddonvitien,'MoTa'=>"",'PhanTramHb'=>0]);

        $idgratrihb = DB::getPdo()->lastInsertId();

            DB::table('hocbong')->insert(['id_NguoiDang'=> $id,'AnhBia'=> $urlimage,'TenHocBong'=> $tenhb,'id_LoaiHb'=> $idloaihb,'deadline'=> $deadline,'id_TruongHoc'=> $idtruonghoc,
            'id_BacHoc'=> $idbachoc,'id_GiaTriHb'=> $idgratrihb,'NguonThongTin'=> '','id_NganhHoc'=> $idnganhhoc,'SoLuong'=> $soluong,'YeuCau'=> $yeucau,'ThuTucNop'=> $thutuc,'LinkDangKy'=> $link,'SoLuotQuanTam'=> 0,'id_TrangThaiHb'=> 2]);
        return redirect("/dashbroad");
    }
    function getPosthb(Request $request){
        $bachoc = DB::table('bachoc')->get();
        $loaihb = DB::table('loaihocbong')->get();
        $nganhhoc = DB::table('nganhhoc')->get();
        $truonghoc = DB::table('truonghoc')->get();
        $quocgia = DB::table('quocgia')->get();
        $donvitien = DB::table('donvitien')
            ->get();
        return view("post",['bachoc' => $bachoc,'loaihb' => $loaihb,'truonghoc' => $truonghoc,'nganhhoc' => $nganhhoc,'quocgia' => $quocgia,'donvitien' => $donvitien]);
    }
}
