<?php

namespace App\Http\Controllers\Backend;

use App\Models\About;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image as Image;
use File;
use Auth;

class AboutPageController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){

        $teams = Team::orderBy('id','desc')->get();
        return view('backend.pages.team.index',compact('teams'));
    }

    public function create(){
        if (Auth::user()->role != 'Editor') {
            return view('backend.pages.team.create');
        }else {
            session()->flash('errormsg', 'You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function store(Request $request){
        $request->validate([
           'name'   => 'required|string|unique:teams',
           'designation'   => 'required|string',
           'image'   => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->designation = $request->designation;

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'-team-member-'.$request->name.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/about/team/'.$image_name);
            Image::make($image)->save($location);
            $team->image = $image_name;
        }

        $team->save();

        session()->flash('success','A New Team Member Has Created');
        return redirect()->route('admin.team.index');
    }

    public function editTeam($id){
        if (Auth::user()->role != 'Editor') {
            $team= Team::find($id);
            return view('backend.pages.team.edit',compact('team'));
        }else {
            session()->flash('errormsg', 'You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function updateTeam(Request $request , $id){
        $request->validate([
            'name'   => 'required|string|unique:teams,id',
            'designation'   => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $team = Team::find($id);

        $team->name = $request->name;
        $team->designation = $request->designation;

        if ($request->image > 0){
            if (File::exists('images/about/team/'.$team->image)){
                File::delete('images/about/team/'.$team->image);
            }
        }

        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'-team-member-'.$request->name.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/about/team/'.$image_name);
            Image::make($image)->resize(512,512)->save($location);
            $team->image = $image_name;
        }

        $team->save();

        session()->flash('success','A New Team Member Has Created');
        return redirect()->route('admin.team.index');
    }

    public function edit($id){
        if (Auth::user()->role == 'Super-Admin'){
           $about = About::find($id);
           return view('backend.pages.about.edit',compact('about'));
       }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request, $id){

        $request->validate([
            'page_content'   => 'required',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $about = About::find($id);

        $about->page_content = $request->page_content;

//        delete old image
        if ($request->image > 0) {
            if (File::exists('images/about/' . $about->image)) {
                File::delete('images/about/' . $about->image);
            }
        }
//insert new image
        if ($request->image > 0){
            $image = $request->file('image');
            $image_name = 'BarisalGeek'.'-About-Me'.'.'.$image->getClientOriginalExtension();
            $location = public_path('images/about/'.$image_name);
            Image::make($image)->resize(1280,1920)->save($location);
            $about->image = $image_name;
        }

        $about->save();

        session()->flash('success','About Page Has Updated');
        return redirect()->route('admin.index');

    }

    public function delete($id){
        if (Auth::user()->role != 'Editor') {
            $team = Team::find($id);

            if (File::exists('images/about/team/' . $team->image)) {
                File::delete('images/about/team/' . $team->image);
            }

            $team->delete();

            session()->flash('success', 'A Team Has Deleted');
            return redirect()->route('admin.team.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
