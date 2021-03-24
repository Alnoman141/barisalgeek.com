<?php

namespace App\Http\Controllers\Backend;

use App\Models\CommonBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class CommonBannerController extends Controller{

    public function __construct(){

        $this->middleware('auth:admin');
    }

    public function edit($id){
        if (Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin') {
            $banner = CommonBanner::find($id);
            return view('backend.pages.common-banner.edit', compact('banner'));
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request, $id){

        $request->validate([
           'image'  => 'required|image|mimes:jpg,jpeg,gif,png'
        ]);

        $banner = CommonBanner::find($id);

        //        delete old image

        if ($request->image > 0){
            if (File::exists('images/banners/common-banner/'.$banner->image)){
                File::delete('images/banners/common-banner/'.$banner->image);
            }
        }

        //insert image
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-Common-Banner'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/banners/common-banner/'.$image_name);
            Image::make($image)->resize(1920,450)->save($location);
            $banner->image = $image_name;
        }

        $banner->save();

        session()->flash('success','Common-Banner Has Updated');
        return redirect()->route('admin.index');
    }
}
