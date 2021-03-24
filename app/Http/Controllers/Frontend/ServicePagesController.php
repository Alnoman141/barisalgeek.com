<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicePagesController extends Controller{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){

        $service = Service::where('slug', $slug)->first();
        return view('frontend.pages.service.show',compact('service'));

    }

}
