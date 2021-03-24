<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use App\Notifications\SendMessageReply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ContactsController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $unseenmessages = Contact::orderBy('id','desc')->where('status',0)->get();
        $seenmessages = Contact::orderBy('id','desc')->where('status',1)->get();
        return view('backend.pages.message.index',compact('unseenmessages','seenmessages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $message = Contact::find($id);
        $message->status = 1;
        $message->save();
        return view('backend.pages.message.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function replyForm($id){

        $message = Contact::find($id);
        return view('backend.pages.message.replyform',compact('message'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $id){
        $request->validate([
            'name'       => 'required|string',
            'email'      => 'required|email',
            'subject'    => 'required|string',
            'reply'      => 'required|string',
            'replied_by' => 'required|string',
        ]);

        $reply = Contact::find($id);

        $reply->reply = $request->reply;
        $reply->replied_by = $request->replied_by;
        $reply->save();

        $reply->notify(new SendMessageReply($reply));

        session()->flash('success','Message Reply Done');
        return redirect()->route('admin.messages');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::user()->role != 'Editor') {
            $reply = Contact::find($id);
            $reply->delete();

            session()->flash('success', 'Message Delete Done');
            return redirect()->route('admin.messages');
        }else{
            session()->flash('errormsg','You have no permission for requested page!');
            return redirect()->route('admin.index');
        }
    }
}
