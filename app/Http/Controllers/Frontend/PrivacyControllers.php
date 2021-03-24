<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyControllers extends Controller{

    public function index(){

        $privacy = Privacy::orderBy('id','desc')->first();
        return view('frontend.pages.privacy',compact('privacy'));
    }
}
