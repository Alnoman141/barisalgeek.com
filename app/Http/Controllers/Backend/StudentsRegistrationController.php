<?php

namespace App\Http\Controllers\Backend;

use App\Models\RegisterStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StudentsRegistrationController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $students = RegisterStudent::orderBy('id','desc')->get();
        return view('backend.pages.registerstudents.index',compact('students'));
    }

    public function seen(Request $request ,$id){
        $request->validate([
            'status'    => 'numeric',
        ]);

        $student = RegisterStudent::find($id);

        $student->status = 1;

        $student->save();

        session()->flash('success',' Student Has Seen');
        return redirect()->route('admin.register.student.index');
    }

    public function destroy($id){
        if (Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin') {
            $student = RegisterStudent::find($id);

            $student->delete();

            session()->flash('success', ' Student Has Deleted');
            return redirect()->route('admin.register.student.index');
        }else {
            session()->flash('errormsg', 'You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
