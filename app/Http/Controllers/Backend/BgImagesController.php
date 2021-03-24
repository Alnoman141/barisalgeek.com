<?php

namespace App\Http\Controllers\Backend;

use App\Models\BgImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class BgImagesController extends Controller{

    public function __construct(){
        return $this->middleware('auth:admin');
    }

    public function edit($id){
        if (Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin') {
            $bg = BgImages::find($id);
            return view('backend.pages.bg-images.edit', compact('bg'));
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request, $id){

        $request->validate([
            'portfolio_bg'   => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'subscribe_bg'   => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'about_bg'   => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        $bg = BgImages::find($id);

//        delete portfolio_bg image
        if ($request->portfolio_bg > 0){
            if (File::exists('images/bg/'.$bg->portfolio_bg)){
                File::delete('images/bg/'.$bg->portfolio_bg);
            }
        }

        //insert portfolio_bg image
        if ($request->portfolio_bg > 0){
            $image = $request->file('portfolio_bg');
            $image_name = 'BarisalGeek-Bg-'.'Portfolio-Background'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/bg/'.$image_name);
            Image::make($image)->resize(1920,900)->save($location);
            $bg->portfolio_bg = $image_name;
        }

//        delete subscribe_bg image
        if ($request->subscribe_bg > 0){
            if (File::exists('images/bg/'.$bg->subscribe_bg)){
                File::delete('images/bg/'.$bg->subscribe_bg);
            }
        }

        //insert portfolio_bg image
        if ($request->subscribe_bg > 0){
            $image = $request->file('subscribe_bg');
            $image_name = 'BarisalGeek-Bg-'.'Subscribe-Background'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/bg/'.$image_name);
            Image::make($image)->resize(1920,900)->save($location);
            $bg->subscribe_bg = $image_name;
        }

//        delete about_bg image
        if ($request->about_bg > 0){
            if (File::exists('images/bg/'.$bg->about_bg)){
                File::delete('images/bg/'.$bg->about_bg);
            }
        }

        //insert about_bg image
        if ($request->about_bg > 0){
            $image = $request->file('about_bg');
            $image_name = 'BarisalGeek-Bg-'.'About-Background'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/bg/'.$image_name);
            Image::make($image)->resize(1920,900)->save($location);
            $bg->about_bg = $image_name;
        }

        $bg->save();

        session()->flash('success','Background Image Has Updated');
        return redirect()->route('admin.index');
    }
}
