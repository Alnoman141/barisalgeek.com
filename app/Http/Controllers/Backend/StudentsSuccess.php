<?php

namespace App\Http\Controllers\Backend;

use App\Models\Success;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class StudentsSuccess extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $successes = Success::orderBy('id','desc')->get();
        return view('backend.pages.success.index',compact('successes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('backend.pages.success.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'course_id'    => 'numeric|required',
            'batch_id'    => 'numeric|required',
            'student_id'   => 'string|required',
            'image'        => 'required|mimes:png,jpg,jepg,gif',
        ]);

        $success = new Success();

        $success->course_id   = $request->course_id;
        $success->batch_id   = $request->batch_id;
        $success->student_id   = $request->student_id;

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-'.'Students-Success-image-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/success/'.$image_name);
            Image::make($image)->save($location);
            $success->image = $image_name;
        }

        $success->save();

        session()->flash('success',' Student Success Has Created');
        return redirect()->route('admin.success.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $success = Success::find($id);
        return view('backend.pages.success.edit',compact('success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id'    => 'numeric|required',
            'batch_id'    => 'numeric|required',
            'student_id'   => 'string|required',
            'image'        => 'nullable|mimes:png,jpg,jepg,gif',
        ]);

        $success = Success::find($id);

        $success->course_id   = $request->course_id;
        $success->batch_id   = $request->batch_id;
        $success->student_id   = $request->student_id;

        if (isset($request->image)){
            if (File::exists('images/success/'.$success->image)){
                File::delete('images/success/'.$success->image);
            }
        }

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-'.'Students-Success-image-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/success/'.$image_name);
            Image::make($image)->save($location);
            $success->image = $image_name;
        }

        $success->save();

        session()->flash('success',' Student Success Has Updated');
        return redirect()->route('admin.success.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role != 'Editor') {
            $success = Success::find($id);

            if (File::exists('images/success/' . $success->image)) {
                File::delete('images/success/' . $success->image);
            }

            $success->delete();

            session()->flash('success', ' Student Success Has Deleted');
            return redirect()->route('admin.success.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
