<?php

namespace App\Http\Controllers\Frontend;

use App\Models\FFQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FFQControllers extends Controller{

    public function index(){

        $ffqs = FFQ::orderBy('id','desc')->get();
        return view('frontend.pages.ffq',compact('ffqs'));
    }
}
