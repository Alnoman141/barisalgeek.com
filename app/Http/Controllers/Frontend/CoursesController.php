<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller{

    public function index(){

        $courses = Course::orderBy('id','desc')->get();
        return view('frontend.pages.course.index',compact('courses'));
    }

    public function show($slug){

        $course = Course::where('slug', $slug)->first();
        return view('frontend.pages.course.show',compact('course'));
    }
}
