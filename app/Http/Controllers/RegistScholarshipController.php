<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;


class RegistScholarshipController extends Controller
{
    function registScholarship(Request $request, $idHocBong){
        $currentEmail = $request->session()->get('currentemail');
        DB::table('dangkyhocbong')->insert(
            ['id'=> null,'id_HocBong' => $idHocBong, 'EmailDangKy' => $currentEmail]
        );
        return Redirect::to('/scholarship/'.$idHocBong);
    }
}
