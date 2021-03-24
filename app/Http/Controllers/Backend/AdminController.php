<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image as Image;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $admins = Admin::orderBy('id','desc')->get();
       return view('auth.admin.index',compact('admins'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('auth.admin.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $admin = Admin::find($id);
        if (Auth::user()->role == $admin->role) {
            return view('auth.admin.edit', compact('admin'));
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
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
            'name' => 'required|max:255|string',
            'username' => 'nullable|max:255|string',
            'phone' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
        ]);
        $admin = Admin::find($id);
        $admin->name     = $request->name;
        $admin->username = $request->username;
        $admin->phone    = $request->phone;
        $admin->slug     = str_slug($request->username);

        //        delete old image
        if (File::exists('images/admins/'.$admin->image)){
            File::delete('images/admins/'.$admin->image);
        }
        //insert image
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'neershop'.'-'.$admin->name.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/admins/'.$image_name);
            Image::make($image)->save($location);
            $admin->image = $image_name;
        }
        $admin->save();
        session()->flash('success','Profile Has Updated');
        return redirect()->route('admin.show',$admin->id);
    }

    public function block($id){
        if (Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin') {
            $admin = Admin::find($id);
            $admin->status =2;
            $admin->save();

            session()->flash('success','Blocked Done');
            return redirect()->route('admin.list');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function unblock($id){
        if (Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin') {
            $admin = Admin::find($id);
            $admin->status =1;
            $admin->save();

            session()->flash('success','Unblocked Done');
            return redirect()->route('admin.list');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role == 'Super-Admin'){
            $admin = Admin::find($id);
            if (!is_null($admin)){
    //          Delete Category Image
                if (File::exists('images/admins/'.$admin->image)){
                    File::delete('images/admins/'.$admin->image);
                }
                $admin->delete();
            }

            session()->flash('success','Admin Has Deleted Successfully');

            return redirect()->route('admin.list');
        }
        else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
