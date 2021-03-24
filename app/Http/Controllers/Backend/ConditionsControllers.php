<?php

namespace App\Http\Controllers\Backend;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConditionsControllers extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function edit($id){
        $condition = Condition::find($id);
        return view('backend.pages.condition.edit',compact('condition'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'page_content'   => 'required'
        ]);

        $condition = Condition::find($id);

        $condition->page_content = $request->page_content;

        $condition->save();

        session()->flash('success','Terms & Conditions Has Updated');
        return redirect()->route('admin.index');
    }
}
