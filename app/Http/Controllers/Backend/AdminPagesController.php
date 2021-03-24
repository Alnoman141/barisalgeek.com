<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPagesController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('backend.pages.dashboard');
    }

    public function adminPrivilege(){
        $admins = Admin::all();
        return view('backend.pages.admin-privilege.admin-privilege',compact('admins'));
    }


}
