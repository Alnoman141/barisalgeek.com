<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Logo;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $logo = Logo::first();
        $portfolios = Portfolio::orderBy('id','desc')->where('status',1)->limit(12)->get();
        return view('frontend.pages.index',compact('portfolios',compact('logo')));
    }

    public function pageNotFound(){
        return view('frontend.pages.error-page.404');
    }
}
