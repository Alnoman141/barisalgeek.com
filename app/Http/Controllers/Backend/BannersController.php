<?php

namespace App\Http\Controllers\Backend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class BannersController extends Controller
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

        $banners = Banner::orderBy('id','desc')->get();
        return view('backend.pages.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('backend.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
           'title'        => 'required|string|max:100',
           'sub_title'    => 'required|string|max:255',
           'image'        => 'required|image|mimes:jpeg,jpg,png,gif',
           'button_text'  => 'nullable|string|max:30',
           'button_link'  => 'nullable|url',
           'admin_id'     => 'numeric',
        ]);

        $banner = new Banner();

        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        $banner->status = $request->status;
        $banner->admin_id = $request->admin_id;

        //insert image
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-Banner'.'-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/banners/'.$image_name);
            Image::make($image)->resize(1920, 900)->save($location);
            $banner->image = $image_name;
        }

        $banner->save();

        session()->flash('success','A New Banner Has Added');
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $banner = Banner::find($id);
        return view('backend.pages.banner.edit',compact('banner'));
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
            'title'        => 'required|string|max:100',
            'sub_title'    => 'required|string|max:255',
            'image'        => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'button_text'  => 'nullable|string|max:30',
            'button_link'  => 'nullable|url',
            'admin_id'     => 'numeric',
        ]);

        $banner = Banner::find($id);

        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->button_text = $request->button_text;
        $banner->button_link = $request->button_link;
        $banner->status = $request->status;
        $banner->admin_id = $request->admin_id;

//        delete old image

        if ($request->image > 0){
            if (File::exists('images/banners/'.$banner->image)){
                File::delete('images/banners/'.$banner->image);
            }
        }

        //insert image
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-Banner'.'-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/banners/'.$image_name);
            Image::make($image)->resize(1920, 900)->save($location);
            $banner->image = $image_name;
        }

        $banner->save();

        session()->flash('success','Banner Has Updated');
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role != 'Editor') {
            $banner = Banner::find($id);

            if (File::exists('images/banners/' . $banner->image)) {
                File::delete('images/banners/' . $banner->image);
            }

            $banner->delete();

            session()->flash('success', 'Banner Has Deleted');
            return redirect()->route('admin.banner.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
