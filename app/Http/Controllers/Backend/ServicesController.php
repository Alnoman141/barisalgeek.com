<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class ServicesController extends Controller
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
        $services = Service::orderBy('id','desc')->get();
        return view('backend.pages.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('backend.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
             'title'   => 'required|string|max:50|unique:services',
             'description'   => 'required|string',
             'icon'   => 'required|unique:services',
        ]);

        $service = new Service();

        $service->title = $request->title;
        $service->description = $request->description;
        $service->slug = str_slug($request->title);

        if ($request->icon > 0){
            $image = $request->file('icon');
            $image_name = 'BarisalGeek'.'-icon'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/services/'.$image_name);
            Image::make($image)->resize(100,100)->save($location);
            $service->icon = $image_name;
        }

        $service->save();

        session()->flash('success','A New Service Has Created');
        return redirect()->route('admin.service.index');
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
    public function edit($id)
    {
        $service = Service::find($id);
        return view('backend.pages.service.edit',compact('service'));
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
            'title'   => 'required|string|max:50|unique:services,id',
            'description'   => 'required|string',
            'icon'   => 'unique:services',
        ]);

        $service = Service::find($id);

        $service->title = $request->title;
        $service->slug = str_slug($request->title);
        $service->description = $request->description;
//delete old icon

        if ($request->icon > 0) {
            if (File::exists('images/services/' . $service->icon)) {
                File::delete('images/services/' . $service->icon);
            }
        }
        if ($request->icon > 0){
            $image = $request->file('icon');
            $image_name = 'BarisalGeek'.'-icon'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/services/'.$image_name);
            Image::make($image)->resize(100,100)->save($location);
            $service->icon = $image_name;
        }


        $service->save();
        session()->flash('success',' Service Has Updated');
        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role != 'Editor') {
            $service = Service::find($id);
            //delete old icon
            if (File::exists('images/services/' . $service->icon)) {
                File::delete('images/services/' . $service->icon);
            }

            $service->delete();

            session()->flash('success', 'Service Has Deleted');
            return redirect()->route('admin.service.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
