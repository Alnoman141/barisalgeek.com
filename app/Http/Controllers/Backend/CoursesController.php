<?php

namespace App\Http\Controllers\Backend;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class CoursesController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $courses = Course::orderBy('id','desc')->get();
        return view('backend.pages.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.pages.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
           'name'    => 'required|string|unique:courses|max:255',
           'course_topic'    => 'required|string',
           'class_number'    => 'nullable|numeric',
           'duration'    => 'required|string|max:255',
           'outline'    => 'required',
           'description'    => 'required',
           'image'    => 'required|image|mimes:jpg,jpeg,png,gif',
           'price'    => 'required|numeric',
           'offer_price'    => 'nullable|numeric',
           'class_day'    => 'nullable|string|max:255',
           'class_time'    => 'nullable|string|max:255',
           'class_duration'    => 'nullable|string|max:255',
           'seats'    => 'nullable|numeric',
           'class_starts'    => 'nullable|date',
           'class_ends'      => 'nullable|date',
        ]);

        $course = new Course();

        $course->name = $request->name;
        $course->course_topic = $request->course_topic;
        $course->outline = $request->outline;
        $course->description = $request->description;
        $course->class_number = $request->class_number;
        $course->price = $request->price;
        $course->offer_price = $request->offer_price;
        $course->class_day = $request->class_day;
        $course->class_time = $request->class_time;
        $course->class_duration = $request->class_duration;
        $course->seats = $request->seats;
        $course->class_starts = $request->class_starts;
        $course->class_ends = $request->class_ends;
        $course->duration = $request->duration;
        $course->slug = str_slug($request->name);

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'Course-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
            $location = public_path('images/course/'.$image_name);
            Image::make($image)->save($location);
            $course->image = $image_name;
        }

        $course->save();

        session()->flash('success','A New Course Has Created');
        return redirect()->route('admin.course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $course = Course::find($id);
        return view('backend.pages.course.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $course = Course::find($id);
        return view('backend.pages.course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'name'    => 'required|string|unique:courses,id|max:255',
            'course_topic'    => 'required|string',
            'class_number'    => 'nullable|numeric',
            'duration'    => 'required|string|max:255',
            'outline'    => 'required',
            'description'    => 'required',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'price'    => 'required|numeric',
            'offer_price'    => 'nullable|numeric',
            'class_day'    => 'nullable|string|max:255',
            'class_time'    => 'nullable|string|max:255',
            'class_duration'    => 'nullable|string|max:255',
            'seats'    => 'nullable|numeric',
            'class_starts'    => 'nullable|date',
            'class_ends'      => 'nullable|date',
        ]);

        $course = Course::find($id);

        $course->name = $request->name;
        $course->course_topic = $request->course_topic;
        $course->outline = $request->outline;
        $course->description = $request->description;
        $course->class_number = $request->class_number;
        $course->price = $request->price;
        $course->offer_price = $request->offer_price;
        $course->class_day = $request->class_day;
        $course->class_time = $request->class_time;
        $course->class_duration = $request->class_duration;
        $course->seats = $request->seats;
        $course->class_starts = $request->class_starts;
        $course->class_ends = $request->class_ends;
        $course->duration = $request->duration;
        $course->slug = str_slug($request->name);

        if (isset($request->image)){
          if (File::exists('images/course/'.$course->image)){
              File::delete('images/course/'.$course->image);
          }
        };

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'Course-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
            $location = public_path('images/course/'.$image_name);
            Image::make($image)->save($location);
            $course->image = $image_name;
        }

        $course->save();

        session()->flash('success',' Course Has Updated');
        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role != 'Editor') {
            $course = Course::find($id);

            if (File::exists('images/course/' . $course->image)) {
                File::delete('images/course/' . $course->image);
            }

            $course->delete();

            session()->flash('success', ' Course Has Deleted');
            return redirect()->route('admin.course.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
