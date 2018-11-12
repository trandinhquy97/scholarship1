<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\NewArticle;
use DB;


class GetDataToViewController extends Controller
{
    function getIndex(){
        $scholarships = DB::table('hocbong')
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
        $scholarships = DB::table('hocbong')
            ->leftjoin('giatrihocbong','hocbong.id_HocBong','=','giatrihocbong.id_GiaTriHb')
            ->leftjoin('donvitien','giatrihocbong.id_DonViTien','=','donvitien.id_DonVi')
            ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
            ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->skip(0)
            ->take(10)->get();
        return view('scholarship', ['scholarships' => $scholarships]);
    }
    function getContests(){
        $contests = DB::table('sukien')->where("id_LoaiSuKien","2")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->skip(0)
            ->take(10)->get();
        return view('contest', ['contests' => $contests]);
    }
    function getWorkshops(){
        $workshops = DB::table('sukien')->where("id_LoaiSuKien","1")
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->skip(0)
            ->take(10)->get();
        return view('workshop', ['workshops' => $workshops]);
    }
}
