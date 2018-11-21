<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\NewArticle;
use DB;


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

        $comments = DB::table('binhluan')->where("id_DanhMucBinhLuan","=",$id)
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
    function getPersonal(){
        return view("personal_info");
    }
    function getPersonalEdit(){
        return view("personal_info_edit");
    }

}
