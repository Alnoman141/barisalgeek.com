<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class SubscribersController extends Controller{


    public function store(Request $request){
         $request->validate([
           'email'    => 'required|email|unique:subscribers',
        ]);

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;

        $subscriber->save();
//
//        session()->flash('success','subscribe done');

        if ($subscriber->save()){
            Alert::success('Subscribe Done!')->persistent("Close");

        }else{
            Alert::error('Something went wrong', 'Oops!');
        }

        return redirect()->route('index');
    }
}
