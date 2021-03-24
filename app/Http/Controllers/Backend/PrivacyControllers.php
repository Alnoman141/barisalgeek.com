<?php

namespace App\Http\Controllers\Backend;

use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PrivacyControllers extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function edit($id){
        if (Auth::user()->role == 'Super-Admin' || Auth::user()->role == 'Admin') {
            $privacy = Privacy::find($id);
            return view('backend.pages.privacy.edit',compact('privacy'));
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request, $id){

        $request->validate([
            'page_content'   => 'required'
        ]);

        $privacy = Privacy::find($id);

        $privacy->page_content = $request->page_content;

        $privacy->save();

        session()->flash('success','Privacy Has Updated');
        return redirect()->route('admin.index');

    }
}
