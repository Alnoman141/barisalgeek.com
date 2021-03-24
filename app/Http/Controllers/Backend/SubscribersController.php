<?php

namespace App\Http\Controllers\Backend;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SubscribersController extends Controller
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
        $subscribers = Subscriber::orderBy('id','desc')->get();
        return view('backend.pages.subscriber.index',compact('subscribers'));
    }

    public function approve(Request $request,$id){
        $request->validate([
            'status'  => 'nullable|numeric'
        ]);

        $subscriber = Subscriber::find($id);
        $subscriber->status = 1;
        $subscriber->save();

        session()->flash('success','Subscriber Approved Done');
        return redirect()->route('admin.subscriber.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if (Auth::user()->role == 'Super-Admin') {
            $subscriber = Subscriber::find($id);

            $subscriber->delete();

            session()->flash('success', ' Subscriber Has Deleted');
            return redirect()->route('admin.subscriber.index');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
