<?php

namespace App\Http\Controllers\Backend;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class BatchesController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $batches = Batch::orderBy('id','desc')->get();
        return view('backend.pages.batch.index',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('backend.pages.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'name'         => 'required|string|max:255,unique:batches',
            'description'  => 'nullable',
            'image'        => 'required|image|mimes:jpeg,jpg,png,gif',
            'type'         => 'required|numeric|max:10',
            'total_students' => 'nullable|numeric|max:10',
        ]);

        $batch = new Batch();

        $batch->name = $request->name;
        $batch->description = $request->description;
        $batch->type = $request->type;
        $batch->total_students = $request->total_students;
        $batch->slug = str_slug($request->name);

        //insert image
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-Student'.'-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
            $location = public_path('images/batch/'.$image_name);
            Image::make($image)->save($location);
            $batch->image = $image_name;
        }

        $batch->save();

        session()->flash('success','A New Batch Has Added');
        return redirect()->route('admin.batch.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $batch = Batch::find($id);
        return view('backend.pages.batch.edit',compact('batch'));
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
            'name'         => 'required|string|max:100,unique:batches',
            'description'  => 'nullable',
            'image'        => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'type'         => 'required|numeric|max:10',
            'total_students' => 'nullable|numeric|max:10',
        ]);

        $batch = Batch::find($id);

        $batch->name = $request->name;
        $batch->description = $request->description;
        $batch->type = $request->type;
        $batch->total_students = $request->total_students;
        $batch->slug = str_slug($request->name);

//        delete old image

        if ($request->image > 0){
            if (File::exists('images/batch/'.$batch->image)){
                File::delete('images/batch/'.$batch->image);
            }
        }

        //insert image
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek-Student'.'-'.str_slug($request->name).'.'.$image->getClientOriginalExtension();
            $location = public_path('images/batch/'.$image_name);
            Image::make($image)->save($location);
            $batch->image = $image_name;
        }

        $batch->save();

        session()->flash('success','Batch Has Updated');
        return redirect()->route('admin.batch.index');
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
            $batch = Batch::find($id);

            if (File::exists('images/batch/' . $batch->image)) {
                File::delete('images/batch/' . $batch->image);
            }

            $batch->delete();
            session()->flash('success', 'Batch Has Deleted');
            return redirect()->route('admin.batch.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
