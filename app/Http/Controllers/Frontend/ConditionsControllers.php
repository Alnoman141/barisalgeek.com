<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConditionsControllers extends Controller{

    public function index(){

        $condition = Condition::orderBy('id','desc')->first();
        return view('frontend.pages.condition',compact('condition'));
    }
}
