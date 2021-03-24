<?php

namespace App\Http\Controllers\Backend;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class LogoController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function edit($id){
        if(Auth::user()->role == 'Super-Admin') {
            $logo = Logo::find($id);
            return view('backend.pages.logo.edit', compact('logo'));
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request, $id){

        $request->validate([
           'image'   => 'required'
        ]);


        $logo = Logo::find($id);

////delete old icon

        if (File::exists('images/logo/'.$logo->logo)){
            File::delete('images/logo/'.$logo->logo);
        }
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'-Logo'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/logo/'.$image_name);
            Image::make($image)->save($location);
            $logo->image = $image_name;
        }

        $logo->save();

        session()->flash('success','Logo Has Updated');
        return redirect()->route('admin.index');
    }
}
