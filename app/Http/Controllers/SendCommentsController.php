<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class SendCommentsController extends Controller
{
    function postComment(Request $request,$id){
        if($request->get("comment_text")!=null)
            DB::table('binhluan')->insert(
                ['id_BinhLuan'=> null,
                    'id_DanhMucBinhLuan' => $id,
                    'id_TaiKhoan' => $request->session()->get('currentid'),
                    'ThoiGian' => Carbon::now(),
                    'NoiDung' => $request->get("comment_text"),
                    'DaChinhSua' => 1,
                    'id_BinhLuanGoc' => 1]
            );
        return Redirect::to('/scholarship/'.$id);
    }
}
