<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyController extends Controller
{
    public function verify($token){
        $admin = Admin::where('remember_token',$token)->first();

        if (!is_null($admin)){
            $admin->status =1;
            $admin->remember_token = NULL;
            $admin->email_verified_at = time();

            $admin->save();
            session()->flash('success','Your Verification Successful');
            return redirect()->route('admin.login');
        }else{
            session()->flash('errormsg','Sorry! Your token is not matched!!! ');
            return redirect()->route('admin.login');
        }
    }
}
