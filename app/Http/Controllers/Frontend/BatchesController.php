<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BatchesController extends Controller{

    public function index(){
        $batches = Batch::orderBy('name')->get();
        return view('frontend.pages.batch.index',compact('batches'));
    }

    public function show($slug){
        $batch = Batch::where('slug', $slug)->first();
        return view('frontend.pages.batch.show',compact('batch'));
    }
}
