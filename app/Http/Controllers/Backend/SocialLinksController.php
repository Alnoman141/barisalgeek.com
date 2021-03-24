<?php

namespace App\Http\Controllers\Backend;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SocialLinksController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function edit($id){
        if (Auth::user()->role == 'Super-Admin'){
           $social = SocialLink::find($id);
           return view('backend.pages.social.edit',compact('social'));
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request, $id){
        $request->validate([
           'facebook_link'  => 'url',
           'twitter_link'   => 'url',
           'linkedin_link'  => 'url',
           'dribbble_link'  => 'url',
           'instagram_link' => 'url',
           'behance_link'   => 'url',
        ]);

        $social = SocialLink::find($id);

        $social->facebook_link = $request->facebook_link;
        $social->twitter_link = $request->twitter_link;
        $social->linkedin_link = $request->linkedin_link;
        $social->dribbble_link = $request->dribbble_link;
        $social->instagram_link = $request->instagram_link;
        $social->behance_link = $request->behance_link;

        $social->save();

        session()->flash('success','Social Media Links Has Updated');
        return redirect()->route('admin.index');
    }
}
