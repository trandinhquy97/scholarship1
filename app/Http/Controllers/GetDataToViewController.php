<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetDataToViewController extends Controller
{
    function getIndex(){
        return view('index');
    }
}
