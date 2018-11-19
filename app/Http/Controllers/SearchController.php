<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    function postSearch(Request $request){
        $search_key = $request->search;
        $request->session()->put('currentSearch', $search_key);
        $search_scholarship_data = DB::table('hocbong')->where('TenHocBong', 'like', '%'. $request->session()->get('currentSearch').'%')
            ->leftjoin('giatrihocbong','hocbong.id_HocBong','=','giatrihocbong.id_GiaTriHb')
            ->leftjoin('donvitien','giatrihocbong.id_DonViTien','=','donvitien.id_DonVi')
            ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
            ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')->paginate(6);
        $search_contest_data = DB::table('sukien')->where("id_LoaiSuKien","2")->where('TenSuKien', 'like', '%'. $request->session()->get('currentSearch').'%')
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->paginate(6);
        $search_workshop_data = DB::table('sukien')->where("id_LoaiSuKien","1")->where('TenSuKien', 'like', '%'. $request->session()->get('currentSearch').'%')
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->paginate(6);
        return view('searchinfo', ['search_scholarship_data' => $search_scholarship_data, 'search_contest_data' => $search_contest_data, 'search_workshop_data' => $search_workshop_data]);
    }
    function getSearch(Request $request){
        $search_scholarship_data = DB::table('hocbong')->where('TenHocBong', 'like', '%'. $request->session()->get('currentSearch').'%')
            ->leftjoin('giatrihocbong','hocbong.id_HocBong','=','giatrihocbong.id_GiaTriHb')
            ->leftjoin('donvitien','giatrihocbong.id_DonViTien','=','donvitien.id_DonVi')
            ->leftjoin('truonghoc','hocbong.id_TruongHoc','=','truonghoc.id_TruongHoc')
            ->leftjoin('thanhpho','truonghoc.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')->paginate(6);
        $search_contest_data = DB::table('sukien')->where("id_LoaiSuKien","2")->where('TenSuKien', 'like', '%'. $request->session()->get('currentSearch').'%')
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->paginate(6);
        $search_workshop_data = DB::table('sukien')->where("id_LoaiSuKien","1")->where('TenSuKien', 'like', '%'. $request->session()->get('currentSearch').'%')
            ->leftjoin('thanhpho','sukien.id_ThanhPho','=','thanhpho.id_ThanhPho')
            ->leftjoin('quocgia','thanhpho.id_QuocGia','=','quocgia.id_QuocGia')
            ->paginate(6);
        return view('searchinfo', ['search_scholarship_data' => $search_scholarship_data, 'search_contest_data' => $search_contest_data, 'search_workshop_data' => $search_workshop_data]);
    }
}
