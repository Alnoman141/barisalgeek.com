<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $reviews = Testimonial::orderBy('id','desc')->paginate(12);
        return view('frontend.pages.review.index',compact('reviews'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $testimonial = Testimonial::find($id);
        return view('frontend.pages.review.show',compact('testimonial'));
    }

}
