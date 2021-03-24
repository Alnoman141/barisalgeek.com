<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class GalleryController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $galleries = Gallery::orderBy('id','desc')->get();
        return view('backend.pages.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('backend.pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'caption'   => 'required|string|max:255',
            'image'     => 'required|image|mimes:jpg,png,jpeg,gif,svg,pdf',
        ]);

        $gallery = new Gallery();

        $gallery->caption = $request->caption;

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'gallery-image-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/gallery/'.$image_name);
            Image::make($image)->save($location);
            $gallery->image = $image_name;
        }

        $gallery->save();

        session()->flash('success','A New Gallery Has Created');
        return redirect()->route('admin.gallery.index');
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

        $gallery = Gallery::find($id);
        return view('backend.pages.gallery.edit',compact('gallery'));
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
            'caption'   => 'required|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,pdf',
        ]);

        $gallery = Gallery::find($id);

        $gallery->caption = $request->caption;

        if ($request->image > 0 ){
            if (File::exists('images/gallery/'.$gallery->image)){
                File::delete('images/gallery/'.$gallery->image);
            }
        }

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'gallery-image-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/gallery/'.$image_name);
            Image::make($image)->save($location);
            $gallery->image = $image_name;
        }

        $gallery->save();

        session()->flash('success','Gallery Has Updated');
        return redirect()->route('admin.gallery.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role != 'Editor') {
            $gallery = Gallery::find($id);

            if (File::exists('images/gallery/' . $gallery->image)) {
                File::delete('images/gallery/' . $gallery->image);
            }

            $gallery->delete();

            session()->flash('success', 'Gallery Has Deleted');
            return redirect()->route('admin.gallery.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
