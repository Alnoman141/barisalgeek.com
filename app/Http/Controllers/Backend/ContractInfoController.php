<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ContractInfoController extends Controller{

    public function __construct(){
        return $this->middleware('auth:admin');
    }

    public function edit($id){
        if (Auth::user()->role == 'Super-Admin'){
           $contact = ContactInfo::find($id);
           return view('backend.pages.contact-info.edit',compact('contact'));
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request,$id){

        $request->validate([
            'email'         => 'required|email|max:255',
            'phone'         => 'required|numeric',
            'city'          => 'required|string|max:255',
            'country'       => 'required|string|max:255',
            'street_address'=> 'required|string|max:255',
        ]);

        $contact = ContactInfo::find($id);

        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->street_address = $request->street_address;
        $contact->city = $request->city;
        $contact->country = $request->country;

        $contact->save();

        session()->flash('success','Contact Info Has Updated');
        return redirect()->route('admin.index');
    }
}
