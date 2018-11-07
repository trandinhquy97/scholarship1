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
        return view('index', ['scholarships' => $scholarships]);
    }
}
