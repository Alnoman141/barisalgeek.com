<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $galleries = Gallery::orderBy('id','desc')->get();
        return view('frontend.pages.gallery',compact('galleries'));
    }
}
