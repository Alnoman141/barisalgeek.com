<?php

namespace App\Http\Controllers\Backend;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class StudentsController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){


        $students = Student::orderBy('id','desc')->get();
        return view('backend.pages.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('backend.pages.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
           'first_name'    => 'string|max:255',
           'last_name'    => 'string|required|max:255',
           'course_id'    => 'numeric|required|max:255',
           'batch_id'    => 'numeric|required|max:255',
           'student_id'   => 'string|required|max:255|unique:students',
           'image'        => 'image|required|mimes:png,jpg,jepg,gif',
        ]);

        $student = new Student();

        $student->first_name   = $request->first_name;
        $student->last_name   = $request->last_name;
        $student->name   = $request->first_name.' ' .$request->last_name;
        $student->course_id   = $request->course_id;
        $student->batch_id   = $request->batch_id;
        $student->student_id   = $request->student_id;

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-'.'Students-image-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/student/'.$image_name);
            Image::make($image)->save($location);
            $student->image = $image_name;
        }

        $student->save();

        session()->flash('success','A New Student Has Created');
        return redirect()->route('admin.student.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $student = Student::find($id);
        return view('backend.pages.student.edit',compact('student'));
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
            'first_name'    => 'string|max:255',
            'last_name'    => 'string|required|max:255',
            'course_id'    => 'numeric|required|max:255',
            'batch_id'    => 'numeric|required|max:255',
            'student_id'   => 'string|required|max:255|unique:students,id',
            'image'        => 'nullable|mimes:png,jpg,jepg,gif',
        ]);

        $student = Student::find($id);

        $student->first_name   = $request->first_name;
        $student->last_name   = $request->last_name;
        $student->name   = $request->first_name.' ' .$request->last_name;
        $student->course_id   = $request->course_id;
        $student->batch_id   = $request->batch_id;
        $student->student_id   = $request->student_id;

        if (isset($request->image)){
            if (File::exists('images/student/'.$student->image)){
                File::delete('images/student/'.$student->image);
            }
        }

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-'.'Students-image-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/student/'.$image_name);
            Image::make($image)->save($location);
            $student->image = $image_name;
        }

        $student->save();

        session()->flash('success',' Student Has Updated');
        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role != 'Editor') {
            $student = Student::find($id);

            if (File::exists('images/student/' . $student->image)) {
                File::delete('images/student/' . $student->image);
            }

            $student->delete();

            session()->flash('success', ' Student Has Deleted');
            return redirect()->route('admin.student.index');
        }
        else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
