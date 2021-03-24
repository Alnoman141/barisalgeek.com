<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RegisterStudent;
use App\Notifications\NewStudentRegister;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\Admin;

class StudentsRegisterController extends Controller{

    public $admin;
    public function store(Request $request){

        $validator = $request->validate([
           'name'   => 'required|string|max:255',
           'email'   => 'required|email',
           'phone'   => 'required|numeric',
           'course_id'   => 'required|numeric',
        ]);

        $register = new RegisterStudent();

        $register->name = $request->name;
        $register->email = $request->email;
        $register->phone = $request->phone;
        $register->course_id = $request->course_id;


        if ($register) {
            $register->save();
            $this->admin = Admin::where('role','Super-Admin')->first();

            $this->admin->notify(new NewStudentRegister($register));
            $notification = array(
                'message' => 'Register Done',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => $validator,
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
    }
}
