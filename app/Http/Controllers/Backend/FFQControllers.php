<?php

namespace App\Http\Controllers\Backend;

use App\Models\FFQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class FFQControllers extends Controller
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

        $ffqs = FFQ::orderBy('id','desc')->get();
        return view('backend.pages.ffq.index',compact('ffqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('backend.pages.ffq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $request->validate([
            'question' => 'required|unique:f_f_q_s',
            'answer'   => 'required',
        ]);

        $ffq = new FFQ();

        $ffq->question = $request->question;
        $ffq->answer = $request->answer;

        $ffq->save();
        session()->flash('success','A New FFQ Has Added Successfully');
        return redirect()->route('admin.ffq.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $ffq = FFQ::find($id);
        return view('backend.pages.ffq.edit',compact('ffq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $request->validate([
           'question'  => 'required|unique:f_f_q_s,id',
            'answer'   => 'required',

        ]);

        $ffq = FFQ::find($id);

        $ffq->question = $request->question;
        $ffq->answer = $request->answer;

        $ffq->save();
        session()->flash('success',' FFQ Has Updated Successfully');
        return redirect()->route('admin.ffq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role != 'Editor') {
            $ffq = FFQ::find($id);
            $ffq->delete();
            session()->flash('success', ' FFQ Has Deleted!');
            return redirect()->route('admin.ffq.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
