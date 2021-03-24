<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin;
use App\Models\Contact;
use App\Notifications\MessageNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $admin;

    public function index(){

        return view('frontend.pages.contact');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email',
            'subject'  => 'nullable|string',
            'message'  => 'required|string',
        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;


        if ($contact) {
            $contact->save();
            $this->admin = Admin::where('role','Super-Admin')->first();

            $this->admin->notify(new MessageNotification($contact));
            $notification = array(
                'message' => 'Message Sent',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => $validator,
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);
    }

}
